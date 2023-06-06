<?php
session_start();
    if(isset($_POST['targa'])){
        $targa = $_POST['targa'];
        $alimentazione = $_POST['alimentazione'];
        $descrizione = $_POST['descrizione'];
        // $date = $_POST['reg_date'];
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


     
?>