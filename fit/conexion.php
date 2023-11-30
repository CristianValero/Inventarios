<?php

$conexion = new mysqli("localhost", "root", "", "fitcontrol", 3307);
if ($conexion->connect_error) {
    die("Error en la conexión a la base de datos: " . $conexion->connect_error);
}

?>