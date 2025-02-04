<?php
include "../database.php";
session_start();
print_r($_SESSION);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('CSRF token validation failed');
    } else {
        $stmt = $conn->prepare("UPDATE tulisan_text SET kalimat = ? WHERE id = ?");
        $stmt->bind_param("ss", $_POST['kalimat'], $_POST['id'] );
        if ($stmt->execute()) {
            echo 'Text edited successful';
        } else {
            echo 'Text edited failed';
        }
    }
} else {
    die("Invalid request method.");
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
