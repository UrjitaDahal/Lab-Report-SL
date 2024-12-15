<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $allowed_types = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
    $max_file_size = 1 * 1024 * 1024;

 
    if (isset($_FILES['cv']) && $_FILES['cv']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['cv'];


        $file_name = $file['name'];
        $file_type = $file['type'];
        $file_size = $file['size'];
        $tmp_name = $file['tmp_name'];

    
        if (!in_array($file_type, $allowed_types)) {
            echo "<p>Invalid file type. Only PDF and DOC files are allowed.</p>";
        }
    
        elseif ($file_size > $max_file_size) {
            echo "<p>File size exceeds 1 MB limit.</p>";
        }
       
        else {
            $upload_dir = 'uploads/';

      
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }

            $destination = $upload_dir . basename($file_name);

            if (move_uploaded_file($tmp_name, $destination)) {
                echo "<p>File uploaded successfully: $file_name</p>";
            } else {
                echo "<p>Failed to upload file. Please try again.</p>";
            }
        }
    } else {
        echo "<p>No file uploaded or an error occurred.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload CV</title>
   
</head>
<body>
    <div class="upload-container">
        <h2>Upload Your CV</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="cv">Select CV (PDF or DOC, max 1 MB):</label><br><br>
            <input type="file" name="cv" id="cv" required><br><br>
            <button type="submit">Upload</button>
        </form>
    </div>
</body>
</html>
