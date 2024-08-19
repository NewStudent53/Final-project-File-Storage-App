<?php
// Conexión a la base de datos
$host="localhost";
$user="root";
$pass="1d0ntw4nn4kn0w";
$db="login";
$conn = new mysqli($host, $user, $pass, $db);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el ID del archivo a eliminar
if (isset($_POST['file_id'])) {
    $file_id = $_POST['file_id'];

    // Consulta SQL para eliminar el registro
    $sql = "DELETE FROM files WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $file_id);

    if ($stmt->execute()) {
        echo "Archivo eliminado correctamente";
        echo "$file_id";
    } else {
        echo "Error al eliminar el archivo: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ID de archivo no proporcionado.";
}
header("Location: Mytrashfiles.php");

$conn->close();
?>