<?php
  session_start();

  require_once 'auth.php';
  $user = new Auth();
  // Handle Register AJAX Request
  if(isset($_POST['action']) && $_POST['action']=="register"){
    
  }

  // Handle Login AJAX Request
  if(isset($_POST['action']) && $_POST['action']=="login"){
    $username = $user->testInput($_POST['username']);
    $pass = $user->testInput($_POST['password']);
    $loggedInUser = $user->login($username);
    if ($loggedInUser != null) {
      if (password_verify($pass,$loggedInUser['password'])) {
        if (!empty($_POST['rem'])) {
          setcookie("username",$username, time()+(30*24*60*60), '/');
          setcookie("password",$pass, time()+(30*24*60*60), '/');
        }else{
          setcookie("username","",1, '/');
          setcookie("password","",1, '/');
        }
        
        $_SESSION['login_details_id'] =  $user->InsertLoginDetails($loggedInUser['user_id']);
        $_SESSION['user_id'] = $loggedInUser['user_id'];
        $_SESSION['fullname'] = $loggedInUser['fullname'];
        $_SESSION['user_id']= $username;
        echo  "login";
      }else{
      echo  $user->showMessage('danger', 'Password is incorrect!');
      }
    }else{
      echo  $user->showMessage('danger', 'User not found!');
    }
  }

  // Handle Forget Ajax Request
  if(isset($_POST['action']) && $_POST['action']=="forgot"){
    
  }


/*if(isset($_POST['login']))
{
    $query = "	SELECT * FROM login WHERE username = :username ";
    $statement = $connect->prepare($query);
	$statement->execute(array(':username' => $_POST["username"]	));	
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
				$sub_query = "
				INSERT INTO login_details 
	     		(user_id) 
	     		VALUES ('".$row['user_id']."')
				";
				$statement = $connect->prepare($sub_query);
				$statement->execute();
				$_SESSION['login_details_id'] = $connect->lastInsertId();
				header('location:index.php');
			}
			else
			{
				$message = '<label>Wrong Password</label>';
			}
		}
	}
	else
	{
		$message = '<label>Wrong Username</labe>';
	}
}*/