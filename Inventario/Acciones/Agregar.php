<?php
session_start(); 
include("../Conexion/Conexion.php");

if (isset($_POST['Agregar'])) {
    $Nombre = mysqli_real_escape_string($conn, $_POST['Nombre']);
    $Dirección = mysqli_real_escape_string($conn, $_POST['Dirección']);

    $query = "INSERT INTO Lugar (Nombre, Dirección) VALUES ('$Nombre', '$Dirección')";
    
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION['message'] = 'Agregado Correctamente';
        $_SESSION['message_type'] = 'success';
    } else {
        $_SESSION['message'] = 'Error al guardar: ' . mysqli_error($conn);
        $_SESSION['message_type'] = 'danger';
    }

    header("Location: ../Paginas/Radios.php");
    exit();
}
?>