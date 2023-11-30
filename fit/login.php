<?php
session_start();

$mensajeError = ""; // Inicializa la variable para evitar advertencias de variable no definida

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos (reemplaza 'usuario', 'contraseña', 'base_de_datos' según tu configuración)
    $conexion = new mysqli('localhost', 'root', '', 'fitcontrol', 3307);

    if ($conexion->connect_error) {
        die("Error de conexión a la base de datos en login.php: " . $conexion->connect_error);
    }

    // Obtén los datos del formulario
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Evita la inyección de SQL usando consultas preparadas
    $stmt = $conexion->prepare("SELECT UsuarioID, Correo, Contraseña FROM usuarios WHERE Correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $stmt->bind_result($usuarioID, $correoBD, $contrasenaBD);
    $stmt->fetch();
    $stmt->close();

    // Verifica si el usuario existe y la contraseña es correcta
    if ($correo == $correoBD && password_verify($contrasena, $contrasenaBD)) {
        $_SESSION['usuarioID'] = $usuarioID;
        header("Location: perfil.php"); // Redirige a la página de perfil
        exit();
    } else {
        // Credenciales incorrectas
        $mensajeError = "Correo electrónico o contraseña incorrectos";
    }

    // Cierra la conexión a la base de datos
    $conexion->close();
}

// Si no tiene una cuenta, redirige a la página de registro
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Inicia Sesión </title>
    <link rel="icon" href="https://img.freepik.com/vector-premium/diseno-logotipo-tipo-letra-guion-fl-inicial-plantilla-vector-tipografia-moderna-vector-logotipo-fl-letra-guion-creativo_616200-1311.jpg?w=360" type="image/x-icon">
    <link rel="stylesheet" href="css/login.css">
</head>
<body class="body">

    <header class="header">
        <div class="menu container">
            <a href="Index.html"><img src="https://img.freepik.com/vector-premium/diseno-logotipo-tipo-letra-guion-fl-inicial-plantilla-vector-tipografia-moderna-vector-logotipo-fl-letra-guion-creativo_616200-1311.jpg?w=360" class="logo"></a>
        </div>
    </header>

    <form method="post">
        
        <h2>Inicio de Sesion</h2>
        <input type="email" name="correo" placeholder="Correo Electronico"/>
        <input type="password" name="contrasena" placeholder="Contraseña" />
        <input type="submit" class="btn" value="Iniciar Sesion" />

        <div class="error green-text">
            <?php echo $mensajeError; ?>
        </div>

        <div class="registrarse">
            ¿No tienes una cuenta?
            <br>
            <a href="Registrar.php">Registraste!</a>
            <br>
        </div>

    </form>
    
    <script src="~/lib/jquery/dist/jquery.min.js"></script>
    <script src="~/lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="~/js/site.js" asp-append-version="true"></script>
</body>
</html>
