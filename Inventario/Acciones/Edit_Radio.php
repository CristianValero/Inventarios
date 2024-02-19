<?php
include('../Conexion/Conexion.php');

if (isset($_GET['id_Radio'])) {
    $id_Radio = $_GET['id_Radio'];
    $query = "SELECT r.*, l.Nombre as NombreLugar FROM Radio r
              INNER JOIN lugar l ON r.id_lugar = l.id_lugar
              WHERE id_Radio = $id_Radio";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $Modelo = $row['Modelo'];
        $Serial = $row['Serial'];
        $Placa = $row['Placa'];
        $Antena = $row['Antena'];
        $Cli = $row['Cli'];
        $Bateria = $row['Bateria'];
        $Cargador = $row['Cargador'];
        $id_lugar = $row['id_lugar'];
        $NombreLugar = $row['NombreLugar'];
        $Observaciones = $row['Observaciones'];
    }
}

if (isset($_POST['Guardar'])) {
    $id_Radio = $_POST['id_Radio']; 
    $Modelo = $_POST['Modelo'];
    $Serial = $_POST['Serial'];
    $Placa = $_POST['Placa'];
    $Antena = $_POST['Antena'];
    $Cli = $_POST['Cli'];
    $Bateria = $_POST['Bateria'];
    $Cargador = $_POST['Cargador'];
    $id_lugar = $_POST['id_lugar']; 
    $Observaciones = $_POST['Observaciones'];

$query = "UPDATE Radio SET Modelo = '$Modelo', Serial = '$Serial', Placa = '$Placa', Antena = '$Antena', Cli = '$Cli', Bateria = '$Bateria', Cargador = '$Cargador', Observaciones = '$Observaciones', id_lugar = '$id_lugar' WHERE id_Radio = $id_Radio";

    mysqli_query($conn, $query);

    $_SESSION['message'] = 'Editado Correctamente';
    $_SESSION['message_type'] = 'success';

    header("Location: ../Paginas/Radios.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Radio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container p-4">
        <h1 class="mt-col-4">Editar Radio</h1>
        <form action="Edit_Radio.php?id_Radio=<?php echo $_GET['id_Radio']; ?>" method="POST">
            <div class="form-group ">
                <label for="Modelo" class="form-label">Marca</label>
                <input type="text" class="form-control" id="Modelo" name="Modelo" value="<?php echo $Modelo; ?>">
            </div>
            <div class="mb-3">
                <label for="Serial" class="form-label">Serial</label>
                <input type="text" class="form-control" id="Serial" name="Serial" value="<?php echo $Serial; ?>">
            </div>
            <div class="mb-3">
                <label for="Placa" class="form-label">Placa</label>
                <input type="text" class="form-control" id="Placa" name="Placa" value="<?php echo $Placa; ?>">
            </div>
            <div class="mb-3">
                <label for="Antena" class="form-label">Antena</label>
                <select class="form-select" id="Antena" name="Antena">
                    <option <?php if($Antena == 'Si') echo 'selected'; ?> value="Si">Si</option>
                    <option <?php if($Antena == 'No') echo 'selected'; ?> value="No">No</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="Cli" class="form-label">Cli</label>
                <select class="form-select" id="Cli" name="Cli">
                    <option <?php if($Cli == 'Si') echo 'selected'; ?> value="Si">Si</option>
                    <option <?php if($Cli == 'No') echo 'selected'; ?> value="No">No</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="Bateria" class="form-label">Bateria</label>
                <select class="form-select" id="Bateria" name="Bateria">
                    <option <?php if($Bateria == 'Si') echo 'selected'; ?> value="Si">Si</option>
                    <option <?php if($Bateria == 'No') echo 'selected'; ?> value="No">No</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="Cargador" class="form-label">Cargador</label>
                <select class="form-select" id="Cargador"  name="Cargador">
                    <option <?php if($Cargador == 'Si') echo 'selected'; ?> value="Si">Si</option>
                    <option <?php if($Cargador == 'No') echo 'selected'; ?> value="No">No</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="id_lugar" class="form-label">Lugar</label>
                <select class="form-select" id="id_lugar" name="id_lugar">
                    <?php
                    $queryLugares = "SELECT * FROM lugar";
                    $resultLugares = mysqli_query($conn, $queryLugares);

                    while ($rowLugar = mysqli_fetch_assoc($resultLugares)) {
                        $selected = ($id_lugar == $rowLugar['id_lugar']) ? 'selected' : '';
                        echo "<option value='{$rowLugar['id_lugar']}' $selected>{$rowLugar['Nombre']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="Observaciones" class="form-label">Observaciones</label>
                <textarea class="form-control" id="Observaciones" name="Observaciones" rows="3"><?php echo $Observaciones; ?></textarea>
            </div>

          
            <button type="submit" name="Guardar" class="btn btn-primary">Guardar Cambios</button>
            <a href="../Paginas/Radios.php" class="btn btn-secondary">Cancelar</a>
            <input type="hidden" name="id_Radio" value="<?php echo $id_Radio; ?>">
        </form>
    </div>
</body>
</html>
