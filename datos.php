

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

?>




