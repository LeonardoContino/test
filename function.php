<?php
session_start();
    if(isset($_POST['targa'])){
        $targa = $_POST['targa'];
        $alimentazione = $_POST['alimentazione'];
        $descrizione = $_POST['descrizione'];
  
        }
        
        
     $sqlquery = "SELECT * FROM auto";
        $result = $conn->query($sqlquery);
        $auto= [];
    if($result->num_rows){
     while($row = $result->fetch_assoc()){
       $auto[] = $row;
       }
    }

      
    
    
          
      
       if(isset($_POST["search"])){
         $str = $_POST["search"];
         $searchQuery = "SELECT * FROM `auto` WHERE targa like '$str%'";
         $res = $conn->query($searchQuery);    
         $auto = [];
         if($res->num_rows){
          while($row = $res->fetch_assoc()){
             $auto[] = $row;
           }
         } 
       };
    
       if(isset($_POST["reset"])){
        $str = $_POST["search"];
        $searchQuery = "SELECT * FROM `auto`";
        $res = $conn->query($searchQuery);    
        $auto = [];
        if($res->num_rows){
         while($row = $res->fetch_assoc()){
            $auto[] = $row;
          }
        } 
      };
    
    
      $options = array('benzina', 'diesel', 'hibrid', 'elettrico', 'gpl');     
    
      if(isset($_POST["select"])){
    
        $str = $_POST["select"];
        $searchQuery = "SELECT * FROM `auto` WHERE alimentazione like '$str%'";
        $res = $conn->query($searchQuery);    
          $auto = [];
          if($res->num_rows){
           while($row = $res->fetch_assoc()){
              $auto[] = $row;
            }
          } 
      
      }


      if(isset($_GET['id'])){
        $auto_id = mysqli_real_escape_string($conn,$_GET['id']) ;
        $sql = "SELECT * FROM auto WHERE id='$auto_id'";
        $query_run = mysqli_query($conn, $sql);
      
        if(mysqli_num_rows($query_run) > 0){
          $auto = mysqli_fetch_array($query_run);
        }else{
          echo "<h4> Questo id non esiste </h4>";
        }
      
      
      }
      if(isset($_POST['update_form'])){
        $auto_id =mysqli_real_escape_string($conn, $_POST['auto_id']) ;
       $targa =mysqli_real_escape_string($conn,$_POST['targa']) ;
       $alimentazione =mysqli_real_escape_string($conn, $_POST['alimentazione']);
       $descrizione =mysqli_real_escape_string($conn,$_POST['descrizione']) ;
       
       $sql = "UPDATE auto SET targa='$targa', alimentazione='$alimentazione', descrizione='$descrizione' WHERE id='$auto_id'";
        
       
       if(mysqli_query($conn, $sql)){
        echo "Dati Modificati";
       } else{
        die("dati non modificati");
       }
       
       }



    
?>