<?php 
class DataBaseConnectionManager{
  private $serverName = "localhost";
  private $userName = "root";
  private $password = "";
  private $dbName = "users_b_system";
  private $conn;

  public function getConnection(){
    try{
      $this->conn = new mysqli ($this->serverName, $this->userName, $this->password, $this->dbName);
      $this->conn->set_charset("utf8");

      if ($this->conn->connect_error){
        echo "This page can't be openned.";
      }
      else{
        echo "OK! It's done.<br>";
      }
     
    }
    catch (Exception $ex){
      echo "Il'y a un probleme. ".$ex;
    }
    return $this->conn;
  }
}
?>