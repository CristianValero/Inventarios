<?php
// Inicia la sesión
session_start();

// Destruye todas las variables de sesión
session_destroy();

// Redirige a la página de inicio de sesión o a la página principal
header("Location: login.php");
exit();
?>
