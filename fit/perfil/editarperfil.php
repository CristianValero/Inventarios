<?php
session_start();

// Verifica si el usuario está autenticado
if (!isset($_SESSION['usuarioID'])) {
    // Si no está autenticado, redirige a la página de inicio de sesión
    header("Location: login.php");
    exit();
}

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "fitcontrol",3307);

// Verifica la conexión
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

// Obtén el ID del usuario autenticado
$usuarioID = $_SESSION['usuarioID'];

// Consulta SQL para obtener los datos del usuario
$sql = "SELECT * FROM usuarios WHERE UsuarioID = $usuarioID";
$resultado = $conexion->query($sql);

// Verifica si se encontraron resultados
if ($resultado->num_rows > 0) {
    $usuario = $resultado->fetch_assoc();
} else {
    echo "Usuario no encontrado";
}

// Cierra la conexión a la base de datos
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link rel="icon" href="https://img.freepik.com/vector-premium/diseno-logotipo-tipo-letra-guion-fl-inicial-plantilla-vector-tipografia-moderna-vector-logotipo-fl-letra-guion-creativo_616200-1311.jpg?w=360" type="image/x-icon">

    <link rel="stylesheet" href="../css/editar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="editar">

    <h2>Editar Perfil</h2>


        <form action="../guardarPerfil.php" method="post" enctype="multipart/form-data">

        <table>
            <tr>
                <td>
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo $usuario['Nombre']; ?>" required>
                </td>
                <td>
                    <label for="apellido">Apellido:</label>
                    <input type="text" id="apellido" name="apellido" value="<?php echo $usuario['Apellido']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="telefono">Teléfono:</label>
                    <input type="text" id="telefono" name="telefono" value="<?php echo $usuario['Telefono']; ?>" required>
                </td>
                <td>
                    <label for="fechaNac">Fecha de Nacimiento:</label>
                    <input type="date" id="fechaNac" name="fechaNac" value="<?php echo $usuario['FechaNac']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="correo">Correo Electrónico:</label>
                    <input type="email" id="correo" name="correo" value="<?php echo $usuario['Correo']; ?>" required>   
                </td>
                <td>
                    <label for="nuevaContrasena">Nueva Contraseña:</label>
                    <input type="password" id="nuevaContrasena" name="nuevaContrasena">
                </td>
            </tr>
            <tr>
                <td class="imagen">
                    <label for="imagen">Imagen:</label>
                    <input type="file" id="imagen" name="imagen">
                </td>
            </tr>
        </table>

            <input type="submit" class="btn btn-success" value="Guardar Cambios">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

