<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>File Upload and View</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>File Upload</h2>
        <form action="index.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="file">Choose a file:</label>
                <input type="file" name="file" id="file" class="file-input">
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Upload" class="upload-button">
            </div>
        </form>


        <?php

        // handle the file upload thingy

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
            $uploadDir = 'uploads/';
            $uploadFile = $uploadDir . basename($_FILES['file']['name']);

            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
                echo "<p>File is valid and was successfully uploaded.</p>";
            } else {
                echo "<p>File upload failed.</p>";
            }
        }
        ?>


        <!-- show uploaded files -->

        <h2>Uploaded Files</h2>
        <ul>
            <?php
            $uploadDir = 'uploads/';
            $files = scandir($uploadDir);
            foreach ($files as $file) {
                if ($file !== '.' && $file !== '..') {
                    echo '<li><a href="' . $uploadDir . $file . '">' . $file . '</a></li>';
                }
            }
            ?>
        </ul>
    </div>
</body>
</html>

