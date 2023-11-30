<?php
session_start();

if (!isset($_SESSION['usuarioID'])) {
    header("Location: login.php");
    exit();
}

$conexion = new mysqli('localhost', 'root', '', 'fitcontrol', 3307);

if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

$usuarioID = $_SESSION['usuarioID'];

// Consulta SQL para obtener los datos del usuario
$sql = "SELECT UsuarioID, Nombre, Apellido, Telefono, FechaNac, Correo, RutaImagen FROM usuarios WHERE UsuarioID = $usuarioID";
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
    <title>Perfil</title>
    <link rel="icon" href="https://img.freepik.com/vector-premium/diseno-logotipo-tipo-letra-guion-fl-inicial-plantilla-vector-tipografia-moderna-vector-logotipo-fl-letra-guion-creativo_616200-1311.jpg?w=360" type="image/x-icon">
    <link rel="stylesheet" href="css/perfil.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<?php include("menu.php") ?>

<main>

<h1 class="Titulo">PERFIL</h1>

<div class="principal">

<table class="mx-auto text-start">
    <tr>
        <td class="perfilimagen">
            <?php if (!empty($usuario['RutaImagen'])): ?>
            <img src="<?php echo $usuario['RutaImagen']; ?>" alt="Imagen de perfil">
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <td>
            <p><strong>Documento:</strong> <?php echo $usuario['UsuarioID']; ?></p>       
        </td>
    </tr>
    <tr>
        <td>
            <p><strong>Nombre:</strong> <?php echo $usuario['Nombre']; ?></p>    
        </td>
        <td>
            <p><strong>Apellido:</strong> <?php echo $usuario['Apellido']; ?></p>     
        </td>
    </tr>
    <tr>
        <td>
            <p><strong>Teléfono:</strong> <?php echo $usuario['Telefono']; ?></p>    
        </td>
    </tr>
    <tr>
        <td>
            <p><strong>Fecha de Nacimiento:</strong> <?php echo $usuario['FechaNac']; ?></p>
        </td>
    </tr>
    <tr>
        <td>
        <p><strong>Correo Electrónico:</strong> <?php echo $usuario['Correo']; ?></p>
        </td>
    </tr>
</table>

<p><a href="perfil/editarPerfil.php" class="btn btn-warning">Editar Perfil</a></p>

</div>



</main>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
