<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>form</title>
</head>

<body class="container">
<div class="my-3 d-flex justify-content-center">
        Aggiungi Noleggio
    </div>
    <form action="index.php" method="POST">
  <div class="mb-3">
    <label for="targa" class="form-label">targa</label>
    <input type="text" class="form-control" id="targa" name="targa">
  </div>
  <div class="mb-3">
    <label for="alimentazione" class="form-label">alimentazione</label>
    <input type="text" class="form-control" id="alimentazione" name="alimentazione">
  </div>
  <div class="mb-3">
    <label for="descrizione" class="form-label">descrizione</label>
    <input type="text" class="form-control" id="descrizione" name="descrizione">
  </div>
  
  <button type="submit" value="submit" class="btn btn-primary">Aggiungi</button>
</form>
</body>