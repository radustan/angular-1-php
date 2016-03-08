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

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT name, email, message FROM messages");
    $stmt->execute();

    // set the resulting array to associative
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    header('Content-Type: application/json');
    echo json_encode($result);
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;


?>
