<?php
include_once("conexion.php");

if(isset($_POST['commandEnviar'])) {

$nombre = $_POST['nombre'];
$categoria = $_POST['categoria'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];


echo "El nombre es ".$nombre. ", la categoria es ".$categoria. ", la cantidad es ".$cantidad." y el precio es ".$precio."<br>";

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

    if(isset($_POST['commandRegistro'])) {

        $user = $_POST['usuario'];
        $nombre = $_POST['name'];
        $apellidos = $_POST['lastname'];
        $email = $_POST['email'];
        $passwd = $_POST['contraseña'];
        $passwd2 = $_POST['contraseña2']; 

        if($passwd != $passwd2){
            header("Location: /ejercicio1PHP/signup.php?error=passwd");
            die;
        }

        $passwd = sha1($_POST['contraseña']);
        
        if(!$conexion){
            echo "No se ha podido realizar la conexion a la Base de Datos".mysqli_connect_error()."<br>";
            die;
        }else{
            mysqli_set_charset($conexion, "utf8");
            //echo "Se ha realizado correctamente la conexion a la Base de datos";
        
            $sql = "INSERT INTO `users`(`id`, `user`,`nombre`, `apellidos`, `email`, `passwd`) VALUES (NULL, '$user', '$nombre','$apellidos','$email','$passwd')";
        
            $consulta = mysqli_query($conexion, $sql);
            
            if(!$consulta){
                die("No se ha podido insertar los datos");
            }else{
                header("Location: /ejercicio1PHP/productos.php");
            }
        }
                
        }







    

?>