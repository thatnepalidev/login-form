<?php

$email = $_POST['email'];
$pass = $_POST['password'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "website";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn) {
    die("connection failed: " . musqli_connect_error());
} else {
    $stmt = $conn->prepare("SELECT Password FROM login_info WHERE Email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($stored_pass);
        $stmt->fetch();
        if ($stored_pass == $pass) {
            echo "Login successful";
        } else {
            echo "Login failed";
        }
    } else {
        echo "Login failed";
    }
}

?>