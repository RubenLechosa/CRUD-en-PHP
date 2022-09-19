<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>PHP</title>
</head>

<body>

    <nav class="navbar navbar-dark bg-dark">
        <div class="container collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="navbar-brand" href="productos.php">Almacén</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <h2>Insertar Productos</h2>
                <div class="card card-body">
                    <form action="./datos.php" method="POST">
                        <!-- Nombre input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control"
                                placeholder="Inserta el nombre del producto" autofocus />
                        </div>

                        <!-- Categoria input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="categoria">Categoria</label>
                            <input type="text" name="categoria" class="form-control"
                                placeholder="Inserta la categoria del producto" />
                        </div>
                        <!-- Cantidad input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="cantidad">Cantidad</label>
                            <input type="number" name="cantidad" class="form-control"
                                placeholder="Inserta la cantidad del producto" />
                        </div>
                        <!-- Precio input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="precio">Precio</label>
                            <input type="number" name="precio" class="form-control"
                                placeholder="Inserta el precio del producto" />
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-success btn-block mb-4" value="1" name="commandEnviar">Enviar</button>

                        <!-- Register buttons 
                        <div class="text-center">
                            <p>No tienes Cuenta? <a href="signup.php">Crear Cuenta</a></p>
                        </div>-->
                    </form>
                </div>
            </div>
        </div>
    </div>