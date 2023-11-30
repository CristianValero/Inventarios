<?php
require("conexion.php");
$db = new mysqli("localhost", "root", "", "fitcontrol", 3307);
if ($db->connect_error) {
    die("Error en la conexión a la base de datos: " . $db->connect_error);
}

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tienda</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="css/tienda2.css" rel="stylesheet" />
    <link href="css/tienda.css" rel="stylesheet" />

</head>

<body>
    <a href="carrito.php" class="btn-flotante" id="btnCarrito">Carrito <span class="badge bg-success"
            id="carrito">0</span></a>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand">Fit-Control</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link text-info" category="all">Todo</a>
                        </li>
                        <?php
                        $query = mysqli_query($db, "SELECT * FROM categorias");
                        if ($query) {
                            if (mysqli_num_rows($query) > 0) {
                                while ($data = mysqli_fetch_assoc($query)) {
                                    echo '<li class="nav-item">';
                                    echo '<a href="#" class="nav-link" category="' . $data['Categoria'] . '">';
                                    echo $data['Categoria'];
                                    echo '</a>';
                                    echo '</li>';
                                }
                            } else {
                                echo "No hay categorías registradas.";
                            }
                        } else {
                            die("Error en la consulta de categorías: " . mysqli_error($db));
                        }
                        ?>
                    </ul>
                </div>

            </div>
        </nav>
    </div>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Tienda</h1>
                <p class="lead fw-normal text-white-50 mb-0">Productos de Gym.</p>
            </div>
        </div>
    </header>
    <section class="py-5">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                $query = mysqli_query($db, "SELECT p.*, c.Categoria AS categoria FROM productos p INNER JOIN categorias c ON c.CategoriaID = p.CategoriaID");
                $result = mysqli_num_rows($query);
                if ($result > 0) {
                    while ($data = mysqli_fetch_assoc($query)) { ?>
                        <div class="col mb-5 productos" category="<?php echo $data['categoria']; ?>">
                            <div class="card h-100">
                                <div class="badge bg-danger text-white position-absolute" style="top: 0.5rem; right: 0.5rem">
                                    <?php echo $data['Precio'] ? 'Oferta' : ''; ?>
                                </div>

                                <img class="card-img-top" src="img/<?php echo $data['imagen']; ?>" alt="..." />
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <h5 class="fw-bolder">
                                            <?php echo $data['NombrePro'] ?>
                                        </h5>
                                        <p>
                                            <?php echo $data['DescripcionPro']; ?>
                                        </p>
                                        <div class="d-flex justify-content-center small text-warning mb-2">
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                        </div>
                                        <span class="text-muted">
                                            <?php echo $data['Precio'] ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center">
                                        <button class="btn btn-outline-dark mt-auto agregar" id="btnAgregar"
                                            data-id="<?php echo $data['ProductoID']; ?>">Agregar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                } else {
                    echo "No hay productos disponibles.";
                }
                ?>

            </div>
        </div>
    </section>

    <footer class="py-5 bg-dark">

        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/scripts.js"></script>
    <script>
        console.log("Documento listo");
    </script>

</body>

</html>