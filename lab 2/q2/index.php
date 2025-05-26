<!DOCTYPE html>
<html lang="en">
<head>
    <title>File Upload</title>
</head>
<body>
    <h2>Upload a File</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file" required>
        <button type="submit" name="upload">Upload</button>
    </form>

    <h2>Uploaded Files</h2>
    <ul>
        <?php
        $folder = "uploads/";
        if (is_dir($folder)) {
            $files = array_diff(scandir($folder), array('.', '..'));
            if (count($files) > 0) {
                foreach ($files as $file) {
                    echo "<li><a href='$folder$file' target='_blank'>$file</a></li>";
                }
            } else {
                echo "<p>No files uploaded yet.</p>";
            }
        } else {
            echo "<p>Uploads folder does not exist.</p>";
        }
        ?>
    </ul>
</body>
</html>
