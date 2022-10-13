<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>

<body>

<nav class="navbar navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand disabled" href="#">Crud en PHP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>

    <div class="container login p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <h2>Login</h2> 
                <div class="card card-body">
                    <form action="./datos.php" method="POST">
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form2Example1">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Inserta tu email" autofocus />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="contraseña">Contraseña</label>
                            <input type="password" name="contraseña" class="form-control" placeholder="Inserta tu econtraseña"  />
                        </div>

                        <!-- 2 column grid layout for inline styling -->
                        <div class="row mb-4">
                            <div class="col d-flex justify-content-left">
                                <!-- Checkbox -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="form2Example31"/>
                                    <label class="form-check-label" for="form2Example31"> Recordar </label>
                                </div>
                            </div>
                        </div>

                        <?php if(isset($_GET["error"]) && $_GET["error"] == "missemail") { ?>
                        <div class="alert alert-danger" role="alert">
                            El correo electronico no existe. 
                        </div>
                        <?php } ?> 

                        <?php if(isset($_GET["error"]) && $_GET["error"] == "wrongpasswd") { ?>
                        <div class="alert alert-danger" role="alert">
                            La contraseña no es correcta.
                        </div>
                        <?php } ?>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-success btn-block mb-4" value="1"
                            name="commandLogin">Entrar</button>

                        <!-- Register buttons -->
                        <div class="text-center">
                            <p>No tienes Cuenta? <a href="signup.php">Crear Cuenta</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    
  </body>
</html>

    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>