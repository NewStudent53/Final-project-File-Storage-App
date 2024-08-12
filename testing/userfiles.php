<?php
$directory = 'userfiles';
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
