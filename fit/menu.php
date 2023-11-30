<?php
$conexion = new mysqli("localhost", "root", "", "fitcontrol", 3307);

if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usuarioID'])) {
    header("Location: login.php");
    exit();
}

$usuarioID = $_SESSION['usuarioID'];

$sqlRol = "SELECT RolID FROM usuarios WHERE UsuarioID = $usuarioID";
$resultadoRol = $conexion->query($sqlRol);

$mostrarFichaTecnica = false;
$mostrarUsuarios = false;
$mostrarMiFichaTecnica = false;
$mostrarTienda = false;
$mostrarproductos = false; // Agregué esta línea para inicializar la variable

if ($resultadoRol->num_rows > 0) {
    $rolUsuario = $resultadoRol->fetch_assoc()['RolID'];

    if ($rolUsuario == 1) {
        $mostrarUsuarios = true;
        $mostrarTienda = true;
        $mostrarproductos = true;
    }

    if ($rolUsuario == 1 || $rolUsuario == 2) {
        $mostrarFichaTecnica = true;
    }

    if ($rolUsuario == 0) {
        $mostrarMiFichaTecnica = true;
        $mostrarTienda = true;
    }

    if ($rolUsuario == 3) {
        $mostrarproductos = true;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="icon" href="https://img.freepik.com/vector-premium/diseno-logotipo-tipo-letra-guion-fl-inicial-plantilla-vector-tipografia-moderna-vector-logotipo-fl-letra-guion-creativo_616200-1311.jpg?w=360" type="image/x-icon">
    <link rel="stylesheet" href="css/menu.css">
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
</head>
<body id="body">
    
    <header>
        <div class="icon__menu">
            <i class="fa-solid fa-caret-down fa-rotate-270" id="btn_open"></i>
        </div>
    </header>

    <div class="menu__side" id="menu_side">

        <div class="name__page">
            <i class="fa-solid fa-face-smile"></i>
            <h4>Fit-Control</h4>
        </div>
        
        <div class="options__menu">	

            <a href="inicio/inicio.html">
                <div class="option">
                    <i class="fas fa-home" title="Inicio"></i>
                    <h4>Inicio</h4>
                </div>
            </a>

            <a href="perfil.php">
                <div class="option">
                    <i class="fa-solid fa-user-secret" title="Perfil"></i>
                    <h4>Perfil</h4>
                </div>
            </a>

            <?php if ($mostrarFichaTecnica): ?>
                <a href="FichaTecnica.php">
                    <div class="option">
                        <i class="fa-sharp fa-regular fa-clipboard" title="Ficha Técnica"></i>
                        <h4>Ficha Tecnica</h4>
                    </div>
                </a>
            <?php endif; ?>

            <?php if ($mostrarUsuarios): ?>
                <a href="Usuarios.php">
                    <div class="option">
                        <i class="fa-solid fa-user-plus" title="Usuarios"></i>
                        <h4>Usuarios</h4>
                    </div>
                </a>

                <?php endif; ?>

            <?php if ($mostrarTienda): ?>
                <a href="Tienda.php">
                    <div class="option">
                        <i class="fa-solid fa-basket-shopping" title="Tienda"></i>
                        <h4>Tienda</h4>
                    </div>
                </a>
            <?php endif; ?>

            <?php if ($mostrarMiFichaTecnica): ?>
                <a href="detalle_ficha_tecnica.php">
                    <div class="option">
                    <i class="fa-solid fa-dumbbell" title="Mi Ficha Técnica"></i>
                        <h4>Mi Ficha Tecnica</h4>
                    </div>
                </a>
            <?php endif; ?>
            <?php if ($mostrarproductos): ?>
    <a href="adminTienda.php">
        <div class="option">
            <i class="fa-solid fa-circle-plus" title="Productos"></i>
            <h4>Productos</h4>
        </div>
    </a>
<?php endif; ?>


            <a href="logout.php">
                <div class="option">
                    <i class="fa-solid fa-arrow-right-from-bracket fa-rotate-180" title="Cerrar Sesión"></i>
                    <h4>Cerrar Sesión</h4>
                </div>
            </a>

        </div>
    </div>

    <script src="js/menu.js"></script>
</body>
</html>
