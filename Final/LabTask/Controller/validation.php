<?php 

session_start();

$name = "";
$email = "";
$website = "";
$comment = "";
$gender = "";
$datafile ="../data.json";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $website = $_POST["website"];
    $comment = $_POST["comment"];
    $gender = $_POST["gender"];
    

    if (!empty($name) && strlen($name)>=5 && filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($comment) && isset($gender)) {
        $_SESSION["name"]=$name;
        $_SESSION["email"]=$email;
        $_SESSION["comment"]=$comment;
        $_SESSION["gender"]=$gender;
		
        setcookie('name',$name,time()+3600,"/");
        setcookie('email',$email,time()+3600,"/");
        setcookie('comment',$comment,time()+3600,"/");
        setcookie('gender',$gender,time()+3600,"/");
        echo "Login Successful";
		
		
		
		 $formdata = array("Name"=>$name, "Email"=>$email, "Website"=>$website, "Comment"=>$comment, "Gender"=>$gender);

                if(file_exists($datafile))
                    {
                        $existdata = file_get_contents($datafile);
                        $tempdata = json_decode($existdata, true);
                    }
                    else{
                        $tempdata = array();
                    }

                    if(!is_array($tempdata))
                        {
                            $tempdata = array(); 
                        }
                    $tempdata [] = $formdata;
                    $jsondata = json_encode($tempdata, JSON_PRETTY_PRINT);
                if(file_put_contents($datafile,$jsondata)!== false)
                    {
                        echo "Data Saved";
                    }
                    else{
                        echo "Please Try Again";
                    }
                $data = file_get_contents($datafile);
                $mydata = json_decode($data);
            }
            else{
                echo "Please try again!";
            }
    }

if (isset($_SESSION["name"]) || isset($_COOKIE["name"]) || isset($_SESSION["email"]) || isset($_COOKIE["email"]) || isset($_SESSION["website"]) || isset($_COOKIE["website"]) || isset($_SESSION["comment"]) || isset($_COOKIE["comment"]) || isset($_SESSION["gender"]) || isset($_COOKIE["gender"])) {
    echo "Welcome Back";
} else {
    echo "Please log in again!";
}

?>