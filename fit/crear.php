<?php
include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los demás campos del formulario
    $NOMBREPRO = $_POST['nombre'];
    $DESCRIPCIONPRO = $_POST['descripcion'];
    $PRECIO = $_POST['precio'];
    $CANTIDAD = $_POST['cantidad'];
    $CATEGORIAID = $_POST['categoriaID'];
    $PROVEEDORID = $_POST['proveedorID'];

    // Manejo de la imagen
    $IMAGEN = $_FILES['imagen']['name'];
    $ruta_destino = 'img/';  // Ajusta la ruta según tu estructura de carpetas
    move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_destino . $IMAGEN);

    // Preparar la consulta SQL
    $sql = "INSERT INTO productos (NombrePro, DescripcionPro, Precio, Cantidad, imagen, CategoriaID, ProveedorID) VALUES ('$NOMBREPRO', '$DESCRIPCIONPRO', '$PRECIO', '$CANTIDAD', '$IMAGEN', '$CATEGORIAID', '$PROVEEDORID')";


    // Ejecutar la consulta y verificar si fue exitosa
    if (mysqli_query($conexion, $sql)) {
        // Redirigir con un mensaje de éxito
        header("Location: adminTienda.php?success=1");
        exit(); // Asegúrate de salir después de redirigir
    } else {
        // Redirigir con un mensaje de error
        header("Location: adminTienda.php?error=1");
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="my-4">Crear Nuevo Producto</h1>

        <form action="crear.php" method="post" enctype="multipart/form-data">
            <!-- Campos del formulario -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Producto:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción del Producto:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio:</label>
                <input type="number" class="form-control" id="precio" name="precio" required>
            </div>

            <div class="mb-3">
                <label for="categoriaID" class="form-label">Categoría:</label>
                <select class="form-control" id="categoriaID" name="categoriaID" required>
                    <?php
                    $query = mysqli_query($conexion, "SELECT * FROM categorias");
                    while ($data = mysqli_fetch_assoc($query)) { ?>
                        <option value="<?php echo $data['CategoriaID']; ?>">
                            <?php echo $data['Categoria']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad:</label>
                <input type="text" class="form-control" id="cantidad" name="cantidad" required>
            </div>

            <div class="mb-3">
                <label for="proveedorID" class="form-label">Proveedor:</label>
                <select class="form-control" id="proveedorID" name="proveedorID" required>
                    <?php
                    $query = mysqli_query($conexion, "SELECT * FROM proveedores");
                    while ($data = mysqli_fetch_assoc($query)) { ?>
                        <option value="<?php echo $data['ProveedorID']; ?>">
                            <?php echo $data['ProveedorID']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen del Producto:</label>
                <input type="file" class="form-control" id="imagen" name="imagen">
            </div>

            <!-- Botón para crear -->
            <button type="submit" class="btn btn-success">Crear Producto</button>
        </form>
    </div>
</body>


</html>