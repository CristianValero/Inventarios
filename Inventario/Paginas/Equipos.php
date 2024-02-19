<?php include('../Conexion/Conexion.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipos</title>
    <link rel="icon" href="https://w7.pngwing.com/pngs/989/503/png-transparent-closed-circuit-television-surveillance-wireless-security-camera-web-camera-angle-electronics-vehicle.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php">Inventarios</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="Radios.php">Radios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Equipos.php">Equipos</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <?php  if(isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                </div>

                <?php session_unset(); } ?>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Registrar un Equipo</button>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="../Acciones/Save.php" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Registro</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                        <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">Tipo de Dispositivo </label>
                                                                        <input type="Text" name="Dispositivo" class="form-control" id="exampleFormControlInput1" placeholder="Camara">
                                                                        </div>
                                                                    <div class="mb-3">
                                                                        <label for="" class="form-label">Modelo</label>
                                                                        <input type="text" name="Modelo" class="form-control" id="" placeholder="Modelo">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="" class="form-label">Serial</label>
                                                                        <input type="text" name="Serial" class="form-control" id="exampleFormControlTextarea1" placeholder="Serial del Equipo">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="" class="form-label">Condicion</label>
                                                                        <select name="Condicion" id="" class="form-select">
                                                                            <option selected disabled value="">Seleccionar</option>
                                                                            <option value="Mala">Mala</option>
                                                                            <option value="Buena">Buena</option>
                                                                            <option value="Exelente">Exelente</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="exampleFormControlTextarea1" class="form-label">Observaciones</label>
                                                                        <textarea name="Observaciones" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                                    </div>

                                                                    </div>
                                                                          <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                            <input type="submit" class="btn btn-success" name="Guardar" value="Guardar">
                                                                            </div>
                                                                        </div>

                    </div>
</form>

                </div>
            
        </div>
    </div>
</div>

<div class="container p-12">
    <div class="row">
        <div class="col-md-4">
            <form action="" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Buscar por Tipo, Modelo o Serial" name="buscar">
                    <button class="btn btn-success" type="submit" id="button-addon2">Buscar</button>
                </div>
            </form>

</div>
</div>

<div class="col-md>-8">
            <table class="table table-bordered tg-black buscador">
                <thead>
                    <tr>
                        <th>Tipo de Dispositivo</th>
                        <th>Modelo</th>
                        <th>Serial</th>
                        <th>Condicion</th>
                        <th>Observaciones</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                     if(isset($_GET['buscar']) && !empty($_GET['buscar'])) {
                        $buscar = $_GET['buscar'];
                        $query = "SELECT * FROM Equipo
                                  WHERE Dispositivo LIKE '%$buscar%' OR Modelo LIKE '%$buscar%' OR Serial LIKE '%$buscar%'";
                    } else {
                        $query = "SELECT * FROM Equipo";
                    }
        
                            $result_Equipos = mysqli_query($conn, $query);
        
                            while($row = mysqli_fetch_assoc($result_Equipos)) { ?>
                                <tr>
                                    <td><?php echo $row['Dispositivo'] ?></td>
                                    <td><?php echo $row['Modelo'] ?></td>
                                    <td><?php echo $row['Serial'] ?></td>
                                    <td><?php echo $row['Condicion'] ?></td>
                                    <td><?php echo $row['Observaciones'] ?></td>
                                    <td>
                                        <a class="btn btn-warning" href="../Acciones/Editar.php?id_Equipo=<?php echo $row['id_Equipo']?>"><i class="bi bi-wrench-adjustable"></i></a>
                                        <a class="btn btn-danger" href="../Acciones/Eliminar.php?id_Equipo=<?php echo $row['id_Equipo']?>"><i class="bi bi-trash3-fill"></i></a>    
                                    </td>
                                </tr>
                            <?php } ?>
                </tbody>
            </table>
</div>


<script src="../js/buscador.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>