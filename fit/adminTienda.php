
<?php include('conexion.php'); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminTienda</title>
    <link rel="stylesheet" href="css/productos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        /* Personalización adicional del estilo */
        body {
            background-color: #f8f9fa; /* Color de fondo */
            color: white; /* Color del texto en blanco */
        }

        main {
            text-align: center;
            margin-top: 20px;
        }

        table {
            margin-top: 20px;
        }

        table th, table td {
            color: white; /* Color del texto en blanco en la tabla */
        }
    </style>
</head>
<?php include("menu.php"); ?>
<body>

    <main>
        <div class="container">
            <?php
            // Verificar si hay un mensaje de éxito en la URL
            if (isset($_GET['success']) && $_GET['success'] == '1') {
            ?>
                <div class="alert alert-success" role="alert">
                    Categoría creada exitosamente.
                </div>
            <?php
            }

            // Verificar si hay un mensaje de error en la URL
            if (isset($_GET['error']) && $_GET['error'] == '1') {
            ?>
                <div class="alert alert-danger" role="alert">
                    Ha ocurrido un error al crear la categoría.
                </div>
            <?php
            }
            ?>
        </div>

        <div class="espacio-tabla">
            <a href="crear.php" class="btn btn-success boton-crear">Crear</a>
            <table class="table table-dark table-striped tablee">
                <thead>
                    <tr>
                        <th scope="col">ProductoID</th>
                        <th scope="col">NombrePro</th>
                        <th scope="col">DescripcionPro</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">imagen</th>
                        <th scope="col">CategoriaID</th>
                        <th scope="col">ProveedorID</th>
                        <th colspan="2" scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Verificar si la conexión está abierta
                    if (!$conexion->connect_error) {
                        $sql = "SELECT * FROM productos";
                        $result = $conexion->query($sql);

                        if ($result && $result->num_rows > 0) {
                            while ($mostrar = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?php echo $mostrar['ProductoID'] ?></td>
                                    <td><?php echo $mostrar['NombrePro'] ?></td>
                                    <td><?php echo $mostrar['DescripcionPro'] ?></td>
                                    <td><?php echo $mostrar['Precio'] ?></td>
                                    <td><?php echo $mostrar['Cantidad'] ?></td>
                                    <td><?php echo $mostrar['imagen'] ?></td>
                                    <td><?php echo $mostrar['CategoriaID'] ?></td>
                                    <td><?php echo $mostrar['ProveedorID'] ?></td>
                                    <td>
                                        <!-- Editar -->
                                        <a href="editar.php?id=<?php echo $mostrar['ProductoID'] ?>" class="btn btn-success">Editar</a>
                                    </td>
                                    <!-- Eliminar -->
                                    <td>
                                        <form action="eliminar.php" method="post">
                                            <input type="hidden" value="<?php echo $mostrar['ProductoID'] ?>" name="ProductoID" readonly>
                                            <input class="btn btn-danger" type="submit" value="Eliminar" name="btnEliminar">
                                        </form>
                                    </td>
                                </tr>
                                <?php
                            }
                            $result->free(); // Liberar los resultados
                        } else {
                            echo "No se encontraron resultados.";
                        }
                    } else {
                        echo "Error en la conexión a la base de datos.";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>
