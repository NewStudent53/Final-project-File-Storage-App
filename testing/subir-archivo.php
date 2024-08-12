<?php

/*if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ID_user = $_POST['Id'];
}
echo $ID_user;
*/
if (isset($_FILES["archivo_fls"])) {
    $archivo = $_FILES["archivo_fls"]["tmp_name"];
    $nombre_archivo = $_FILES["archivo_fls"]["name"];
    $id_usuario = 24;
    $ruta_base = "userfiles/user_$id_usuario/";

    if (!file_exists($ruta_base)) {
        mkdir($ruta_base, 0777, true);
        $directorio_actual = getcwd();    
    }

    $ruta_destino = $ruta_base . $nombre_archivo;
    if (move_uploaded_file($archivo, $ruta_destino)) {
        echo "archivo cargado con éxito";
    }
        else {
            echo "archivo NO cargado";
        }       

    //$destino = "userfiles/" . $_FILES["archivo_fls"]["name"];
    //if (move_uploaded_file($archivo, $destino)) {
        // Redirigir al usuario a myfiles.php después de subir el archivo
    //    header("Location: myfiles.php");
    //    exit();
    //} else {
    //    echo "Error al subir el archivo.";
    //}
//} else {
//    echo "No se ha seleccionado ningún archivo.";
}
?>
