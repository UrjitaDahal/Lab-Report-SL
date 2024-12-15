<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
    $allowed_types = ['image/png', 'image/jpeg'];
    $max_file_size = 500 * 1024;

    
    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['profile_image'];

   
        $file_name = $file['name'];
        $file_type = $file['type'];
        $file_size = $file['size'];
        $tmp_name = $file['tmp_name'];

       
        if (!in_array($file_type, $allowed_types)) {
            echo "<p >Invalid file type.</p>";
        }
     
        elseif ($file_size > $max_file_size) {
            echo "<p >File size exceeds 500 KB limit.</p>";
        }
 
        else {
            $upload_dir = 'profile_uploads/';

           
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }

            $destination = $upload_dir . basename($file_name);

            if (move_uploaded_file($tmp_name, $destination)) {
                echo "<p> image uploaded successfully: $file_name</p>";
            } else {
                echo "<p >Failed to upload image. Please try again.</p>";
            }
        }
    } else {
        echo "<p>No file uploaded or error occurred.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Profile Image</title>
   
</head>

<body>
    <div>
        <h2>Upload  Profile Image</h2><br><br>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="profile_image">Select Image (max 500 KB):</label><br><br>
            <input type="file" name="profile_image" id="profile_image" required><br><br>
            <button type="submit">Upload</button>
        </form>
    </div>
</body>

</html>