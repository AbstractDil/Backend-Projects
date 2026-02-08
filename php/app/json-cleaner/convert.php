<?php
// Ensure sql folder exists
if (!file_exists('sql')) {
    mkdir('sql', 0777, true);
}

$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['convert'])) {
    $jsonFile = $_POST['json_file'] ?? '';
    $qset_id = $_POST['qset_id'] ?? '';
    $qsec_id = $_POST['qsec_id'] ?? '';
    $from = intval($_POST['from'] ?? 0);
    $to   = intval($_POST['to'] ?? 0);

    if ($jsonFile && file_exists("downloads/" . $jsonFile)) {
        $jsonData = json_decode(file_get_contents("downloads/" . $jsonFile), true);
        if ($jsonData) {
            $total = count($jsonData);

            // Validate range
            if ($from < 1) $from = 1;
            if ($to <= 0 || $to > $total) $to = $total;
            if ($from > $to) $from = 1; // fallback if invalid

            // Extract only the required slice (array_slice is 0-based)
            $jsonData = array_slice($jsonData, $from - 1, $to - $from + 1);

            $sqlLines = [];
            foreach ($jsonData as $item) {
                $question = addslashes($item['question'] ?? '');
                $option1  = addslashes($item['option_1'] ?? '');
                $option2  = addslashes($item['option_2'] ?? '');
                $option3  = addslashes($item['option_3'] ?? '');
                $option4  = addslashes($item['option_4'] ?? '');
                $answer   = intval($item['answer'] ?? 0);
                $correct_option = $answer > 0 ? "option{$answer}" : '';
                $explanation = addslashes($item['solution_text'] ?? '');

                $sqlLines[] = "INSERT INTO `questions_bank_tbl` (`datetime`, `qset_id`, `qsec_id`, `option1`, `option2`, `option3`, `option4`, `correct_option`, `explanation`, `question`) VALUES (NOW(), {$qset_id}, {$qsec_id}, '{$option1}', '{$option2}', '{$option3}', '{$option4}', '{$correct_option}', '{$explanation}', '{$question}');";
            }

            $sqlContent = implode("\n", $sqlLines);
            $filename = "sql/converted_" . basename($jsonFile, '.json') . "_{$from}_to_{$to}_" . time() . ".sql";
            file_put_contents($filename, $sqlContent);

            $message = "✅ SQL file generated successfully! <a href='{$filename}' download>Download here</a>";
        } else {
            $message = "❌ Failed to read JSON file!";
        }
    } else {
        $message = "❌ JSON file not found!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Convert JSON to SQL</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
  <div class="card shadow p-4">
    <h2 class="mb-3">Convert Cleaned JSON to SQL</h2>
    <?php if ($message): ?>
      <div class="alert alert-info"><?= $message ?></div>
    <?php endif; ?>
    <?php if (isset($filename)): ?>
      <div class="alert alert-success">
        SQL File: <strong><?= htmlspecialchars($filename) ?></strong>
      </div>
    <?php endif; ?>

    <form method="POST">
      <div class="mb-3">
        <label class="form-label">Select JSON file (from downloads/)</label>
        <select name="json_file" class="form-select" required>
          <option value="">-- Select File --</option>
          <?php
          foreach (glob("downloads/*.json") as $file) {
              $fname = basename($file);
              echo "<option value='$fname'>$fname</option>";
          }
          ?>
        </select>
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label class="form-label">QSet ID</label>
          <input type="number" name="qset_id" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
          <label class="form-label">QSec ID</label>
          <input type="number" name="qsec_id" class="form-control" required>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label class="form-label">From (start record)</label>
          <input type="number" name="from" class="form-control" value="1" required>
        </div>
        <div class="col-md-6 mb-3">
          <label class="form-label">To (end record)</label>
          <input type="number" name="to" class="form-control" value="0" required>
          <small class="text-muted">Enter 0 to auto-use last record</small>
        </div>
      </div>

      <button type="submit" name="convert" class="btn btn-success w-100">Convert to SQL</button>
    </form>
  </div>
</div>
</body>
</html>
