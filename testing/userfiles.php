<?php
$directory = 'userfiles';
$files = array();

if(isset($_SESSION['email'])){
    $email=$_SESSION['email'];
    $query=mysqli_query($conn, "SELECT users.* FROM `users` WHERE users.email='$email'");
    while($row=mysqli_fetch_array($query)){
        $id = $row['Id'];
    }
   }

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
