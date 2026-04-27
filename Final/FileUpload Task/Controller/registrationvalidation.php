<?php
include "../Model/db.php";
session_start();

$name = "";
$email = "";
$password = "";
$datafile = "data.json";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
	$file=$_FILES["file"];

    if (!empty($name) && strlen($name) >= 5 && !empty($email) && !empty($password) && strlen($password) > 5) {
        $_SESSION["name"] = $name;
        setcookie("name", $name, time() + 3600, "/");
        $_SESSION["email"] = $email;
        setcookie("email", $email, time() + 3600, "/");

        $formdata = array("Name" => $name, "Email" => $email, "Password" => $password);
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
		
		if($file){
			$targetdirectory = "../File/";
			$path=$targetdirectory.basename($file["name"]);
			$result=move_uploaded_file($file["tmp_name"],$path);
		}else{
			$path="";
		}
		

        $database = new db();
        $connection = $database->connection();
        $result = $database->signup($connection, "users", $name, $email, $password,$path);

        if ($result) {
            Header("Location: ../View/login.php");
        } else {
            echo ("Connection error!!");
        }

    } else {
        echo "Please fill the data correctly.";
    }


    if (!isset($_SESSION["name"]) || isset($_COOKIE["name"]) || isset($_SESSION["email"]) || isset($_COOKIE["email"])) {
        echo "Welcome Back";
    } else {
        echo "Please log In";
    }


}



?>