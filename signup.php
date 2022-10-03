<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
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

<div class="container registro p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <h2>Registro</h2>
                <div class="card card-body">
                    <form action="signup.php" method="POST">
                        <!-- Name and LastName input -->
                        <div class="form-outline mb-2 ">
                            <label class="form-label" for="name">Nombre</label>
                            <input type="text" name="name" class="form-control" placeholder="Inserta tu Nombre" autofocus required/>
                        </div>

                        <div class="form-outline mb-2">
                            <label class="form-label" for="lastname">Apellido</label>
                            <input type="text" name="lastname" class="form-control" placeholder="Inserta tu Apellido" required />
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-2">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Inserta tu Email" required />
                        </div>

                        <!-- Passwords input -->
                        <div class="form-outline mb-2">
                            <label class="form-label" for="contraseña">Contraseña</label>
                            <input type="password" name="contraseña" class="form-control" placeholder="Inserta tu Contraseña" required />
                        </div>
                        <div class="form-outline mb-2">
                            <label class="form-label" for="contraseña2">Confirmar Contraseña</label>
                            <input type="password" name="contraseña2" class="form-control" placeholder="Confirma tu Contraseña" required  />
                        </div>

                        <!-- 2 column grid layout for inline styling -->
                        <div class="row mb-4">
                            <div class="col d-flex justify-content-left">
                                <!-- Checkbox -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="form2Example31" required/>
                                    <label class="form-check-label" for="form2Example31"> Acepto los términos y condiciones </label>
                                </div>
                            </div>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-success btn-block mb-4">Crear</button>

                        <!-- Register buttons -->
                        <div class="text-center">
                            <p>Ya tienes una cuenta? <a href="index.php">Login</a></p>
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