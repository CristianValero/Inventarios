<?php

session_start();


$host = 'localhost'; 
$usuario = 'root'; 
$password = ''; 
$nombre_bd = 'inventario'; 

$conn = mysqli_connect($host, $usuario, $password, $nombre_bd);


if (!$conn) {
    die("Error al conectar: " . mysqli_connect_error());
}


?>
