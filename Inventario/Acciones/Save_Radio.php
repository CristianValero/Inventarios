<?php
include("../Conexion/Conexion.php");

if (isset($_POST['Guardar'])) {
    $Modelo = $_POST['Modelo'];
    $Serial = $_POST['Serial'];
    $Placa = $_POST['Placa'];
    $Antena = $_POST['Antena'];
    $Cli = $_POST['Cli'];
    $Bateria = $_POST['Bateria'];
    $Cargador = $_POST['Cargador'];
    $id_lugar = $_POST['id_lugar']; 
    $Observaciones = $_POST['Observaciones'];

    $query = "INSERT INTO Radio(Modelo, Serial, Placa, Antena, Cli, Bateria, Cargador, Observaciones, id_lugar) VALUES ('$Modelo', '$Serial', '$Placa', '$Antena', '$Cli', '$Bateria', '$Cargador', '$Observaciones', '$id_lugar')";
    
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Consulta cancelada: " . mysqli_error($conn));
    }
}

$_SESSION['message'] = 'Guardado Correctamente';
$_SESSION['message_type'] = 'success';

header("Location: ../Paginas/Radios.php");
?>
