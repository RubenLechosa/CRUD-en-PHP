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

    <nav class="navbar navbar-dark bg-dark">
        <div class="container collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="navbar-brand" href="index.php">Insertar Productos</a>
                </li>
            </ul>
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
        }

        ?>
    </table>


</body>

</html>

