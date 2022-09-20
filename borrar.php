<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Productos</title>
    <link rel="stylesheet" href="style.css">
        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/9ddb4510e0.js" crossorigin="anonymous"></script>
</head>

<body>

<nav class="navbar navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Crud en PHP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Insertar Productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="productos.php">Almacén</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<body>

<div class="container ola">
    <div class="card bg-dark">
      <div class="card-body">
        <h5 class="card-title">Seguro quieres borrar el producto?</h5>
          <form action="./datos.php" method="GET">
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
            <button id="boton" type="submit" class="btn btn-success d-inline-block" value="1" name="commandBorrar">Si</button>
            <a id="boton" href="productos.php" class="btn btn-danger d-inline-block">No</a>
          </form>
      </div>
    </div>
  </div>



</body>

</html>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>