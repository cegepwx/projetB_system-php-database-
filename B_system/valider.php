<?php 
 
  try{
    insertRecord();
    
  }
  catch (Exception $ex){
    echo "Il'y a un probleme.".$ex;
  }


  function insertRecord(){

    try{
      require_once "connectionDatabase.php";
      $clientPrenom = $_POST['name'];
      $clientNom = $_POST['srname'];
      $clientEmial = $_POST['email'];
      $clientSubject = $_POST['subject'];
      // $clientMessage = $_POST[''];
      

      $mybd = new DataBaseConnectionManager();
      $conn = $mybd->getConnection();

      echo $clientPrenom . " ";
      echo $clientNom."<br>";
      echo $clientEmial."<br>";

      $sql = "INSERT INTO user (prenon, nom, email) VALUES ('$clientPrenom', '$clientNom', '$clientEmial');";

      if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } 
      else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      $conn->close();  
    }

    catch (Exception $ex){
      echo "Il'y a un probleme de function insertRecord().".$ex;
    }
  }


  // function trouverId($nom, $prenom){

  //   try{
  //     $mybd = new DataBaseConnectionManager();
  //     $conn = $mybd->getConnection();

  //     $sql = $conn->query("SELECT * FROM user;"); 

  //     if ($conn->query($sql) === TRUE){
  //       ehco "Il y a des records.";
  //       $rows = $sql->num_rows;
  //       echo "Il y a ".$rows." records. ";

  //       // if($rows){
  //       //   while($row = $sql->fetch_assoc()){
  
  //       //   }
  //       // }
  //     }
  //     else{
  //       echo "Error: " . $sql . "<br>" . $conn->error;
  //     }
      
      
  //     $conn->close();  
  //   }

  //   catch (Exception $ex){
  //     echo "Il'y a un probleme de function trouverId().".$ex;
  //   }

  // }

  function retirerRecord($id_client){

    try{
      $mybd = new DataBaseConnectionManager();
      $conn = $mybd->getConnection();

      $sql = "DELETE FROM user WHERE id=$id_client;";

      if ($conn->query($sql) === TRUE) {
        echo "Record is deleted successfully";
      } 
      else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      $conn->close(); 
    }
    catch (Exception $ex){
      echo "Il'y a un probleme de function retirerRecord.".$ex;
    }

  }

?>