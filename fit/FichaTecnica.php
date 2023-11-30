<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha Tecnica</title>
    <link rel="stylesheet" href="css/Usuarios.css">
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
    
<main class="container">

<?php
include("FIchaTecnica/config.php");

$sql = "SELECT usuarios.UsuarioID, usuarios.Nombre, usuarios.Apellido, usuarios.Telefono, usuarios.FechaNac,
               fichatecnica.Peso, fichatecnica.IMC, fichatecnica.Altura, fichatecnica.Recomendaciones
        FROM usuarios
        LEFT JOIN fichatecnica ON usuarios.UsuarioID = fichatecnica.UsuarioID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table table-dark table-striped tablee'>
            <h1>Ficha Tecnica</h1>
            <tr>
                <th>Documento</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Telefono</th>
                <th>Fecha de Nacimiento</th>
                <th>Peso</th>
                <th>IMC</th>
                <th>Altura</th>
                <th>Recomendaciones</th>
                <th colspan='3'>Acciones</th>
            </tr>";

            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td class='text-center'>".$row["UsuarioID"]."</td>
                        <td class='text-center'>".$row["Nombre"]."</td>
                        <td class='text-center'>".$row["Apellido"]."</td>
                        <td class='text-center'>".$row["Telefono"]."</td>
                        <td class='text-center'>".$row["FechaNac"]."</td>
                        <td class='text-center'>".$row["Peso"]."</td>
                        <td class='text-center'>".$row["IMC"]."</td>
                        <td class='text-center'>".$row["Altura"]."</td>
                        <td class='text-center'>".$row["Recomendaciones"]."</td>
                        <td class='text-center'>
                            <td>
                            <a href='FichaTecnica/agregar_ficha_tecnica.php?id=".$row["UsuarioID"]."' class='btn btn-success'>Agregar</a>
                            </td>
                            <td>
                            <a href='FichaTecnica/editar_ficha_tecnica.php?id=".$row["UsuarioID"]."' class='btn btn-warning'>Editar</a>
                            </td>
                            <td>
                            <a href='FichaTecnica/eliminar_ficha_tecnica.php?id=".$row["UsuarioID"]."' class='btn btn-danger'>Eliminar</a>
                            </td>
                        </td>
                      </tr>";
            }
            
    echo "</table>";
} else {
    echo "0 resultados";
}

$conn->close();
?>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
