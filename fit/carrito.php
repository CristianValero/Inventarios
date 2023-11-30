<?php
require_once "conexion.php";

// Verificar la autenticación aquí (puedes adaptar esto según tu sistema de autenticación)


// Continuar con el resto del código para buscar y devolver datos al carrito
if (isset($_POST['action']) && $_POST['action'] === 'buscar') {
    $array = $_POST['data'];

    if (count($array) > 0) {
        $productos = [];
        $total_pagar = 0;

        foreach ($array as $item) {
            $id = $item['id'];
            $query = mysqli_query($conexion, "SELECT * FROM productos WHERE ProductoID = $id");
            $data = mysqli_fetch_assoc($query);

            $productos[] = [
                'id' => $data['ProductoID'],
                'nombre' => $data['NombrePro'],
                'imagen' => $data['imagen'],
                'cantidad' => 1,  // Puedes ajustar esto según sea necesario
                'precio' => $data['Precio']
            ];

            $total_pagar += $data['Precio'];
        }

        $response = [
            'datos' => $productos,
            'total' => $total_pagar
        ];

        // Devolver solo el JSON, no la estructura HTML completa
        echo json_encode($response);
        exit; // Importante: detener la ejecución después de enviar el JSON
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Carrito de Compras</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" /> -->
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="assets/css/styles.css" rel="stylesheet" />
    <link href="assets/css/estilos.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="./">FIT-CONTROL</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    </div>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Carrito</h1>
                <p class="lead fw-normal text-white-50 mb-0">Tus Productos Agregados.</p>
            </div>
        </div>
    </header>
    <section class="py-5">
        <div class="container px-4 px-lg-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Producto</th>
                                    <th>Imagen</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                </tr>
                            </thead>
                            <tbody id="tblCarrito">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-5 ms-auto">
                    <h4>Total a Pagar: <span id="total_pagar">0.00</span></h4>
                    <div class="d-grid gap-2">
                        <div id="paypal-button-container"></div>
                        <button class="btn btn-warning" type="button" id="btnVaciar">Vaciar Carrito</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/scripts2.js"></script>
</body>

</html>