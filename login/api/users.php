<?php 

class Authentication {
    public $email;
    public $pass;

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

    function login(mysqli $conn) {
        $this->email = $_POST['username'];
        $this->pass = $_POST['password'];

        $stmt = $conn->prepare("SELECT username, password FROM users WHERE username = ?");
        $stmt->bind_param("s", $this->email);
        $data = $this->arrCon($stmt);

        if (!empty($data)) {
            if ($this->pass == $data[0]['password']) {
                session_start();
                $_SESSION['users'] = $data[0]['username'];
                $_SESSION['last_activity'] = time();
                $_SESSION['expire_time'] = 3 * 60 * 60;
                echo 'success';
            } else {
                echo 'Incorrect password';
            }
        } else {
            echo 'Email not found';
        }
    }
}

$auth = new Authentication();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kkn_unhas_113";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


?>