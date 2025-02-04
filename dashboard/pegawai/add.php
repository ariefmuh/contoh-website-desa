<?php
include "../database.php";
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('CSRF token validation failed');
    } else {
        if (isset($_FILES['foto_pegawai']) && $_FILES['foto_pegawai']['error'] === UPLOAD_ERR_OK) {
            $file = $_FILES['foto_pegawai'];
    
            // Get file details
            $fileTmpPath = $file['tmp_name'];
            $fileName = $file['name'];
            $fileSize = $file['size'];
            $fileType = $file['type'];
    
            // Validate file size (e.g., max 2MB)
            if ($fileSize > 2 * 1024 * 1024) {
                die("File size exceeds the 2MB limit.");
            }
    
            // Generate a random name for the file
            $newFileName = uniqid() . '-' . $fileName;
    
            // Define the target directory
            $uploadDir = __DIR__ . '../../../assets/img/team/';
    
            // Ensure the directory exists
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
    
            $destPath = $uploadDir . $newFileName;
            if (move_uploaded_file($fileTmpPath, $destPath)) {
                echo "File uploaded successfully!";
    
                $stmt = $conn->prepare("INSERT INTO pegawai (foto, nama, jabatan) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $newFileName, $_POST['nama'], $_POST['jabatan']);
                if ($stmt->execute()) {
                    echo 'Foto Desa added successful';
                } else {
                    echo 'Foto Desa added failed';
                }
    
            } else {
                echo "Failed to move the file.";
            }
        } else {
            echo "No file uploaded or an error occurred.";
        }
    }
} else {
    echo "Invalid request method.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    <script>
        history.go(-1)
    </script>
</body>
</html>
