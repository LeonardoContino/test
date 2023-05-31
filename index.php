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

  $targa = $_POST['targa'];
  $alimentazione = $_POST['alimentazione'];
  $descrizione = $_POST['descrizione'];
 //var_dump($targa,$alimentazione,$descrizione);

 
  $sql = "INSERT INTO auto(targa,alimentazione,descrizione) VALUES ( '$targa', '$alimentazione', '$descrizione')";
  $myQuery= mysqli_query($conn,$sql);


  try{
    $sqlquery = "SELECT * FROM auto";
    $result = $conn->query($sqlquery);
    $auto= [];
    if($result->num_rows){
        while($row = $result->fetch_assoc()){
           $auto[] = $row;
        }
    }
  } catch(Exception $e){
    echo $e->getMessage();
    die();

  };

  


  
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>
<body class="container">
    <div class="my-3 d-flex justify-content-center">
        Gestione Noleggi
    </div>

    <div>
        <a class="btn btn-primary" href="addForm.php">aggiungi noleggi</a>
    </div>

    <table class="table">
  <thead>
    <tr>
    <th scope="col">id</th>
      
      <th scope="col">targa</th>
      <th scope="col">alimentazione</th>
      <th scope="col">descrizione</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($auto as $singleauto):?>
    <tr>
    <td><?= $singleauto['id']?></td>

      <td> <?= $singleauto['targa']?></td>
      <td><?= $singleauto['alimentazione']?></td>
      <td><?= $singleauto['descrizione']?></td> 
    </tr>
    <?php endforeach;?>
    

  </tbody>
</table>


</body>
</html>