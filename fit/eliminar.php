<?php
include('conexion.php');

$ProductID = $_POST['ProductoID'];

$sql = "DELETE FROM productos WHERE ProductoID='$ProductID'";
if (mysqli_query($conexion, $sql)) {
    header("Location: adminTienda.php");
    exit();  
} else {
    echo "Error al eliminar: " . mysqli_error($conexion);
}
?>

