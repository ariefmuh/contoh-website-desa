<?php
include "../database.php";
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('CSRF token validation failed');
    } else {
        $query = "SELECT foto FROM pegawai WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $_POST['id']);
        $stmt->execute();
        $stmt->bind_result($originalFilePath);
        $stmt->fetch();
        $stmt->close();

        $originalFileFullPath = __DIR__ . '../../../assets/img/pegawai/' . $originalFilePath;
        if (file_exists($originalFileFullPath)) {
            unlink($originalFileFullPath);
        }

        $stmt = $conn->prepare("DELETE FROM pegawai WHERE id = ?");
        $stmt->bind_param("s", $_POST['id']);
        if ($stmt->execute()) {
            echo 'Foto Desa removed successful';
        } else {
            echo 'Foto Desa removed failed';
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
