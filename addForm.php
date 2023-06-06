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

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  header('Location: ./index.php');
}


$conn->close();

 ?>

<?php include 'head.php' ?>

<body class="container">
<div class="my-3 d-flex justify-content-center">
        Aggiungi Noleggio
    </div>


    <form action="addForm.php" method="POST">
    <a href="index.php" class="btn btn-secondary">torna indietro</a>
  <div class="mb-3">
    <label for="targa"  class="form-label">targa</label>
    <input type="text" class="form-control" id="targa"  name="targa"  required>
    
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

