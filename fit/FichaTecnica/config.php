<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fitcontrol";

$conn = new mysqli($servername, $username, $password, $dbname,3307);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}
?>