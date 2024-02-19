<?php include('../Conexion/Conexion.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radios</title>
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/2533/2533135.png">
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

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalugar">Agregar una nueva Ubicación</button>

<div class="modal fade" id="exampleModalugar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="../Acciones/Agregar.php" method="post"> 
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nombre del Lugar/Sitio</label>
                    <input type="text" name="Nombre" class="form-control" id="exampleFormControlInput1" placeholder="Sitio" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Dirección</label>
                    <input type="text" name="Dirección" class="form-control" id="exampleFormControlInput1" placeholder="#" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <input type="submit" class="btn btn-success" name="Agregar" value="Agregar">
            </div>
        </div>
    </form> 
  </div>
</div>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Registrar un Radio</button>

        <br> <br>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="../Acciones/Save_Radio.php" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Registro</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Marca</label>
                                <input type="text" name="Modelo" class="form-control" placeholder="Ejemplo (Motorola)" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="">Serial</label>
                                <input type="text" name="Serial" class="form-control" placeholder="Dijite el Serial" autofocus>
                            <div>
                            <div class="form-group">
                                <label for="">Placa</label>
                                <input type="text" name="Placa" class="form-control" placeholder="Dijite la Placa" >
                            </div>
                            <div class="form-group">
                                <label for="">Antena</label>
                                <select name="Antena" class="form-select" aria-label="Default select example">
                                    <option selected disabled value="">Seleccionar</option>
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Cli</label>
                                <Select name="Cli" class="form-select" aria-label="Default select example" >
                                    <option selected disabled value="">Seleccionar</option>
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                                </Select>
                            </div>
                            <div class="form-group">
                                <label for="">Bateria</label>
                                <select name="Bateria" class="form-select" aria-label="Default select example">
                                    <option selected disabled value="">Seleccionar</option>
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Cargador</label>
                                <select name="Cargador" class="form-select" aria-label="Default Select example">
                                    <option selected disabled value="">Seleccionar</option>
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Lugar</label>
                                <select name="id_lugar" class="form-select" aria-label="Default Select example">
                                    <option selected disabled value="">Seleccionar</option>
                                        <?php
                                            $queryLugares = "SELECT * FROM lugar";
                                            $resultLugares = mysqli_query($conn, $queryLugares);
     
                                            while ($rowLugar = mysqli_fetch_assoc($resultLugares)) {
                                             echo "<option value='{$rowLugar['id_lugar']}'>{$rowLugar['Nombre']}</option>";
                                                }
                                        ?>
                                 </select>
                            </div>
                            <div class="form-group">
                                <label for="Observaciones">Observaciones</label>
                                 <textarea class="form-control" id="Observaciones" name="Observaciones" rows="3" placeholder="Ingresa observaciones..."></textarea>
                            </div>

                    </div>
            </div>
        </div>

<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
<input type="submit" class="btn btn-success" name="Guardar" value="Guardar">
</div>
</div>
</form>
</div>
</div>
</div>

<br>

<div class="container p-12">
    <div class="row">
        <div class="col-md-4">
            <form action="" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Buscar por Marca, Serial o Placa" name="buscar">
                    <button class="btn btn-success" type="submit" id="button-addon2">Buscar</button>
                </div>
            </form>

</div>
</div>

<div class="col-md>-8">
            <table class="table table-bordered tg-black buscador">
                <thead>
                    <tr>
                        <th>Marca</th>
                        <th>Serial</th>
                        <th>Placa</th>
                        <th>Antena</th>
                        <th>Cli</th>
                        <th>Bateria</th>
                        <th>Cargador</th>
                        <th>Lugar</th>
                        <th>Observaciones</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php
            if(isset($_GET['buscar']) && !empty($_GET['buscar'])) {
                $buscar = $_GET['buscar'];
                $query = "SELECT r.*, l.Nombre as NombreLugar FROM Radio r
                          INNER JOIN lugar l ON r.id_lugar = l.id_lugar
                          WHERE r.Modelo LIKE '%$buscar%' OR r.Serial LIKE '%$buscar%' OR r.Placa LIKE '%$buscar%' OR l.Nombre LIKE '%$buscar%'";
            } else {
                $query = "SELECT r.*, l.Nombre as NombreLugar FROM Radio r
                          INNER JOIN lugar l ON r.id_lugar = l.id_lugar";
            }

                    $result_Radios = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_assoc($result_Radios)) { ?>
                        <tr>
                            <td><?php echo $row['Modelo'] ?></td>
                            <td><?php echo $row['Serial'] ?></td>
                            <td><?php echo $row['Placa'] ?></td>
                            <td><?php echo $row['Antena'] ?></td>
                            <td><?php echo $row['Cli'] ?></td>
                            <td><?php echo $row['Bateria'] ?></td>
                            <td><?php echo $row['Cargador'] ?></td>
                            <td><?php echo $row['NombreLugar'] ?></td>
                            <td><?php echo $row['Observaciones'] ?></td>
                            <td>
                                <a class="btn btn-warning" href="../Acciones/Edit_Radio.php?id_Radio=<?php echo $row['id_Radio']?>"><i class="bi bi-wrench-adjustable"></i></a>
                                <a class="btn btn-danger" href="../Acciones/Eliminar.php?id_Radio=<?php echo $row['id_Radio']?>"><i class="bi bi-trash3-fill"></i></a>    
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="buscador.js"></script>

</body>
</html>
