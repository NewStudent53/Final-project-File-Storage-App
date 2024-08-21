<?php
echo   "entre elimianr)regsri";
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
    echo "No lo imprimio $cliente_id";

    $id_usuario = $cliente_id;
}
//llamar consulta

if (isset($_FILES["archivo_fls"])) {
    $archivo = $_FILES["archivo_fls"]["tmp_name"];
    $nombre_archivo = $_FILES["archivo_fls"]["name"];
    $id_usuario = $cliente_id;
    $ruta_base = "userfiles/user_$id_usuario/";


    echo "$id_usuario";

    if (!file_exists($ruta_base)) {
        echo "archivo no existe en servidor";        
    }
    else {
        $directorio_actual = getcwd();  
    echo "archivo exite";
    if (unlink($ruta_base)) {
        echo "El archivo ha sido eliminado correctamente.";
    } else {
        echo "Error al intentar eliminar el archivo.";
    }
}
}
/*    $ruta_destino = $ruta_base . $nombre_archivo;
    if (move_uploaded_file($archivo, $ruta_destino)) {
        echo "archivo cargado con éxito";

        // Extraer la extensión del archivo
        $file_type = pathinfo($nombre_archivo, PATHINFO_EXTENSION);

        // delete registro en la base de datos
        $sql = "INSERT INTO files (user_id, file_name, file_type , file_path, upload_date, trash_indicator) VALUES (?, ?, ?, ?, NOW(), 0)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isss", $id_usuario, $nombre_archivo, $file_type, $ruta_base, );

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
*/
?>
