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


if(isset($_POST['targa'])){
  $targa = $_POST['targa'];
  $alimentazione = $_POST['alimentazione'];
  $descrizione = $_POST['descrizione'];
  

  $sql = "INSERT INTO auto(targa,alimentazione,descrizione) VALUES ( '$targa', '$alimentazione', '$descrizione')";
  $myQuery= mysqli_query($conn,$sql);

}

$options = array('benzina', 'diesel', 'hibrid', 'elettrico', 'gpl');




$conn->close();

 ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script defer src="main.js"></script>
    <title>form</title>
</head>

<body class="container">
<div class="my-3 d-flex justify-content-center">
        Aggiungi Noleggio
    </div>


    <form action="addForm.php" method="POST">
    <a href="index.php" class="btn btn-secondary">torna indietro</a>
  <div class="mb-3">
    <label for="targa"  class="form-label">targa</label>
    <input type="text" class="form-control" id="targa"  name="targa" required>
    
  </div>
  <div class="mb-3">
    <label for="alimentazione" class="form-label">alimentazione</label>
    <select type="text" class="form-select" id="alimentazione" name="alimentazione" required>
    <?php foreach($options as $option):?>
      <option value="<?=$option?>"><?=$option?></option>
    <?php endforeach;?>
    </select>  
  </div>
  <div class="mb-3">
    <label for="descrizione" class="form-label">descrizione</label>
    <input type="text" class="form-control" id="descrizione" name="descrizione" required>
    

  </div>
 

  <button id="btn-submit" type="submit" value="submit" name="form_submit" class="btn btn-primary">Aggiungi</button>



</form>
</body>

