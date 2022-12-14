<?php
include("conexion.php");
session_start();

if(!isset($_SESSION["id_user"])){
        ?>
        <script>
            window.location.href="/ejercicio1PHP/login.php";
        </script>
        <?php
    //header("Location: /ejercicio1PHP/login.php");
}

$user = $_SESSION["id_user"];
$sql = "SELECT * FROM users WHERE id = $user";

$consulta = mysqli_query($conexion, $sql);
$fila = $consulta -> fetch_assoc();
$_SESSION["nusuario"] = $fila["user"];

if($fila["admin"] != 1){
    ?>
        <script>
            window.location.href="/ejercicio1PHP/tienda.php";
        </script>
        <?php
    //header("Location: /ejercicio1PHP/tienda.php");
}

    

    if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM productos WHERE id = $id";

    $result = mysqli_query($conexion, $query);

    if(mysqli_num_rows($result) == 1){
        $fila = mysqli_fetch_array($result);
        $id = $fila['id'];
        $nombre = $fila['nombre'];
        $categoria = $fila['categoria'];
        $cantidad = $fila['cantidad'];
        $precio = $fila['precio'];

    }

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
    <title>Editar</title>
    <!-- Custom fonts for this template -->
    <script src="https://kit.fontawesome.com/9ddb4510e0.js" crossorigin="anonymous"></script>
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

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-text mx-3">CRUD</div>
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fa-brands fa-php"></i>
                </div>

            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Tienda
            </div>

            <li class="nav-item">
                <a class="nav-link" href="tienda.php">
                    <i class="fas fa-fw fa-shop"></i>
                    <span>Tienda</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="carrito.php">
                    <i class="fas fa-fw fa-cart-shopping"></i>
                    <span>Carrito</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Admin
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="insert.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Insertar Producto</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="productos.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Productos</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="users.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Usuarios</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>


                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION["nusuario"]; ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Ajustes
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar sesi??n
                                </a>
                            </div>
                        </li>
                    </ul>

                </nav>

                <div class="container p-4">
                    <div class="row">
                        <div class="col-md-4 mx-auto">
                            <h2>Editar Producto</h2>
                            <div class="card card-body">
                                <form action="./datos.php" method="POST">

                                    <input type="hidden" name="id" value="<?=$id ?>">
                                    <!-- Nombre input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="nombre">Nombre</label>
                                        <input type="text" name="nombre" class="form-control"
                                            placeholder="Inserta el nombre del producto" value="<?=$nombre ?>"
                                            autofocus />
                                    </div>

                                    <!-- Categoria input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="categoria">Categoria</label>
                                        <input type="text" name="categoria" class="form-control"
                                            placeholder="Inserta la categoria del producto" value="<?=$categoria ?>" />
                                    </div>
                                    <!-- Cantidad input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="cantidad">Cantidad</label>
                                        <input type="number" name="cantidad" class="form-control"
                                            placeholder="Inserta la cantidad del producto" value="<?=$cantidad ?>" />
                                    </div>
                                    <!-- Precio input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="precio">Precio</label>
                                        <input type="number" name="precio" class="form-control"
                                            placeholder="Inserta el precio del producto" value="<?=$precio ?>" />
                                    </div>

                                    <!-- Submit button -->
                                    <button type="submit" class="btn btn-success btn-block mb-4" value="1"
                                        name="commandEditar">Editar</button>

                                    <!-- Logout Modal-->
                                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Seguro que quieres
                                                        salir?</h5>
                                                    <button class="close" type="button" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">??</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Pulsa en "Logout" si quieres cerrar la sesi??n
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="./datos.php" method="POST">
                                                        <button class="btn btn-secondary" type="button"
                                                            data-dismiss="modal">Cancelar</button>
                                                        <button class="btn btn-primary" value="1"
                                                            name="commandLogOut">Logout</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- JavaScript Bundle with Popper -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
                    crossorigin="anonymous"></script>