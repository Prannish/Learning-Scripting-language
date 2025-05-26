<?php
if (isset($_POST['upload'])) {
    $targetDir = "uploads/"; // Directory to store uploaded files
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true); // Create directory if not exists
    }

    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Allowed file types
    $allowedTypes = ['jpg', 'png', 'gif', 'pdf', 'docx'];

    if (in_array(strtolower($fileType), $allowedTypes)) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            echo "File uploaded successfully: <a href='$targetFilePath'>$fileName</a>";
        } else {
            echo "File upload failed.";
        }
    } else {
        echo "Invalid file type. Allowed types: jpg, png, gif, pdf, docx.";
    }
}
header("Location: index.php");
exit();
