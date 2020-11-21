<?php
include('../database_connection.php');

session_start();
if(isset($_POST["action"]) && $_POST['action'] ="register")
{
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $name = trim($_POST["name"]);
    $check_query = "SELECT * FROM login WHERE username = :username";
    $statement = $connect->prepare($check_query);
    $check_data = array(
        ':username'		=>	$username
    );
    if($statement->execute($check_data))
    {
        if($statement->rowCount() > 0)
        {
            echo showMessage('danger', 'Username already taken');
        }
        else
        {
            $data = array(
                ':username'		=>	$username,
                ':fullname'     =>	$name,
                ':password'		=>	password_hash($password, PASSWORD_DEFAULT)
            );

            $query = "INSERT INTO login (username,fullname, password) VALUES (:username,:fullname, :password)";
            $statement = $connect->prepare($query);
            if($statement->execute($data))
            {
                echo showMessage('success', 'Registration Completed');

            }

        }
    }
}