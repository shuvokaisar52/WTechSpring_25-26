<?php
class db
{
    function connection()
    {
        $db_host = "localhost";
        $db_user = "root";
        $db_password = "";
        $db_name = "practice";

        $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
        if ($connection->connect_error) {
            die("Please connection the database" . $connection->connect_error);
        }
        return $connection;
    }

    function signup($connection, $tablename, $name, $email, $password)
    {
        $sql = "INSERT INTO " . $tablename . "(name,email,password) VALUES('" . $name . "','" . $email . "','" . $password . "')";
        $result = $connection->query($sql);
        return $result;
    }

    function signin($connection, $tablename, $email, $password)
    {
        $sql = "SELECT * FROM " . $tablename . " WHERE email='" . $email . "' AND password='" . $password . "'";
        $result = $connection->query($sql);
        return $result;
    }

    function getdata($connection, $tablename, $email)
    {
        $sql = "SELECT * FROM " . $tablename . " WHERE email='" . $email . "'";
        $result = $connection->query($sql);
        return $result;
    }
}

?>