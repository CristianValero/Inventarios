<?php
include("config.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Preparar la consulta para eliminar la ficha técnica
    $sql = "DELETE FROM fichatecnica WHERE UsuarioID = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../FichaTecnica.php");
        exit();
    } else {
        echo "Error al eliminar la ficha técnica: " . $conn->error;
    }
} else {
    echo "ID de usuario no proporcionado";
}

$conn->close();
?>