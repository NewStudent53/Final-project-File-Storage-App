<?php
session_start();
include 'connect.php';

if (isset($_GET['file'])) {
    $nombre_archivo = $_GET['file'];
    $cliente_id = $_SESSION['user_id'];
    $id_usuario = $cliente_id;
    $ruta_base = "userfiles/user_$id_usuario/";
    $ruta_destino = $ruta_base . $nombre_archivo;

    if (isset($_FILES["archivo_fls"])) {
        $archivo = $_FILES["archivo_fls"]["tmp_name"];

        if (move_uploaded_file($archivo, $ruta_destino)) {
            echo "archivo sobrescrito con éxito";

            // Actualizar información del archivo en la base de datos
            $sql = "UPDATE files SET upload_date = NOW() WHERE user_id = ? AND file_name = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("is", $id_usuario, $nombre_archivo);

            if ($stmt->execute()) {
                echo "Información del archivo actualizada en la base de datos.";
            } else {
                echo "Error al actualizar la información del archivo en la base de datos: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "archivo NO sobrescrito";
        }

        header("Location: myfiles.php");
        exit();
    } else {
        echo "No se ha seleccionado ningún archivo.";
    }
} else {
    echo "No se ha especificado ningún archivo para sobrescribir.";
}
?>
