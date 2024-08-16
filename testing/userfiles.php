<?php
session_start();
include 'connect.php';

// Obtener user_id de la solicitud
if (isset($_GET['user_id'])) {
    $id_usuario = $_GET['user_id'];
} else {
    // Manejar el caso en que no se proporciona user_id
    die("User ID no proporcionado.");
}

$directory = "userfiles/user_$id_usuario/";

$files = array();

if (is_dir($directory)) {
    if ($dh = opendir($directory)) {
        while (($file = readdir($dh)) !== false) {
            if ($file != '.' && $file != '..') {
                $filePath = $directory . '/' . $file;
                $fileType = mime_content_type($filePath);
                $fileModified = date("F d Y H:i:s.", filemtime($filePath));

                $files[] = array(
                    'name' => $file,
                    'type' => $fileType,
                    'modified' => $fileModified
                );
            }
        }
        closedir($dh);
    }
}

echo json_encode($files);
?>
