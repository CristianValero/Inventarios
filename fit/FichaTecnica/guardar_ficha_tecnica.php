<?php
include("config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del formulario
    $usuarioID = $_POST['usuarioID'];
    $peso = $_POST['peso'];
    $imc = $_POST['imc'];
    $altura = $_POST['altura'];
    $recomendaciones = $_POST['recomendaciones'];

    // Inserta los datos en la tabla 'fichatecnica'
    $sql = "INSERT INTO fichatecnica (Peso, IMC, Altura, Recomendaciones, UsuarioID)
            VALUES ('$peso', '$imc', '$altura', '$recomendaciones', '$usuarioID')";

    if ($conn->query($sql) === TRUE) {
        // Redirige a la página de ficha técnica
        header("Location: ../FichaTecnica.php");
        exit(); // Asegura que el script se detenga después de la redirección
    } else {
        echo "Error al guardar la ficha técnica: " . $conn->error;
    }
}

$conn->close();
?>
