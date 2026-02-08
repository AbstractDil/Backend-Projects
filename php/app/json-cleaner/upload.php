<?php
$uploadDir = __DIR__ . "/uploads/";
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true); // create uploads folder with proper permission
}

$status = "";
$fields = [];
$data = [];
$fileName = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['jsonFile'])) {
    $fileName = time() . "_" . basename($_FILES['jsonFile']['name']); // prevent overwrite
    $targetFile = $uploadDir . $fileName;

    if (move_uploaded_file($_FILES['jsonFile']['tmp_name'], $targetFile)) {
        $status = "✅ File uploaded successfully!";
        $jsonData = file_get_contents($targetFile);
        $data = json_decode($jsonData, true);

        if (!$data) {
            $status = "❌ Invalid JSON file!";
        } else {
            $fields = array_keys($data[0]); // collect keys from first object
        }
    } else {
        $status = "❌ File upload failed. Check folder permissions.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>JSON Cleaner - Step 2</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    pre { background: #f8f9fa; padding: 10px; border-radius: 6px; max-height: 350px; overflow-y: auto; }
  </style>
</head>
<body class="bg-light">
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div class="card shadow-lg border-0 rounded-3">
        <div class="card-body p-4">
          <h3 class="mb-3">Step 2: Select Fields to Remove</h3>
          <div class="alert alert-info"><?= $status ?></div>

          <?php if ($fields): ?>
            <!-- Original Preview -->
            <div class="mb-4">
              <h5>🔍 Original Preview (first 3 objects)</h5>
              <pre id="originalPreview"><?php 
                $preview = array_slice($data, 0, 3);
                echo htmlspecialchars(json_encode($preview, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)); 
              ?></pre>
            </div>

            <!-- Field Selection -->
            <form action="process.php" method="POST" id="cleanForm">
              <h5 class="mb-3">Choose Fields to Remove:</h5>
              <div class="row">
                <?php foreach ($fields as $field): ?>
                  <div class="col-md-4 mb-2">
                    <div class="form-check">
                      <input class="form-check-input fieldCheckbox" type="checkbox" name="removeFields[]" value="<?= htmlspecialchars($field) ?>">
                      <label class="form-check-label"><?= htmlspecialchars($field) ?></label>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
              <input type="hidden" name="jsonFile" value="<?= htmlspecialchars($fileName) ?>">

              <!-- Live Cleaned Preview -->
              <div class="mt-4">
                <h5>✨ Live Cleaned Preview</h5>
                <pre id="cleanedPreview"></pre>
              </div>

              <div class="d-grid mt-3">
                <button type="submit" class="btn btn-success">Clean & Save JSON</button>
              </div>
            </form>
          <?php else: ?>
            <p class="text-danger">No fields found. Please upload a valid JSON file.</p>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
// JavaScript for live preview
const checkboxes = document.querySelectorAll(".fieldCheckbox");
const cleanedPreview = document.getElementById("cleanedPreview");

// Store original JSON preview (from PHP)
let originalData = <?php echo json_encode(array_slice($data, 0, 3)); ?>;

// Update preview when checkboxes change
function updatePreview() {
    let selectedFields = Array.from(checkboxes)
        .filter(cb => cb.checked)
        .map(cb => cb.value);

    let cleanedData = JSON.parse(JSON.stringify(originalData)); // clone

    cleanedData = cleanedData.map(obj => {
        selectedFields.forEach(f => delete obj[f]);
        return obj;
    });

    cleanedPreview.textContent = JSON.stringify(cleanedData, null, 2);
}

// Attach events
checkboxes.forEach(cb => cb.addEventListener("change", updatePreview));
</script>
</body>
</html>
