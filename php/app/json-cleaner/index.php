<?php
// index.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>JSON Cleaner Tool</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    #progressBox { display: none; }
  </style>
</head>
<body class="bg-light">
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card shadow-lg border-0 rounded-3">
        <div class="card-body p-4">
          <h3 class="mb-4 text-center">📂 JSON Cleaner Tool</h3>

          <form id="uploadForm" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="jsonFile" class="form-label">Upload JSON File</label>
              <input class="form-control" type="file" name="jsonFile" id="jsonFile" accept="application/json" required>
            </div>
            <div class="d-grid">
              <button type="submit" class="btn btn-primary">Upload & Continue</button>
            </div>
          </form>

          <!-- Progress bar -->
          <div id="progressBox" class="mt-4">
            <label>Uploading...</label>
            <div class="progress">
              <div id="progressBar" class="progress-bar progress-bar-striped progress-bar-animated bg-success" 
                   role="progressbar" style="width: 0%">0%</div>
            </div>
            <div id="uploadStatus" class="mt-2"></div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.getElementById("uploadForm").addEventListener("submit", function(e) {
    e.preventDefault();

    let formData = new FormData(this);
    let xhr = new XMLHttpRequest();
    let progressBox = document.getElementById("progressBox");
    let progressBar = document.getElementById("progressBar");
    let uploadStatus = document.getElementById("uploadStatus");

    xhr.open("POST", "upload.php", true);

    // Show progress bar
    progressBox.style.display = "block";

    // Update progress
    xhr.upload.addEventListener("progress", function(e) {
        if (e.lengthComputable) {
            let percent = Math.round((e.loaded / e.total) * 100);
            progressBar.style.width = percent + "%";
            progressBar.innerHTML = percent + "%";
        }
    });

    // On success
    xhr.onload = function() {
        if (xhr.status === 200) {
            uploadStatus.innerHTML = "<span class='text-success'>✅ Upload complete! Redirecting...</span>";
            setTimeout(() => {
                document.open();
                document.write(xhr.responseText);
                document.close();
            }, 800);
        } else {
            uploadStatus.innerHTML = "<span class='text-danger'>❌ Upload failed. Try again.</span>";
        }
    };

    // On error
    xhr.onerror = function() {
        uploadStatus.innerHTML = "<span class='text-danger'>❌ An error occurred during upload.</span>";
    };

    xhr.send(formData);
});
</script>
</body>
</html>
