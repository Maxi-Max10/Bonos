<?php

include_once '../Model/conexion_admin.php';

$id = $_POST['id_e'];
$nombre = $_POST['nombre_e'];
$apellido = $_POST['apellido_e'];
$cuil = $_POST['cuil_e'];
$password = $_POST['password_e'];
$sentenciaEliminar = null;
$queryEliminar = null;

if (!isset($_POST)) {
    echo 'error';

}else{

    $sentenciaEliminar = "DELETE FROM personal WHERE idpersonal = '".$id."' AND cuil = '".$cuil."'";
    $queryEliminar = $conexion->query($sentenciaEliminar);

    if ($queryEliminar == TRUE) {
        echo '1';
    }

}

?>