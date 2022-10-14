<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Registro</title>
    <script src="https://kit.fontawesome.com/9ddb4510e0.js" crossorigin="anonymous"></script>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Registro</h1>
                            </div>
                            <form action="./datos.php" method="POST" class="user">
                                <div class="form-group row">
                                    <div class="form-group">
                                        <input type="text" name="user" class="form-control form-control-user"
                                            placeholder="Inserta tu Usuario" autofocus required minlength="6" />
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="name" class="form-control form-control-user"
                                            placeholder="Inserta tu Nombre" autofocus required minlength="1" />
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="lastname" class="form-control form-control-user"
                                            placeholder="Inserta tu Apellido" required minlength="3" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user"
                                        placeholder="Inserta tu Email" required />
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="contraseña" class="form-control form-control-user"
                                            placeholder="Inserta tu Contraseña" required />
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="contraseña2" class="form-control form-control-user"
                                            placeholder="Confirma tu Contraseña" required />
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block" value="1"
                                    name="commandRegistro">Crear Cuenta</button> <br>
                            </form>
                            <?php if(isset($_GET["error"]) && $_GET["error"] == "passwd") { ?>
                            <div class="alert alert-danger" role="alert">
                                Las contraseñas no coinciden.
                            </div>
                            <?php } ?>

                            <?php if(isset($_GET["error"]) && $_GET["error"] == "passwdStrength") { ?>
                            <div class="alert alert-danger" role="alert">
                                La contraseña debe tener como mínimo 8 caracteres, debe tener una mayuscula, un número y
                                un caracter especial.
                            </div>
                            <?php } ?>

                            <?php if(isset($_GET["error"]) && $_GET["error"] == "emailpattern") { ?>
                            <div class="alert alert-danger" role="alert">
                                El email no es correcto.
                            </div>
                            <?php } ?>

                            <?php if(isset($_GET["error"]) && $_GET["error"] == "usrpattern") { ?>
                            <div class="alert alert-danger" role="alert">
                                El Nombre de Usuario solo permite letras, numeros y guiones bajos.
                            </div>
                            <?php } ?>

                            <?php if(isset($_GET["error"]) && $_GET["error"] == "user") { ?>
                            <div class="alert alert-danger" role="alert">
                                El nombre de usuario ya existe.
                            </div>
                            <?php } ?>

                            <?php if(isset($_GET["error"]) && $_GET["error"] == "email") { ?>
                            <div class="alert alert-danger" role="alert">
                                El correo electronico ya existe.
                            </div>
                            <?php } ?>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="#">Has olvidado la Contraseña?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Ya tienes una cuenta?</a>
                            </div>
                        </div>
                    </div>
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

</body>

</html>