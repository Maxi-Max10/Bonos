<?php

include '../Model/conexion_admin.php';

//print_r($_POST);

$id = $_POST['id_p'];
//$fecha = $_POST['fecha'];


$bono = $_FILES['bono_p']['name'];
$tipo = $_FILES['bono_p']['type'];
$temp = $_FILES['bono_p']['tmp_name'];

$sentencia = null;
$query = null;


    $sentencia = "INSERT INTO bonos(bonos,personal_idpersonal) 
                  VALUES('".$bono."', '".$id."')";

    $query = $conexion->query($sentencia);

    if ($query == TRUE) {
        move_uploaded_file($temp, './files/'.$bono);
        echo '1';
    }


?>