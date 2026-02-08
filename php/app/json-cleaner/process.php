<?php
$uploadDir   = __DIR__ . "/uploads/";
$downloadDir = __DIR__ . "/downloads/";

// Ensure both folders exist with correct permissions
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}
if (!is_dir($downloadDir)) {
    mkdir($downloadDir, 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fileName     = $_POST['jsonFile'] ?? '';
    $removeFields = $_POST['removeFields'] ?? [];

    $filePath = $uploadDir . $fileName;

    if (!file_exists($filePath)) {
        die("❌ File not found!");
    }

    // Load JSON
    $jsonData = file_get_contents($filePath);
    $data     = json_decode($jsonData, true);

    if (!$data) {
        die("❌ Invalid JSON file!");
    }

    // Remove unwanted fields
    $cleanedData = array_map(function($item) use ($removeFields) {
        foreach ($removeFields as $field) {
            unset($item[$field]);
        }
        return $item;
    }, $data);

    // Generate cleaned filename (keep original uploaded name with prefix)
    $newFileName = "cleaned_" . $fileName;
    $savePath    = $downloadDir . $newFileName;

    file_put_contents($savePath, json_encode($cleanedData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>JSON Cleaned</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="bg-light">
    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card shadow-lg border-0 rounded-3">
            <div class="card-body p-4 text-center">
              <h3 class="mb-3 text-success">✅ JSON Cleaned Successfully</h3>
              <p class="mb-4">
                Original File: <strong><?= htmlspecialchars($fileName) ?></strong><br>
                Cleaned File: <strong><?= htmlspecialchars($newFileName) ?></strong>
              </p>
              <a href="downloads/<?= htmlspecialchars($newFileName) ?>" class="btn btn-primary" download>
                ⬇️ Download Cleaned JSON
              </a>
              <a href="index.php" class="btn btn-secondary ms-2">Upload Another File</a>
              <a href="convert.php" class="btn btn-success ms-2">Convert to SQL</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    </body>
    </html>
    <?php
}
?>
