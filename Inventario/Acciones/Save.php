<?php
session_start(); 
include("../Conexion/Conexion.php");

if (isset($_POST['Guardar'])) {
    $Dispositivo = mysqli_real_escape_string($conn, $_POST['Dispositivo']);
    $Modelo = mysqli_real_escape_string($conn, $_POST['Modelo']);
    $Serial = mysqli_real_escape_string($conn, $_POST['Serial']);
    $Condicion = mysqli_real_escape_string($conn, $_POST['Condicion']);
    $Observaciones = mysqli_real_escape_string($conn, $_POST['Observaciones']);

    $query = "INSERT INTO Equipo (Dispositivo, Modelo, Serial, Condicion, Observaciones) VALUES ('$Dispositivo', '$Modelo', '$Serial', '$Condicion', '$Observaciones')";
    
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION['message'] = 'Guardado Correctamente';
        $_SESSION['message_type'] = 'success';
    } else {
        $_SESSION['message'] = 'Error al guardar: ' . mysqli_error($conn);
        $_SESSION['message_type'] = 'danger';
    }

    header("Location: ../Paginas/Equipos.php");
    exit();
}
?>
