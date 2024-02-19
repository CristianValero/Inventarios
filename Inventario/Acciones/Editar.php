<?php
include('../Conexion/Conexion.php');

if (isset($_GET['id_Equipo'])) {
    $id_Equipo = $_GET['id_Equipo'];
    $query = "SELECT * FROM Equipo WHERE id_Equipo = $id_Equipo";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $Dispositivo = $row['Dispositivo'];
        $Modelo = $row['Modelo'];
        $Serial = $row['Serial'];
        $Condicion = $row['Condicion'];
        $Observaciones = $row['Observaciones'];
    } else {
        echo "No se encontró el equipo con ID: $id_Equipo";
        exit(); 
    }
}

if (isset($_POST['Guardar'])) {
    $id_Equipo = $_POST['id_Equipo'];
    $Dispositivo = $_POST['Dispositivo'];
    $Modelo = $_POST['Modelo'];
    $Serial = $_POST['Serial'];
    $Condicion = $_POST['Condicion'];
    $Observaciones = $_POST['Observaciones'];

    $query = "UPDATE Equipo SET Dispositivo = '$Dispositivo', Modelo = '$Modelo', Serial = '$Serial', Condicion = '$Condicion', Observaciones = '$Observaciones' WHERE id_Equipo = $id_Equipo";

    mysqli_query($conn, $query);

    $_SESSION['message'] = 'Editado Correctamente';
    $_SESSION['message_type'] = 'success';

    header("Location: ../Paginas/Equipos.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Equipo </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container p-4">
        <h1 class="mt-col-4">Editar Equipo </h1>
        <form action="Editar.php?id_Equipo=<?php echo $_GET['id_Equipo']; ?>" method="POST">
            <div class="form-group ">
                <label for="Dispositivo" class="form-label">Dispositivo</label>
                <input type="text" class="form-control" id="Dispositivo" name="Dispositivo" value="<?php echo $Dispositivo; ?>">
            </div>
            <div class="mb-3">
                <label for="Modelo" class="form-label">Modelo</label>
                <input type="text" class="form-control" id="Modelo" name="Modelo" value="<?php echo $Modelo; ?>">
            </div>
            <div class="mb-3">
                <label for="Serial" class="form-label">Serial</label>
                <input type="text" class="form-control" id="Serial" name="Serial" value="<?php echo $Serial; ?>">
            </div>
            <div class="mb-3">
                <label for="Condicion" class="form-label">Condicion</label>
                <select class="form-select" id="Condicion" name="Condicion">
                    <option <?php if($Condicion == 'Malo') echo 'selected'; ?> value="Malo">Malo</option>
                    <option <?php if($Condicion == 'Bueno') echo 'selected'; ?> value="Bueno">Bueno</option>
                    <option <?php if($Condicion == 'Exelente') echo 'selected'; ?> value="Exelente">Exelente</option>

                </select>
            </div>
            <div class="mb-3">
                <label for="Observaciones" class="form-label">Observaciones</label>
                <textarea class="form-control" id="Observaciones" name="Observaciones" rows="3"><?php echo $Observaciones; ?></textarea>
            </div>

          
            <button type="submit" name="Guardar" class="btn btn-primary">Guardar Cambios</button>
            <a href="../Paginas/Equipos.php" class="btn btn-secondary">Cancelar</a>
            <input type="hidden" name="id_Equipo" value="<?php echo $id_Equipo; ?>">
        </form>
    </div>
</body>
</html>
