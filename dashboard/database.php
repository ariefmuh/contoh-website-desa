<?php
class kkn_data {
    public $table;

    function arrCon(mysqli_stmt $stmt) {
        $arr = [];
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
        }
        return $arr;
    }
    function setTable($table) {
        $this->table = $table;
    }
    function getTable() {
        return $this->table;
    }
    function read(mysqli $conn, $count = null, $page = null) {
        $query = "SELECT * FROM `" . $this->getTable() . "`";

        if (!is_null($count)) {
            $query .= " LIMIT " . intval($count); 
        }

        if (!is_null($page)) {
            $query .= " OFFSET " . intval(($page - 1) * $count); 
        }

        $stmt = $conn->prepare($query);
        $data = $this->arrCon($stmt);
        return $data;
    }
    function getTotalRows(mysqli $conn) {
        $query = "SELECT COUNT(*) as total FROM `" . $this->getTable() . "`";
        $result = $conn->query($query);
        $row = $result->fetch_assoc();
        return $row['total'];
    }
    function getData(mysqli $conn, $id) {
        $tableName = $this->getTable(); // Assuming `getTable()` returns a valid table name.
        $stmt = $conn->prepare("SELECT * FROM `$tableName` WHERE id = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        $result->free();
        $stmt->close();
    
        return $data;
    }
    function searchPublikasi(mysqli $conn, $judul) {
        $stmt = $conn->prepare("SELECT * FROM publikasi WHERE judul LIKE ?");
        $judul_like = "%{$judul}%"; 
        $stmt->bind_param("s", $judul_like); 
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC); // Fetch all rows
        $result->free();
        $stmt->close();
        return $data;
    }
    function delete(mysqli $conn) {
        $tableName = $this->getTable();
        $stmt = $conn->prepare("DELETE FROM `$tableName` WHERE id = ?");
        $stmt->bind_param("s", $_POST['id']);
    
        if ($stmt->execute()) {
            echo 'Data removed successfully';
        } else {
            echo 'Data removad failed: ' . $stmt->error;
        }
    }
}
$data = new kkn_data();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kkn_unhas_113";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>