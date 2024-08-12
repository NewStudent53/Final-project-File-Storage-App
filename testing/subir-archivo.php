<?php
if (isset($_FILES["archivo_fls"])) {
    $archivo = $_FILES["archivo_fls"]["tmp_name"];
    $destino = "userfiles/" . $_FILES["archivo_fls"]["name"];

    if (move_uploaded_file($archivo, $destino)) {
        // Redirigir al usuario a myfiles.php después de subir el archivo
        header("Location: myfiles.php");
        exit();
    } else {
        echo "Error al subir el archivo.";
    }
} else {
    echo "No se ha seleccionado ningún archivo.";
}
?>
