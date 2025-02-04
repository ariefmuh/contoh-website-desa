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
    
            $query = "SELECT foto FROM pegawai WHERE id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $_POST['id']);
            $stmt->execute();
            $stmt->bind_result($originalFilePath);
            $stmt->fetch();
            $stmt->close();
    
            $originalFileFullPath = __DIR__ . '../../../assets/img/team/' . $originalFilePath;
            if (file_exists($originalFileFullPath)) {
                unlink($originalFileFullPath);
            }
    
            $destPath = $uploadDir . $newFileName;
            if (move_uploaded_file($fileTmpPath, $destPath)) {
                echo "File uploaded successfully!";
    
                $stmt = $conn->prepare("UPDATE pegawai SET foto = ?, nama = ?, jabatan = ? WHERE id = ?");
                $stmt->bind_param("ssss", $newFileName, $_POST['nama'], $_POST['jabatan'], $_POST['id']);
                if ($stmt->execute()) {
                    echo 'Foto Desa edited successful';
                } else {
                    echo 'Foto Desa edited failed';
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
