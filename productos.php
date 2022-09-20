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
  <a class="navbar-brand disabled" href="#"></a>
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
      <form action="./datos.php" method="POST" class="d-flex" role="search">
        <input class="form-control me-1" type="search" placeholder="ID" aria-label="Search">
        <input class="form-control me-1" type="search" placeholder="Nombre" aria-label="Search">
        <input class="form-control me-1" type="search" placeholder="Categoria" aria-label="Search">
        <input class="form-control me-1" type="search" placeholder="Cantidad" aria-label="Search">
        <input class="form-control me-1" type=" search" placeholder="Precio" aria-label="Search">
        <button id="boton" type="submit" class="btn btn-success d-inline-block" value="1" name="commandFiltrar">Filtrar</button>
      </form>
    </div>
  </div>
</nav>
<body>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Categoria</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Acciones</th>
            <th></th>
        </tr>
        <?php
        include_once("conexion.php");
        $sql2 = "SELECT * FROM `productos`";
        $consulta = mysqli_query($conexion, $sql2);
        while($fila = $consulta -> fetch_assoc()){
            echo "<tr>";  
            echo "<td>".$fila["id"]."</td>";
            echo "<td>".$fila["nombre"]."</td>";
            echo "<td>".$fila["categoria"]."</td>";
            echo "<td>".$fila["cantidad"]."</td>";
            echo "<td>".$fila["precio"]."</td>";
            echo "<td> <a class='btn btn-primary' href='editar.php?id=".$fila['id']."'><i class='fa-solid fa-pen-to-square'></i></a>
            <a class='btn btn-danger' href='borrar.php?id=".$fila['id']."'><i class='fa-solid fa-trash'></i></a></td>";
            echo "<td> </td>";
        }

        ?>
    </table>
    <div id="btnInsertar">
        <a type="button" href="index.php" class="btn btn-success btn-block mb-4">Insertar Producto</a>
    </div>

</body>

</html>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
