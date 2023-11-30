<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Ficha Técnica</title>
    <link rel="stylesheet" href="../css/agregarficha.css">
    <link rel="icon" href="https://img.freepik.com/vector-premium/diseno-logotipo-tipo-letra-guion-fl-inicial-plantilla-vector-tipografia-moderna-vector-logotipo-fl-letra-guion-creativo_616200-1311.jpg?w=360" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<main>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
        $usuarioID = $_GET['id'];

        // Aquí puedes agregar un formulario para la ficha técnica
        echo "<h1>Agregar Ficha Técnica</h1>";
        echo "<form method='post' action='guardar_ficha_tecnica.php'>
                <input type='hidden' name='usuarioID' value='".$usuarioID."'>
                <!-- Agrega aquí los campos para la ficha técnica -->
                <label for='peso'>Peso:</label>
                <input type='text' name='peso' required>
                <br>
                <label for='imc'>IMC:</label>
                <input type='text' name='imc' required>
                <br>
                <label for='altura'>Altura:</label>
                <input type='text' name='altura' required>
                <br>
                <label for='recomendaciones'>Recomendaciones:</label>
                <input type='text' name='recomendaciones' required>
                <br>
                <input type='submit' value='Guardar'>
              </form>";

        // Agrega un enlace para volver a la página de ficha técnica
        echo "<a href='../FichaTecnica.php'>Volver a Ficha Técnica</a>";
    }
    ?>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
