<?php 
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($_FILES['files']['tmp_name'] as $key => $tmp_name) {
        $file_name = $_FILES['files']['name'][$key];
        $file_tmp = $_FILES['files']['tmp_name'][$key];
        $file_type = $_FILES['files']['type'][$key];
        $file_size = $_FILES['files']['size'][$key];
        $id_user = $_POST['Id']; // Asegúrate de que este campo se envíe desde el formulario

        // Mueve el archivo a una ubicación permanente
        $upload_dir = 'uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        $file_path = $upload_dir . basename($file_name);
        move_uploaded_file($file_tmp, $file_path);

        // Inserta la información del archivo en la base de datos
        $sql = "INSERT INTO archivos (nombre_archivo, tipo_archivo, tamano_archivo, id_user) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssis", $file_name, $file_type, $file_size, $id_user);
        $stmt->execute();
    }

    echo "Archivos subidos y registrados exitosamente.";
}
?>
