<?php

include '../Model/conexion_admin.php';

//print_r($_POST);
$id = $_POST['id'];

if (is_array($_FILES) && count($_FILES) > 0) {
    
    $bono = $_FILES['arch']['name'];
    $tipo = $_FILES['arch']['type'];
    $temp = $_FILES['arch']['tmp_name'];

    $sentencia = null;
    $query = null;

    $sentencia = "INSERT INTO bonos(bonos,personal_idpersonal) VALUES('".$bono."', '".$id."')";
    $query = $conexion->query($sentencia);

    if ($query == TRUE) {
        move_uploaded_file($temp, 'files/'.$bono);
        echo '1';
    }

} else {
    echo '0';
}






?>