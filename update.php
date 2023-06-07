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

include 'function.php';


$options = array('benzina', 'diesel', 'hibrid', 'elettrico', 'gpl');





 if($_SERVER['REQUEST_METHOD'] === 'POST'){
   header('Location: ./index.php');
 }

$conn->close();
?>


<?php include 'head.php' ?>

<body class="container">
<div class="my-3 d-flex justify-content-center">
        Modifica Noleggio
    </div>


    <form action="" method="POST">
    <a href="index.php" class="btn btn-secondary">torna indietro</a>

    <input type="hidden" name="auto_id" value="<?= $auto['id']?>">
  <div class="mb-3">
    <label for="targa"  class="form-label">targa</label>
    <input type="text" class="form-control" id="targa"  name="targa" value="<?= $auto['targa']?>"  required>
    
  </div>
  <div class="mb-3">
    <label for="alimentazione" class="form-label">alimentazione</label>
    <select type="text" class="form-select" id="alimentazione" name="alimentazione"  value="<?= $auto['alimentazione']?>" required>
    <option value="<?=$auto['alimentazione'] ?>"><?=$auto['alimentazione']?></option>
    <?php foreach($options as $option):?>
      <option value="<?=$option ?>"><?=$option?></option>
    <?php endforeach;?>
    </select>  
  </div>
  <div class="mb-3">
    <label for="descrizione" class="form-label">descrizione</label>
    <input type="text" class="form-control" id="descrizione" name="descrizione"  value="<?= $auto['descrizione']?>" required>
    

  </div>
 

  <button id="btn-submit" type="submit"  name="update_form" class="btn btn-primary">Aggiorna Targa</button>



</form>