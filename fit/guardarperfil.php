<?php
session_start();

if (!isset($_SESSION['usuarioID'])) {
    header("Location: login.php");
    exit();
}

$conexion = new mysqli("localhost", "root", "", "fitcontrol", 3307);

if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

$usuarioID = $_SESSION['usuarioID'];

// Obtén los datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$fechaNac = $_POST['fechaNac'];
$correo = $_POST['correo'];

// Verifica si se proporcionó una nueva contraseña
if (!empty($_POST['nuevaContrasena'])) {
    // Se proporcionó una nueva contraseña, procesarla
    $nuevaContrasena = password_hash($_POST['nuevaContrasena'], PASSWORD_DEFAULT);

    // Actualiza la contraseña en la base de datos
    $sql = "UPDATE usuarios SET Contraseña = '$nuevaContrasena' WHERE UsuarioID = $usuarioID";
    if (!$conexion->query($sql)) {
        echo "Error al actualizar la contraseña: " . $conexion->error;
        exit();
    }
}

// Carpeta de destino para las imágenes
$carpetaDestino = "img/";

if (!file_exists($carpetaDestino)) {
    mkdir($carpetaDestino, 0777, true);
}

// Procesar la imagen si se proporciona
if ($_FILES['imagen']['size'] > 0) {
    $imagenTemp = $_FILES['imagen']['tmp_name'];
    $nombreImagen = uniqid() . '.' . pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
    $rutaImagen = $carpetaDestino . $nombreImagen;

    // Mover la imagen a la carpeta de destino
    if (move_uploaded_file($imagenTemp, $rutaImagen)) {
        // Actualizar la ruta de la imagen en la base de datos
        $sqlImagen = "UPDATE usuarios SET RutaImagen = '$rutaImagen' WHERE UsuarioID = $usuarioID";
        if (!$conexion->query($sqlImagen)) {
            echo "Error al actualizar la imagen: " . $conexion->error;
            exit();
        }
    } else {
        echo "Error al mover la imagen a la carpeta de destino.";
    }
}

// Actualiza los demás datos del usuario en la base de datos sin cambiar la contraseña
$sqlDatos = "UPDATE usuarios SET Nombre = '$nombre', Apellido = '$apellido', Telefono = '$telefono', FechaNac = '$fechaNac', Correo = '$correo' WHERE UsuarioID = $usuarioID";
if ($conexion->query($sqlDatos) === TRUE) {
    // Redirige al usuario a su perfil
    header("Location: perfil.php");
    exit();
} else {
    echo "Error al actualizar el perfil: " . $conexion->error;
}

$conexion->close();
?>
