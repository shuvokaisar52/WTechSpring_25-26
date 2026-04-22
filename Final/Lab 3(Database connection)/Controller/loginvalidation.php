<?php
include "../Model/db.php";
session_start();

$email = "";
$password = "";
$datafile = "data.json";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (!empty($email) && preg_match("/^[^\s@]+@[^\s@]+\.[^\s@]+$/", $email) && !empty($password) && strlen($password) > 5) {
        $_SESSION["email"] = $email;
        setcookie("email", $email, time() + 3600, "/");

        $formdata = array("Email" => $email, "Password" => $password);
        if (file_exists($datafile)) {
            $exitsdata = file_get_contents($datafile);
            $tempdata = json_decode($exitsdata, true);
        } else {
            $tempdata = array();
        }

        if (!is_array($tempdata)) {
            $tempdata = array();
        }
        $tempdata[] = $formdata;
        $jsondata = json_encode($tempdata, JSON_PRETTY_PRINT);
        if (file_put_contents($datafile, $jsondata) !== false) {
            echo "Data Saved";
        } else {
            echo "Please Try Again";
        }
        $data = file_get_contents($datafile);
        $mydata = json_decode($data);

        $database = new db();
        $connection = $database->connection();
        $result = $database->signin($connection, "users", $email, $password);

        if ($result) {
            Header("Location: ../View/dashboard.php");
        } else {
            echo ("Connection error!!");
        }
    } else {
        echo "Please fill the data correctly.";
    }



    if (!isset($_SESSION["email"]) || isset($_COOKIE["email"])) {
        echo "Welcome Back";
    } else {
        echo "Please log In";
    }


}



?>