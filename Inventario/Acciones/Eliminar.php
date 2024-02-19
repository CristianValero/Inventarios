<?php 
    include("../Conexion/Conexion.php");

    if (isset($_GET['id_Radio'])) {
        $id = $_GET['id_Radio'];
        $query = "DELETE FROM Radio WHERE id_Radio = $id";
        $result = mysqli_query($conn, $query);
        
        if (!$result) {
            die("Error al eliminar el registro");
        }

        $_SESSION['message'] = 'Eliminado Correctamente';
        $_SESSION['message_type'] = 'danger';
        header("Location: ../Paginas/Radios.php");
        exit();
    }
?>

<?php 

    if (isset($_GET['id_Equipo'])) {
        $id = $_GET['id_Equipo'];
        $query = "DELETE FROM Equipo WHERE id_Equipo = $id";
        $result = mysqli_query($conn, $query);
        
        if (!$result) {
            die("Error al eliminar el registro");
        }

        $_SESSION['message'] = 'Eliminado Correctamente';
        $_SESSION['message_type'] = 'danger';
        header("Location: ../Paginas/Equipos.php");
        exit();
    }
?>
