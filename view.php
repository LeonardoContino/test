<?php
 include('head.php');

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

$id = $_GET['id'];

$sql= "SELECT * FROM auto WHERE id=$id";
$res = mysqli_query($conn, $sql);
$auto = mysqli_fetch_array($res);

?>

<body>
    <div class="container">
    <div class="my-3 d-flex justify-content-center">
        Dettagli Noleggio
    </div>
    <div>
        <a href="index.php" class="btn btn-secondary">torna indietro</a>
    </div>

    <div class="noleggio-details">

        <h3>Dettaglio targa n.<?=$auto['targa'] ?></h3>
    </div>
    </div>
</body>