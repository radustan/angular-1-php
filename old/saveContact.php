<?php

$servername = "localhost";
$username = "root";
$dbname = "angular";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$params = $_POST;

$sql = "INSERT INTO messages (name, email, message)
VALUES ('".$params['name']."','".$params['email']."','".$params['message']."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>
