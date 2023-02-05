<?php 
include("Model/conexion_usuario.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $idBono = $_GET['bn'];
  
    $query = "SELECT * FROM bonos WHERE personal_idpersonal =".$id." AND id_bonos=".$idBono;
    $result = mysqli_query($conexionUs, $query);
    
    while ($row = mysqli_fetch_array($result)) {
        $nombreBono = $row['bonos'];
    }
        $row = mysqli_fetch_array($result);
        $enlace = "admin/Controller/files/".$nombreBono;
        $basefichero = basename($enlace);

        header("Content-Type: application/force-download");
     
        header( "Content-Type: application/octet-stream");

        header("Content-Type: application/download");

    
        header( "Content-Length: ".filesize($enlace));
     
        header( "Content-Disposition:attachment;filename=" .$basefichero);
        readfile($enlace);
    }
  
?>