<?php


include_once("conexion.php");

session_start();

$user = $_SESSION["id_user"];



if(isset($_POST['commandEnviar'])) {

$nombre = $_POST['nombre'];
$categoria = $_POST['categoria'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];

    if(!$conexion){
        echo "No se ha podido realizar la conexion a la Base de Datos".mysqli_connect_error()."<br>";
        die;
    }else{
        mysqli_set_charset($conexion, "utf8");
        //echo "Se ha realizado correctamente la conexion a la Base de datos";
    
        $sql = "INSERT INTO `productos`(`id`, `nombre`, `categoria`, `cantidad`, `precio`) VALUES (NULL,'$nombre','$categoria',$cantidad,$precio)";
    
        $consulta = mysqli_query($conexion, $sql);
        
        if(!$consulta){
            die("No se ha podido insertar los datos");
        }else{
            header("Location: /ejercicio1PHP/productos.php");
        }
    }
        
}

if(isset($_POST['commandEditar'])) {

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $categoria = $_POST['categoria'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    
        if(!$conexion){
            echo "No se ha podido realizar la conexion a la Base de Datos".mysqli_connect_error()."<br>";
            die;
        }else{
            mysqli_set_charset($conexion, "utf8");
            //echo "Se ha realizado correctamente la conexion a la Base de datos";
        
            $query = "UPDATE productos set nombre = '$nombre', categoria = '$categoria', cantidad = $cantidad, precio = $precio WHERE id = $id";
        
            $consulta = mysqli_query($conexion, $query);
            
            if(!$consulta){
                die("No se ha podido insertar los datos");
            }else{
                header("Location: /ejercicio1PHP/productos.php");
            }
        }
            
    }

    if(isset($_POST['commandEditarUsr'])) {

        $id = $_POST['id'];
        $user = $_POST['user'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $email = $_POST['email'];
        $admin = $_POST['admin'];
        
            if(!$conexion){
                echo "No se ha podido realizar la conexion a la Base de Datos".mysqli_connect_error()."<br>";
                die;
            }else{
                mysqli_set_charset($conexion, "utf8");
                //echo "Se ha realizado correctamente la conexion a la Base de datos";
            
                $query = "UPDATE users set user = '$user', nombre = '$nombre', apellidos = '$apellidos', email = '$email', admin = $admin WHERE id = $id";
            
                $consulta = mysqli_query($conexion, $query);
                
                if(!$consulta){
                    die("No se ha podido insertar los datos");
                }else{
                    header("Location: /ejercicio1PHP/users.php");
                }
            }
                
        }

    if(isset($_GET['commandBorrar'])) {

        
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $sql3 = "DELETE FROM productos WHERE id = $id";

                $consulta = mysqli_query($conexion, $sql3);
            
                if(!$consulta){
                    print_r("Error");
                }else{
                    header("Location: /ejercicio1PHP/productos.php");
                }
            }
    }

    if(isset($_GET['commandBorrarUsr'])) {

        
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql3 = "DELETE FROM users WHERE id = $id";

            $consulta = mysqli_query($conexion, $sql3);
        
            if(!$consulta){
                print_r("Error");
            }else{
                header("Location: /ejercicio1PHP/users.php");
            }
        }
}

if(isset($_POST['commandLogOut'])) {

        session_destroy();
        header("Location: /ejercicio1PHP/index.php");
        
}

    if(isset($_POST['commandRegistro'])) {

        $user = $_POST['user'];
        $nombre = $_POST['name'];
        $apellidos = $_POST['lastname'];
        $email = $_POST['email'];
        $passwd = $_POST['contraseña'];
        $passwd2 = $_POST['contraseña2'];

        //Solo se permiten numeros letras y guiones bajos
        if (preg_match("/[^a-zA-Z0-9_]/", $user)){
            header("Location: /ejercicio1PHP/signup.php?error=usrpattern");
            die;
        }
        //Validamos el email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: /ejercicio1PHP/signup.php?error=emailpattern");
            die;
        }

        //Validamos la contraseña
        $uppercase = preg_match('@[A-Z]@', $passwd);
        $lowercase = preg_match('@[a-z]@', $passwd);
        $number    = preg_match('@[0-9]@', $passwd);
        $specialChars = preg_match('@[^\w]@', $passwd);

        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($passwd) < 8) {
            header("Location: /ejercicio1PHP/signup.php?error=passwdStrength");
            die;
        }

        //Comprobar que las contraseñas coinciden
        if($passwd != $passwd2){
            header("Location: /ejercicio1PHP/signup.php?error=passwd");
            die;
        }
        //encriptamos contraseña
        $passwd = sha1($_POST['contraseña']);
        
        if(!$conexion){
            echo "No se ha podido realizar la conexion a la Base de Datos".mysqli_connect_error()."<br>";
            die;
        }else{

            $quser = mysqli_query($conexion, "SELECT * FROM users WHERE user = '$user'");
            $qmail = mysqli_query($conexion, "SELECT * FROM users WHERE email = '$email'");
            $filasuser = mysqli_num_rows($quser);
            $filaemail = mysqli_num_rows($qmail);
            
            //Comprobamos que el usuario no existe
            if($filasuser > 0){
                header("Location: /ejercicio1PHP/signup.php?error=user");
                die;
            //Comprobamos que el email no existe
            }else if($filaemail > 0){
                header("Location: /ejercicio1PHP/signup.php?error=email");
                die;
            }

            $sql = "INSERT INTO `users`(`user`,`nombre`, `apellidos`, `email`, `passwd`, `carrito`) VALUES ('$user', '$nombre','$apellidos','$email','$passwd', '[]')";
        
            $consulta = mysqli_query($conexion, $sql);
            
            if(!$consulta){
                die("No se ha podido insertar al user");
            }else{
                header("Location: /ejercicio1PHP/tienda.php");
                $_SESSION["id_user"] = mysqli_insert_id($conexion);
            }
        }
                
        }

        if(isset($_POST['commandLogin'])) {

            $email = $_POST['email'];
            $passwd = $_POST['contraseña'];
    
            if(!$conexion){
                echo "No se ha podido realizar la conexion a la Base de Datos".mysqli_connect_error()."<br>";
                die;
            }else{
    
                $sql = "SELECT * FROM users WHERE email = '$email'";
                $consulta = mysqli_query($conexion, $sql);

                $num_match = mysqli_num_rows($consulta);

                if(!$num_match){
                    header("Location: /ejercicio1PHP/index.php?error=missemail");
                    die;

                }else{
                    $sql = "SELECT passwd, id FROM users WHERE email = '$email'";

                    $consulta = mysqli_query($conexion, $sql);

                    $fila = $consulta -> fetch_assoc();

                    $passwd = sha1($_POST['contraseña']);

                    if($passwd == $fila["passwd"]){
                        $_SESSION["id_user"] = $fila["id"];
                        header("Location: /ejercicio1PHP/tienda.php");

                    }else{
                        header("Location: /ejercicio1PHP/login.php?error=wrongpasswd");
                        die;
                    }
                }
            }
            
            }

            if(isset($_POST['commandAddCarrito'])) {


                $sql = "SELECT * FROM users WHERE id = $user";

                $consulta = mysqli_query($conexion, $sql);
                $fila = $consulta -> fetch_assoc();
                $_SESSION["nusuario"] = $fila["user"];
                
                $idProducto = $_POST['commandAddCarrito'];

                    if(!$conexion){
                        echo "No se ha podido realizar la conexion a la Base de Datos".mysqli_connect_error()."<br>";
                        die;
                    }else{
                        mysqli_set_charset($conexion, "utf8");

                        $sql = "SELECT * FROM users WHERE id = $user";
                    
                        $consulta = mysqli_query($conexion, $sql);
                        
                        $fila = $consulta -> fetch_assoc();

                        $carrito = array_merge(json_decode($fila['carrito'], true), array($idProducto));
                        $myJSON = json_encode($carrito);

                        $query = "UPDATE users set carrito = '$myJSON' WHERE id = $user";
                        $consulta = mysqli_query($conexion, $query);
                        header("Location: /ejercicio1PHP/tienda.php?success=added");
                    }
                        
                }

                if(isset($_GET['commandBorrarCarrito'])) {
                    
        
                    if(!$conexion){
                        echo "No se ha podido realizar la conexion a la Base de Datos".mysqli_connect_error()."<br>";
                        die;
                    }else{
                        mysqli_set_charset($conexion, "utf8");

                        $sql = "SELECT * FROM users WHERE id = $user";
                    
                        $consulta = mysqli_query($conexion, $sql);
                        
                        $fila = $consulta -> fetch_assoc();
                        
                        $carrito = array_merge(json_decode($fila['carrito'], true));
                        $contador = [];

                        $borrado = false;
                        foreach ($carrito as $idx => $value) {
                            if($value == $_GET['id'] && !$borrado) {
                                unset($carrito[$idx]);
                                $borrado = true;
                            }
                        }
                        
                        $carrito = array_values($carrito);
                        $myJSON = json_encode($carrito);

                        $query = "UPDATE users set carrito = '".$myJSON."' WHERE id = $user";
                        $consulta = mysqli_query($conexion, $query);
                        header("Location: /ejercicio1PHP/carrito.php");
                    }
                }
?>