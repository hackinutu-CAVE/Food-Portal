<?php
$host = "mysql-server";
$user = "root";
$pass = "root";
$db = "food-portal";
try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    include("home.php");
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>