<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS kkn_unhas_113";

if ($conn->query($sql) === TRUE) {
    // echo "New database created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
// -------------------------------------------------------------------- //
$database = "kkn_unhas_113";
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$table = ["
CREATE TABLE IF NOT EXISTS users (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255)
)","
CREATE TABLE IF NOT EXISTS foto_desa (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    foto VARCHAR(255) NOT NULL,
    judul VARCHAR(255) NOT NULL,
    deskripsi VARCHAR(255)
)","
CREATE TABLE IF NOT EXISTS pegawai (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    foto VARCHAR(255) NOT NULL,
    nama VARCHAR(255) NOT NULL,
    jabatan VARCHAR(255) NOT NULL
)","
CREATE TABLE IF NOT EXISTS publikasi (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    foto VARCHAR(255) NOT NULL,
    judul VARCHAR(255) NOT NULL,
    deskripsi_singkat VARCHAR(255) NOT NULL,
    deskripsi TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)","
CREATE TABLE IF NOT EXISTS background (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    foto VARCHAR(255) NOT NULL
)","
CREATE TABLE IF NOT EXISTS tulisan_text (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    kunci VARCHAR(255) NOT NULL,
    kalimat VARCHAR(255) NOT NULL
)"];
foreach ($table as $value) {
    $conn->query($value); 
}

$conn->close();
?>