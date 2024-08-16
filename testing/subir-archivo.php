<?php
/*session_start();
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente_id = $_POST['user_id'];

    echo "$cliente_id";
    $id_usuario = $cliente_id;
}

if (isset($_FILES["archivo_fls"])) {
    $archivo = $_FILES["archivo_fls"]["tmp_name"];
    $nombre_archivo = $_FILES["archivo_fls"]["name"];
    $id_usuario = $cliente_id;
    $ruta_base = "userfiles/user_$id_usuario/";
    $ruta_basura = "trashbin/user_$id_usuario/";

    echo "$id_usuario";

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
    header("Location: myfiles.php");
}*/
session_start();
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente_id = $_POST['user_id'];

    echo "$cliente_id";
    $id_usuario = $cliente_id;
}

if (isset($_FILES["archivo_fls"])) {
    $archivo = $_FILES["archivo_fls"]["tmp_name"];
    $nombre_archivo = $_FILES["archivo_fls"]["name"];
    $id_usuario = $cliente_id;
    $ruta_base = "userfiles/user_$id_usuario/";
    $ruta_basura = "trashbin/user_$id_usuario/";

    echo "$id_usuario";

    if (!file_exists($ruta_base)) {
        mkdir($ruta_base, 0777, true);  
        $directorio_actual = getcwd();  
    }

    $ruta_destino = $ruta_base . $nombre_archivo;
    if (move_uploaded_file($archivo, $ruta_destino)) {
        echo "archivo cargado con éxito";

        // Insertar información del archivo en la base de datos
        $sql = "INSERT INTO files (user_id, file_name, file_path, upload_date) VALUES (?, ?, ?, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iss", $id_usuario, $nombre_archivo, $ruta_base);

        if ($stmt->execute()) {
            echo "Información del archivo guardada en la base de datos.";
        } else {
            echo "Error al guardar la información del archivo en la base de datos: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "archivo NO cargado";
    }

    header("Location: myfiles.php");
    exit();
} else {
    echo "No se ha seleccionado ningún archivo.";
}

?>
