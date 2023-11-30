<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "fitcontrol";   


$conn = new mysqli($servername, $username, $password, $database,3307);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
