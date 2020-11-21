<?php

require_once 'config.php';

class Auth extends Database{

  // Register New User
  public function register($name,$email,$password) {
     $sql ="INSERT INTO login ( name, email, password) VALUES (:name, :email, :password)";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['name'=>$name,'email'=>$email,'password'=>$password]);
      return true;
  }

  //Check if user already registered
  public function user_exit($username){
    $sql = "SELECT username FROM login WHERE username=:username";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['username'=>$username]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

  //Login Existing User
  public function login($username){
    $sql = "SELECT  user_id, username, password FROM login WHERE username =:username ";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['username'=>$username]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
  }
  //insert login details
   public function InsertLoginDetails($id)
  {
    $sql = " INSERT INTO login_details   (user_id)  VALUES (:id)";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['id'=>$id]);
    return $this->conn->lastInsertId();
  }

  // Current User In Session
  public function currentUser($email){
    $sql = "SELECT * FROM login WHERE usermane =:usermane AND deleted != 0";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['usermane'=>$usermane]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
  }

  // Forgot Password
  public function forgot_password($token,$username){
    $sql = "UPDATE login SET token = :token, token_expire = DATE_ADD(NOW(), INTERVAL 10 MINUTE) WHERE username = :username";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['token'=>$token,'username'=>$username]);
    return true;
  }


  //REset Password User
  public function reset_pass_auth($username,$token){
     $sql = "SELECT id FROM login  WHERE username = :username AND token = :token AND token != '' AND token_expire > NOW() AND deleted !=0";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['username'=>$username,'token'=>$token]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
  }

  // Update new password
  public function update_new_pass($pass,$username){
    $sql = "UPDATE login SET token = '', password =:pass WHERE username = :username AND deleted !=0";
     $stmt = $this->conn->prepare($sql);
    $stmt->execute(['pass'=>$pass,'username'=>$username]);
    return true;
  }


  //Change Password User Ajax Request
  public function change_pass($cid,$cnewpass){
     $sql = "UPDATE login SET password = :cnewpass WHERE id =:cid AND deleted != 0";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['cid'=>$cid,'cnewpass'=>$cnewpass]);
    return true;
  }


  // Verify E-mail
  public function verify_email($email){
     $sql = "UPDATE users SET verified = 1 WHERE email =:email AND deleted != 0";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['email'=>$email]);
    return true;
  }

}