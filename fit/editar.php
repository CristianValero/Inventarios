<?php
include('conexion.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <?php
        $id = $_GET["id"];
        $sql = "SELECT * FROM productos where ProductoID='$id' ";
        $result = mysqli_query($conexion, $sql);

        while ($mostrar = mysqli_fetch_array($result)) {
            ?>

            <form action="procesar_editar.php" method="post" enctype="multipart/form-data">
                <label for="txtProductID" class="form-label">ID Producto:</label>
                <input type="text" value="<?php echo $mostrar['ProductoID'] ?>" name="txtProductoID"
                    class="form-control mb-3">
                <label for="txtNombrePro" class="form-label">Nombre Producto:</label>
                <input type="text" value="<?php echo $mostrar['NombrePro'] ?>" name="txtNombrePro"
                    class="form-control mb-3">
                <label for="txtDescripcionPro" class="form-label">Descripción del Producto:</label>
                <input type="text" value="<?php echo $mostrar['DescripcionPro'] ?>" name="txtDescripcionPro"
                    class="form-control mb-3">
                <label for="txtPrecio" class="form-label">Precio:</label>
                <input type="text" value="<?php echo $mostrar['Precio'] ?>" name="txtPrecio" class="form-control mb-3">
                <label for="txtCantidad" class="form-label">Cantidad:</label>
                <input type="text" value="<?php echo $mostrar['Cantidad'] ?>" name="txtCantidad" class="form-control mb-3">
                <label for="txtCategoria" class="form-label">Categoría:</label>
                <select name="txtCategoria" class="form-control mb-3">
                    <?php
                    $queryCategorias = mysqli_query($conexion, "SELECT * FROM categorias");
                    while ($categoria = mysqli_fetch_assoc($queryCategorias)) {
                        $selected = ($categoria['CategoriaID'] == $mostrar['CategoriaID']) ? 'selected' : '';
                        echo '<option value="' . $categoria['CategoriaID'] . '" ' . $selected . '>' . $categoria['Categoria'] . '</option>';
                    }
                    ?>
                </select>

                <input type="hidden" value="<?php echo $mostrar['imagen'] ?>" name="imagen_actual">
                <label for="imagen" class="form-label">Cambio de imagen:</label>
                <input type="file" name="imagen" class="form-control mb-3">

                <input type="submit" value="ACTUALIZAR" class="btn btn-success">
            </form>

            <?php
        }
        ?>
    </div>
</body>

</html>