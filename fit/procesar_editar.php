<?php
include("conexion.php");

$ID=$_POST['txtProductoID'];
$NOMBREPRO=$_POST['txtNombrePro'];
$DESCRIPCIONPRO=$_POST['txtDescripcionPro'];
$PRECIO=$_POST['txtPrecio'];
$CANTIDAD=$_POST['txtCantidad'];
$CATEGORIA=$_POST['txtCategoria'];

// Manejo de la imagen
$IMAGEN_ACTUAL = $_POST['imagen_actual'];

// Verificar si se selecciona un nuevo archivo
if ($_FILES['imagen']['size'] > 0) {
    // Se seleccionó un nuevo archivo, procesar como antes
    $IMAGEN_NUEVA = $_FILES['imagen']['name'];
    $ruta_destino = 'img/';  // Ajusta la ruta según tu estructura de carpetas
    move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_destino . $IMAGEN_NUEVA);
} else {

    $IMAGEN_NUEVA = $IMAGEN_ACTUAL;
}

mysqli_query($conexion, "UPDATE `productos` SET `NombrePro` = '$NOMBREPRO',
`DescripcionPro` = '$DESCRIPCIONPRO',
`Precio` = '$PRECIO', 
`Cantidad` = '$CANTIDAD', 
`imagen` = '$IMAGEN_NUEVA' ,
`CategoriaID` = '$CATEGORIA'
WHERE `ProductoID` = '$ID'") or die ("Error al actualizar");

mysqli_close($conexion);
header ("Location:adminTienda.php");
?>
