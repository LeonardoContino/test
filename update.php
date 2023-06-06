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



$options = array('benzina', 'diesel', 'hibrid', 'elettrico', 'gpl');


if(isset($_GET['id'])){
  $auto_id = mysqli_real_escape_string($conn,$_GET['id']) ;
  $sql = "SELECT * FROM auto WHERE id='$auto_id'";
  $query_run = mysqli_query($conn, $sql);

  if(mysqli_num_rows($query_run) > 0){
    $auto = mysqli_fetch_array($query_run);
  }else{
    echo "<h4> Questo id non esiste </h4>";
  }

  if(isset($_POST['update_from'])){
    $auto_id =mysqli_real_escape_string( $_POST['id']) ;
   $targa =mysqli_real_escape_string($_POST['targa']) ;
   $alimentazione =mysqli_real_escape_string( $_POST['alimentazione']);
   $descrizione =mysqli_real_escape_string($_POST['descrizione']) ;
   $date =mysqli_real_escape_string($_POST['reg_date']) ;
   
   $sql = "UPDATE auto SET targa='$targa', alimentazione='$alimentazione', descrizione='$descrizione', reg_date='$date'
    WHERE id='$auto_id'";
    $query_run = mysqli_query($conn, $sql);
  
   var_dump($sql);
   }
}




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


    <form action="index.php" method="POST">
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