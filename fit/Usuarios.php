<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="css/Usuarios.css">
    <link rel="icon" href="https://img.freepik.com/vector-premium/diseno-logotipo-tipo-letra-guion-fl-inicial-plantilla-vector-tipografia-moderna-vector-logotipo-fl-letra-guion-creativo_616200-1311.jpg?w=360" type="image/x-icon">
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
include("AdminUsuario/config.php");

$sql = "SELECT usuarios.UsuarioID, usuarios.Nombre, usuarios.Apellido, usuarios.Telefono, usuarios.FechaNac, usuarios.Correo, rol.DescripcionRol
        FROM usuarios
        INNER JOIN rol ON usuarios.RolID = rol.RolID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table table-dark table-striped tablee'>

    <h1>USUARIOS</h1>

            <tr>
                <td class='text-center'>
                    <a href='AdminUsuario/crear.php' class='btn btn-primary'>Agregar Nuevo Usuario</a>
                </td>
            </tr>
            <tr>
                <th>Documento</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Telefono</th>
                <th>Fecha de Nacimiento</th>
                <th>Correo</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td class='text-center'>".$row["UsuarioID"]."</td>
                <td class='text-center'>".$row["Nombre"]."</td>
                <td class='text-center'>".$row["Apellido"]."</td>
                <td class='text-center'>".$row["Telefono"]."</td>
                <td class='text-center'>".$row["FechaNac"]."</td>
                <td class='text-center'>".$row["Correo"]."</td>
                <td class='text-center'>". $row["DescripcionRol"]."</td>
                <td class='text-center'>
                    <a href='AdminUsuario/editar.php?id=".$row["UsuarioID"]."' class='btn btn-warning'>Editar</a>
                    <a href='AdminUsuario/eliminar.php?id=".$row["UsuarioID"]."' class='btn btn-danger'>Eliminar</a>
                </td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "0 resultados";
}

$conn->close();
?>

<br>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
