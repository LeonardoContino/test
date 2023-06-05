<?php
$servername = "localhost";
$username = "root";
$password = "root";
$db = "db_test";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
//  $sql = 'CREATE DATABASE db_test';

//    $sql = "CREATE TABLE auto(
//  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//   nomeAuto VARCHAR(30) NOT NULL,
//    alimentazione VARCHAR(30) NOT NULL,
//    descrizione TEXT(100),
//   reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
//   )";


//  if ($conn->query($sql) === TRUE) {
//    echo "Database created successfully";
//   } else {
//     echo "Error creating database: " . $conn->error;
//    }
// if(isset($_POST['targa'])){
//   $targa = $_POST['targa'];
//   $alimentazione = $_POST['alimentazione'];
//   $descrizione = $_POST['descrizione'];

 
//  var_dump($targa,$alimentazione,$descrizione);


//   $sql = "INSERT INTO auto(targa,alimentazione,descrizione) VALUES ( '$targa', '$alimentazione', '$descrizione')";
//   $myQuery= mysqli_query($conn,$sql);

 
 
// }
if(isset($_POST['targa'])){
$targa = $_POST['targa'];
$alimentazione = $_POST['alimentazione'];
$descrizione = $_POST['descrizione'];
$date = $_POST['reg_date'];
$date = date('l');
}


    $sqlquery = "SELECT * FROM auto";
    $result = $conn->query($sqlquery);
     $auto= [];
      if($result->num_rows){
       while($row = $result->fetch_assoc()){
        $auto[] = $row;
       }
       }
  



  
   if(isset($_POST["submit"])){
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

 



        

  
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css' integrity='sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==' crossorigin='anonymous'/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    
    <title>Document</title>


</head>
<body class="container">
    <div class="my-3 d-flex justify-content-center">
        Gestione Noleggi
    </div>

    <div class="d-flex justify-content-between align-items-center">
        <a class="btn btn-primary" href="addForm.php">aggiungi noleggi</a>
       <form action="" method="POST">
       
       </form>
       <form action="" method="POST" class="search-form">
       <select type="submit" class="form-select me-2" id="select" name="select">
       <option value="">alimentazione</option>
    <?php foreach($options as $option):?>
      <option name="<?=$option?>" value="<?=$option?>"><?=$option?></option>
    <?php endforeach;?>
    

    </select>

          <input placeholder="Cerca Targa" type="text" name="search" class="search">
          <input type="submit" name="submit" class="btn btn-primary ms-2">
          <button class="btn-reset ms-2" type="submit" name="reset"><i class="fa-solid fa-rotate-left"></i></button>
          </form>
    </div>

<table class="table table-custom">
  <thead>
    <tr>
    <th scope="col">id</th>
      
      <th scope="col">targa</th>
      <th scope="col">alimentazione</th>
      <th scope="col">descrizione</th>
      <th scope="col">data</th>

    </tr>
  </thead>
  <tbody>
    <?php foreach($auto as $singleauto):?>
    <tr>
    <td><?= $singleauto['id']?></td>
    <td> <?= $singleauto['targa']?></td>
    <td><?= $singleauto['alimentazione']?></td>
    <td><?= $singleauto['descrizione']?></td> 
    <td><?= $singleauto['reg_date']?></td> 

    </tr>
    <?php endforeach;?>
    

  </tbody>
</table>


</body>
</html>