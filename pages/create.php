<?php

$name = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['password'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "website";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn) {
    die("connection failed: " . mysqli_connect_error());
} else {
    $stmt = $conn->prepare("INSERT INTO login_info (Username, Email, Password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $pass);
    $stmt->execute();
    echo "User created successfully";
    $stmt->close();
}

?>