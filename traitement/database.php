<?php
require_once 'config.php';

class Admin extends Database{
   //Admin Login
  public function admin_login($username,$password){
     $sql = "SELECT username, password FROM admin WHERE username =:username AND password = :password";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['username'=>$username,'password'=>$password]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
  }

  // Count Total No.of Rows
  public function totalcount($tableName){
  	 $sql = "SELECT * FROM $tableName ";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    $count = $stmt->rowCount();
    return $count;
  }
   // Count Total verified/unverified Users
  public function verified_users($status){
  	 $sql = "SELECT * FROM users WHERE verified = :status ";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['status'=>$status]);
    $count = $stmt->rowCount();
    return $count;
  }

   // Gender percent of users
  public function genderPercent(){
  	 $sql = "SELECT gender, COUNT(*) AS number FROM users where gender !='' GROUP BY gender";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
  }


  // USER verifies/unverified percent of users
  public function verifiedPercent(){
  	 $sql = "SELECT verified, COUNT(*) AS number FROM users GROUP BY verified";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
  // Tota l Website Hits
  public function hits(){
  	 $sql = "SELECT hits FROM visitors ";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    $count = $stmt->fetch(PDO::FETCH_ASSOC);
    return $count;
  }

  //fetch all users registered

  public function fetchAllUser($val){
  	 $sql = "SELECT * FROM users WHERE deleted !=$val";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
  }

  //Fetch User's Details by ID
  public function fetchUseDetailsByID($id){

    $sql = "SELECT * FROM users WHERE id=:id AND deleted!=0";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['id'=>$id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
  }

//Delete User Ajax Request
  public function delete_user($id,$val){
    $sql ="UPDATE users SET deleted = $val WHERE id =:id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['id'=>$id]);
    return true;
  }

//Restore User Ajax Request
  public function restore_user($id,$val){
    $sql ="UPDATE users SET deleted = $val WHERE id =:id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['id'=>$id]);
    return true;
  }

 //fetch all users registered

  public function fetchAllNotes(){
     $sql = "SELECT notes.id,notes.title,notes.note,notes.created_at,notes.updated_at,users.name,users.name,users.email FROM notes INNER JOIN users ON notes.uId = users.id ";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
  }
// delete note Ajax Request
  public function deleteNote_user($id)
  {
    $sql ="DELETE FROM notes WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['id'=>$id]);
    return true;
  }
//Fetch Notification
  public function fetchNotificationAll()
  {
   $sql = "SELECT notification.id,notification.message,notification.created_at,users.name,users.email FROM notification INNER JOIN users ON notification.uId = users.id WHERE notification.type = 'admin' ORDER BY notification.id LIMIT 5";
     $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
  }


}


?>