<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $usuarioID = $_GET["id"];

    $sql = "DELETE FROM usuarios WHERE UsuarioID=$usuarioID";

    if ($conn->query($sql) === TRUE) {
        header ("location: ../usuarios.php");
        echo "Usuario eliminado con éxito.";
    } else {
        echo "Error al eliminar: " . $conn->error;
    }
}

$conn->close();
?>


