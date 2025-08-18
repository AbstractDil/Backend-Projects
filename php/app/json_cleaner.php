<?php
// Set folder for saving cleaned files
$uploadDir = __DIR__ . "/uploads/";
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$step = 1; // Default step
$fields = [];
$data = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['jsonFile'])) {
        // Step 1: File upload
        $fileTmp = $_FILES['jsonFile']['tmp_name'];
        $jsonData = file_get_contents($fileTmp);
        $data = json_decode($jsonData, true);

        if (!$data) {
            die("❌ Invalid JSON uploaded!");
        }

        // Collect all keys from first object
        $fields = array_keys($data[0]);
        $step = 2;
    } elseif (isset($_POST['removeFields']) && isset($_POST['jsonData'])) {
        // Step 2: Clean and save
        $removeFields = $_POST['removeFields'];
        $data = json_decode($_POST['jsonData'], true);

        foreach ($data as &$question) {
            foreach ($removeFields as $field) {
                unset($question[$field]);
            }
        }

        // Save cleaned file
        $newFile = $uploadDir . "cleaned_" . time() . ".json";
        file_put_contents($newFile, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        $downloadLink = "uploads/" . basename($newFile);
        $step = 3;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>JSON Cleaner</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .container { max-width: 900px; margin: auto; }
        .box { border: 1px solid #ddd; padding: 20px; margin-bottom: 20px; border-radius: 8px; }
        .btn { background: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; }
        .btn:hover { background: #0056b3; }
    </style>
</head>
<body>
<div class="container">
    <h2>📂 JSON Cleaner Tool</h2>

    <?php if ($step == 1): ?>
        <div class="box">
            <h3>Upload JSON File</h3>
            <form method="POST" enctype="multipart/form-data">
                <input type="file" name="jsonFile" accept="application/json" required>
                <button type="submit" class="btn">Upload</button>
            </form>
        </div>

    <?php elseif ($step == 2): ?>
        <div class="box">
            <h3>Select Fields to Remove</h3>
            <form method="POST">
                <?php foreach ($fields as $field): ?>
                    <label>
                        <input type="checkbox" name="removeFields[]" value="<?= htmlspecialchars($field) ?>">
                        <?= htmlspecialchars($field) ?>
                    </label><br>
                <?php endforeach; ?>
                <input type="hidden" name="jsonData" value='<?= json_encode($data, JSON_UNESCAPED_UNICODE) ?>'>
                <br>
                <button type="submit" class="btn">Clean & Save</button>
            </form>
        </div>

    <?php elseif ($step == 3): ?>
        <div class="box">
            <h3>✅ File Cleaned Successfully!</h3>
            <p><a href="<?= $downloadLink ?>" class="btn" download>Download Cleaned JSON</a></p>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
