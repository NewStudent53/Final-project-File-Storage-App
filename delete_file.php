<?php
// Conexión a la base de datos
$host = "localhost";
$user = "root";
$pass = "1d0ntw4nn4kn0w";
$db = "login";
$conn = new mysqli($host, $user, $pass, $db);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el ID del archivo a eliminar
if (isset($_POST['file_id'])) {
    $file_id = $_POST['file_id'];

    // Consulta SQL para obtener el nombre del archivo y la ruta
    $sql = "SELECT file_name, file_path FROM files WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $file_id);
    $stmt->execute();
    $stmt->bind_result($file_name, $file_path);
    $stmt->fetch();
    $stmt->close();

    if ($file_name && $file_path) {
        // Ruta completa del archivo
        $file_full_path = $file_path . $file_name;

        echo "adios al archivo fisico: $file_full_path";
        // Eliminar el archivo físico del servidor
        if (file_exists($file_full_path)) {
            if (unlink($file_full_path)) {
                echo "El archivo ha sido eliminado correctamente.";
            } else {
                echo "Error al intentar eliminar el archivo.";
            }
        } else {
            echo "El archivo no existe en el servidor.";
        }

        // Consulta SQL para eliminar el registro de la base de datos
        $sql = "DELETE FROM files WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $file_id);

        if ($stmt->execute()) {
            echo "<script>alert('File has been permanently deleted successfully');window.location.href='Mytrashfiles.php';</script>";
        } else {
            echo "Error al eliminar el registro de la base de datos: " . $stmt->error;
            echo "<script>alert('Couldn't eliminate file');</script>";
            echo "<script>window.location.href='Mytrashfiles.php';</script>";

        }

        $stmt->close();
    } else {
        echo "No se encontró el archivo en la base de datos.";
    }
} else {
    echo "ID de archivo no proporcionado.";
}
$conn->close();
?>
