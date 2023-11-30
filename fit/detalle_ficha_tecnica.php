<?php
// Incluir configuración y verificación de sesión aquí
include("config.php");

// Verificar la sesión y obtener el ID del usuario autenticado
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usuarioID'])) {
    header("Location: login.php");
    exit();
}

$usuarioID = $_SESSION['usuarioID'];

// Consulta para obtener la ficha técnica del usuario autenticado
$sql = "SELECT Peso, IMC, Altura, Recomendaciones
        FROM fichatecnica
        WHERE UsuarioID = $usuarioID";

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Ficha Técnica</title>
    <link rel="stylesheet" href="css/productos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
<body>

    <?php include("menu.php"); ?>

<main>
    <?php
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        echo "<h1>Mi Ficha Técnica</h1>";
        echo "<table class='table table-dark table-striped tablee'>
                <tr>
                    <th>Peso (Kg)</th>
                    <th>IMC</th>
                    <th>Altura (Cm)</th>
                    <th>Recomendaciones</th>
                </tr>
                <tr>
                    <td>".$row["Peso"]."</td>
                    <td>".$row["IMC"]."</td>
                    <td>".$row["Altura"]."</td>
                    <td>".$row["Recomendaciones"]."</td>
                </tr>
              </table>";
    } else {
        echo "No se encontraron resultados para tu ficha técnica.";
    }
    ?>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
