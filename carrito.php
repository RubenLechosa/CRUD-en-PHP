<!DOCTYPE html>
<html lang="en">
<?php 
include_once("conexion.php");
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

    ?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Carrito</title>
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

            <!-- Nav Item - Inicio -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Inicio</span></a>
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

            <li class="nav-item active">
                <a class="nav-link" href="carrito.php">
                    <i class="fas fa-fw fa-cart-shopping"></i>
                    <span>Carrito</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <?php if($fila["admin"]) { ?>
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
            <li class="nav-item">
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
            <?php } ?>
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
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION["nusuario"]; ?></span>
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
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Carrito</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!--<form action="" method="GET" class="d-flex justify-content-end">

                                <input style="width: 200px;" class="form-control mr-1" type="text" placeholder="Nombre"
                                    name="nombre" value="<?php if(isset($_GET["nombre"])){echo($_GET["nombre"]);}?>">
                                <input style="width: 200px;" class="form-control mr-1" type="text"
                                    placeholder="Categoria" name="categoria">
                                <input style="width: 200px;" class="form-control mr-1" type="text"
                                    placeholder="Cantidad" name="cantidad">
                                <input style="width: 200px;" class="form-control mr-1" type=" text" placeholder="Precio"
                                    name="precio">
                                <button id="boton" type="submit" class="btn btn-success d-inline-block" value="1"
                                    name="commandFiltrar">Filtrar</button>
                            </form>-->
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <?php if(isset($_GET["success"]) && $_GET["success"] == "added") { ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    Se ha a??adido un producto al carrito
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php } ?>
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Categoria</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
    
    <?php

        $sql = "SELECT * FROM users WHERE id = $user";
        $consulta1 = mysqli_query($conexion, $sql);
        $fila1 = $consulta1 -> fetch_assoc();

        $carrito = json_decode($fila['carrito'], true);
        
        foreach ($carrito as &$valor) {
            
            $sql2 = "SELECT * FROM `productos` WHERE id = $valor";
            $consulta = mysqli_query($conexion, $sql2);
            $fila = $consulta -> fetch_assoc();

            echo "<tr>";  
            echo "<td>".$fila["nombre"]."</td>";
            echo "<td>".$fila["categoria"]."</td>";
            echo "<td>".$fila["precio"].'???'."</td>";
            echo "<td>1</td>";
            echo "<td><a class='btn btn-danger' href='borrarCarrito.php?id=".$fila['id']."'><i class='fa-solid fa-trash'></i></a></td>";
            echo "</tr>";  
        }
        
       /* while($fila = $consulta -> fetch_assoc()){
            echo "<tr>";  
            echo "<td>".$fila["nombre"]."</td>";
            echo "<td>".$fila["categoria"]."</td>";
            echo "<td>".$fila["cantidad"]."</td>";
            echo "<td>".$fila["precio"]."</td>";
            echo "<td> <form action='./datos.php' method='POST'><button class='btn btn-primary' value='" .$fila["id"]. "'
            name='commandAddCarrito'><i class='fa-solid fa-cart-shopping'></i></button></form></td>";
        }*/

        ?>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; CRUD 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Seguro que quieres salir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body">Pulsa en "Logout" si quieres cerrar la sesi??n</div>
                <div class="modal-footer">
                <form action="./datos.php" method="POST">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary" value="1" name="commandLogOut">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

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

</body>

</html>