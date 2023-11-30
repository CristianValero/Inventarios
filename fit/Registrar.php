<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "fitcontrol", 3307);

if ($conexion->connect_error) {
    die("Error en la conexión a la base de datos: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $documento = $_POST["documento"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $telefono = $_POST["telefono"];
    $fechaNac = $_POST["fechaNac"];
    $correo = $_POST["correo"];
    $contrasena = password_hash($_POST["contrasena"], PASSWORD_DEFAULT);
    
    // Asignar el valor del documento a UsuarioID
    $usuarioID = $documento;
    
    // Insertar los datos en la base de datos, incluyendo el valor del UsuarioID
    $sql = "INSERT INTO usuarios (UsuarioID, Nombre, Apellido, Telefono, FechaNac, Correo, Contraseña) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssssss", $usuarioID, $nombre, $apellido, $telefono, $fechaNac, $correo, $contrasena);

    if ($stmt->execute()) {
        header("Location: login.php");
        exit();
    } else {
        echo "Error al registrar el usuario";
    }
}
?>

<!-- Formulario de registro HTML -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="icon" href="https://img.freepik.com/vector-premium/diseno-logotipo-tipo-letra-guion-fl-inicial-plantilla-vector-tipografia-moderna-vector-logotipo-fl-letra-guion-creativo_616200-1311.jpg?w=360" type="image/x-icon">

    <link rel="stylesheet" href="css/Registrar.css">
</head>
<body>
    
    <header class="header">
        <div class="menu container">
            <a href="../Index.html"><img src="https://img.freepik.com/vector-premium/diseno-logotipo-tipo-letra-guion-fl-inicial-plantilla-vector-tipografia-moderna-vector-logotipo-fl-letra-guion-creativo_616200-1311.jpg?w=360" class="logo"></a>
        </div>
    </header>

</body>
</html>

<form method="post">

<h2>Registro</h2>

    <input type="text" name="documento" placeholder="Documento" pattern="[0-9]{5,10}" maxlength="10" required title="Ingresa entre 5 y 10 números" require>
    <input type="text" name="nombre" placeholder="Nombre" pattern="[A-Za-z]+" required>
    <input type="text" name="apellido" placeholder="Apellido"  pattern="[A-Za-z]+" required>
    <input type="text" name="telefono" placeholder="Teléfono" pattern="[0-9]{10}" maxlength="10" required title="Ingresa 10 números" require>
    <input type="date" name="fechaNac" placeholder="Fecha de Nacimiento" require>
    <input type="email" name="correo" placeholder="Correo Electrónico" require>
    <input type="password" name="contrasena" placeholder="Contraseña" require>
    <input type="submit" class="btn" value="Registrarse" />

    <div class="pregunta">
        ¿Ya tienes una cuenta?
        <a href="login.php">Iniciar Sesion</a>
    </div>

</form>



 
               
                
                
             

                    
                
