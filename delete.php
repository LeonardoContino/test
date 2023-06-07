
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
 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM auto WHERE id=$id";
    mysqli_query($conn,$sql);

  }
  if($_SERVER['REQUEST_METHOD'] === 'GET'){
    header('Location: ./index.php');
  }
?>
