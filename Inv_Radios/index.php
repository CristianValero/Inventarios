<?php include("Conexion.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a href="index.php" class="navbar-brand">Inventario de Radios</a>
    </div>
</nav>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-body">
                <form action="">
                    <div class="form-group">
                        <input type="text" name="Modelo" class="form-control" placeholder="Modelo del Equipo" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="Serial" class="form-control" placeholder="Numero de Serial" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="Placa" class="form-control" placeholder="Placa Sepecol" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="bateria" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" name="Cli" class="form-control" placeholder="Cli">
                    </div>
                    <div class="form-group">
                        <input type="text" name="Cargador" class="form-control" placeholder="Cargadoras">
                    </div>
                </form>
            </div>

        </div>

        <div class="col-md-8"> </div>
    </div>
</div>

    



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>