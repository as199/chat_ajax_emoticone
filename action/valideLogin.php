<?php

include('../database_connection.php');

session_start();

$message = '';

if(isset($_SESSION['user_id']))
{
    header('location:index.php');
}
/**
 * login validation
 */
if(isset($_POST['action']) && $_POST['action']="login")
{
    $query = "SELECT * FROM login WHERE username = :username ";
    $statement = $connect->prepare($query);
    $statement->execute(array(':username' => $_POST["username"]));
    $count = $statement->rowCount();
    if($count > 0)
    {
        $result = $statement->fetchAll();
        foreach($result as $row)
        {
            if(password_verify($_POST["password"], $row["password"]))
            {
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['username'] = $row['username'];
                $sub_query = "INSERT INTO login_details (user_id) VALUES ('".$row['user_id']."')";
                $statement = $connect->prepare($sub_query);
                $statement->execute();
                $_SESSION['login_details_id'] = $connect->lastInsertId();
                echo "login";
            }else
            {
              echo showMessage('danger', 'Password is incorrect!');
            }
        }
    }
    else
    {
        echo showMessage('danger', 'User not found!');
    }
}

/**
 *
 */


