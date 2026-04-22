<?php
include "../Model/db.php";
session_start();
$email = $_SESSION['email'];
$database = new db();
$connection = $database->connection();
$result = $database->getdata($connection, "users", $email);

$row = $result->fetch_assoc();
echo "Welcome " . $row['name'] . "<br>";
echo "Name: " . $row['name'] . "<br>";
echo "Email: " . $row['email'] . "<br>";
echo "Password: " . $row['password'];

?>