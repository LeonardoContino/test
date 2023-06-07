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

 
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'head.php' ?>
<body class="container">
    <div class="my-3 d-flex justify-content-center">
        Gestione Noleggi
    </div>

    <div class="d-flex justify-content-between align-items-center">
        <a class="btn btn-primary" href="addForm.php">aggiungi noleggi</a>
       <form action="" method="POST" class="search-form">
       <select type="submit" class="form-select me-2" id="select" name="select">
       <option value="">alimentazione</option>
    <?php foreach($options as $option):?>
      <option name="<?=$option?>" value="<?=$option?>"><?=$option?></option>
    <?php endforeach;?>
    

    </select>
    <button  type="submit" name="submit"  class="btn btn-primary ms-2">Filtra</button>
    
    
       </form>
       <form action="" method="POST" class="search-form">
       

          <input placeholder="Cerca Targa" type="text" name="search" class="search">
          <button type="submit" name="submit" class="btn btn-primary ms-2">Filtra</button>
          <button class="btn-reset ms-2" type="submit" name="submit"><i class="fa-solid fa-rotate-left"></i></button>
          </form>
    </div>

    <div class="table-custom">
    <table class="table">
  <thead>
    <tr>
    <th scope="col">id</th>
      
      <th scope="col">targa</th>
      <th scope="col">alimentazione</th>
      <th scope="col">descrizione</th>
      <th scope="col">data</th>
      <th scope="col">seleziona</th>


    </tr>
  </thead>
  <tbody>
    <?php foreach($auto as $singleauto):?>
    <tr>
    <td><?= $singleauto['id']?></td>
    <td> <?= $singleauto['targa']?></td>
    <td><?= $singleauto['alimentazione']?></td>
    <td><?= $singleauto['descrizione']?></td> 
    <td><?=$singleauto['reg_date']?></td>
    <td>
    <a href="view.php?id=<?=$singleauto['id']?>" class="btn btn-primary" ><i class="fa-solid fa-eye"></i></a>
      <a href="update.php?id=<?=$singleauto['id']?>" class="btn btn-success"><i class="fa-regular fa-pen-to-square"></i></a>
      <a href="delete.php?id=<?= $singleauto['id']?>" type="submit"  name="delete_form" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
    </td> 

    </tr>
    <?php endforeach;?>
    <?php if(!$auto): ?>
    <div class="msg-error">
     <h3>Non ci sono auto</h3> 
    </div> 
    <?php endif?>
      

  
    
    

  </tbody>
</table>
    </div>



</body>
</html>