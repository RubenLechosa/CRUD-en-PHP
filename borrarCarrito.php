<?php
include("conexion.php");

session_start();

if(!isset($_SESSION["id_user"])){
  header("Location: /ejercicio1PHP/login.php");
}

$user = $_SESSION["id_user"];
$sql = "SELECT * FROM users WHERE id = $user";

$consulta = mysqli_query($conexion, $sql);
$fila = $consulta -> fetch_assoc();
$_SESSION["nusuario"] = $fila["user"];

if($fila["admin"] != 1){
    header("Location: /ejercicio1PHP/tienda.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Borrar Elemento</title>
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <div class="" id="deleterow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Seguro que quieres borrar el elemento del carrito?</h5>
                </div>
                <div class="modal-body">Pulsa en "SI" si quieres borrar el elemento definitivamente</div>
                <div class="modal-footer">
                    <form action="./datos.php" method="GET">
                        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                        <button id="boton" type="submit" class="btn btn-success d-inline-block" value="1"
                            name="commandBorrarCarrito">Si</button>
                        <a id="boton" href="carrito.php" class="btn btn-danger d-inline-block">No</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<!-- JavaScript Bundle with Popper -->
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>