
<?php  

include("conexion.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM productos WHERE id = $id";

    $result = mysqli_query($conexion, $query);

    if(!$result){
        die("error al enviar los datos");
    }else{
        header("Location: productos.php");
    }
}


?>