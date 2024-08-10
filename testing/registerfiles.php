<?php 

include 'connect.php';

if(isset($_POST['Upload'])){
   $nombre_archivo=$_POST['name'];
   $archivo=$_POST['file'];
   $tipo_archivo=$_POST['file_type'];
   $tamano_archivo=$_POST['file_size'];
   $id_user=$_POST['Id'];
   
   $sql="SELECT * FROM archivos WHERE id_user='$Id'";
   $result=$conn->query($sql);
   if($result->num_rows>0){
    session_start();
    $row=$result->fetch_assoc();
    $_SESSION['Id']=$row['Id'];
    header("Location: myfiles.php");
    exit();
   }
   else{
    echo "Not Found, Error";
   }

}
?>