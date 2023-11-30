<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si se han recibido los datos del formulario
    if (isset($_POST['usuarioID'], $_POST['peso'], $_POST['imc'], $_POST['altura'], $_POST['recomendaciones'])) {
        $usuarioID = $_POST['usuarioID'];
        $peso = $_POST['peso'];
        $imc = $_POST['imc'];
        $altura = $_POST['altura'];
        $recomendaciones = $_POST['recomendaciones'];

        // Actualiza los datos en la tabla de ficha técnica
        $sql = "UPDATE fichatecnica 
                SET Peso = '$peso', IMC = '$imc', Altura = '$altura', Recomendaciones = '$recomendaciones' 
                WHERE UsuarioID = $usuarioID";
                
                if ($conn->query($sql) === TRUE) {
                    // Redirige a la página de ficha técnica
                    header("Location: ../FichaTecnica.php");
                    exit(); // Asegura que el script se detenga después de la redirección
                } else {
                    echo "Error al guardar la ficha técnica: " . $conn->error;
                }
    } else {
        echo "Todos los campos son obligatorios.";
    }
} else {
    echo "Acceso no permitido.";
}

$conn->close();
?>
