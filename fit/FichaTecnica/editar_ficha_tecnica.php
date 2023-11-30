<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Ficha Técnica</title>
    <link rel="stylesheet" href="../css/editarficha.css">
    <link rel="icon" href="https://img.freepik.com/vector-premium/diseno-logotipo-tipo-letra-guion-fl-inicial-plantilla-vector-tipografia-moderna-vector-logotipo-fl-letra-guion-creativo_616200-1311.jpg?w=360" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>

<main>

    <div class="form-container">

        <?php
        include("config.php");

        // Verifica si se ha proporcionado un ID válido a través de la URL
        if(isset($_GET['id']) && is_numeric($_GET['id'])) {
            $usuarioID = $_GET['id'];

            // Consulta para obtener los datos del usuario y su ficha técnica
            $sql = "SELECT usuarios.UsuarioID, usuarios.Nombre, usuarios.Apellido, usuarios.Telefono, usuarios.FechaNac, usuarios.Correo,
                           fichatecnica.Peso, fichatecnica.IMC, fichatecnica.Altura, fichatecnica.Recomendaciones
                    FROM usuarios
                    LEFT JOIN fichatecnica ON usuarios.UsuarioID = fichatecnica.UsuarioID
                    WHERE usuarios.UsuarioID = $usuarioID";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                // Aquí deberías mostrar un formulario con los datos de la ficha técnica y permitir la edición
                // Puedes utilizar el formulario para enviar los datos actualizados a un script de actualización

                echo "<h1>Editar Ficha Técnica</h1>";
                echo "<form action='actualizar_ficha_tecnica.php' method='post'>";
                echo "<input type='hidden' name='usuarioID' value='".$row['UsuarioID']."'>";
                echo "Nombre: ".$row['Nombre']."<br>";
                echo "Apellido: ".$row['Apellido']."<br>";
                echo "Peso: <input type='text' name='peso' value='".$row['Peso']."'><br>";
                echo "IMC: <input type='text' name='imc' value='".$row['IMC']."'><br>";
                echo "Altura: <input type='text' name='altura' value='".$row['Altura']."'><br>";
                echo "Recomendaciones: <input type='text' name='recomendaciones' value='".$row['Recomendaciones']."'><br>";

                echo "<input type='submit' value='Actualizar'>";
                echo "</form>";

                // Botón para volver a la ficha técnica
                echo "<br>";
                echo "<a href='../FichaTecnica.php' class='btn btn-secondary'>Volver a Ficha Técnica</a>";
            } else {
                echo "No se encontraron resultados para el ID proporcionado.";
            }
        } else {
            echo "ID de usuario no válido.";
        }

        $conn->close();
        ?>

    </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
