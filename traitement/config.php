<?php
Class Database  {
  private $dsn = "mysql:host=localhost;dbname=chat;charset=utf8mb4";
  private  $dbuser = 'root';
  private  $dbpass = '';
  public  $conn ;

  // Method for connection to the database
  public function __construct() {
    try{
      $this->conn = new PDO($this->dsn,$this->dbuser,$this->dbpass);
      $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }catch(PDOException $e){
      die('Error: '.$e->getMessage());
    }
    return $this->conn;
  }

  //Check Input
  public function testInput($data) {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     $data = strip_tags($data);
      return $data;
  }

   // Method for displaying Success and Error Messsage
    public function showMessage($type,$message){
       return '
        <div class="alert alert-'.$type.' alert-dismissible" >
        <button type="button" class="close" data-dismiss="alert" >&times;</button>
        <strong class="text-center">'.$message.'</strong>.
        </div>
      ';
  }

  //



}

?>