<?php

include_once '../Model/conexion_admin.php';

$idB = $_POST['id_eB'];
$nombreB = $_POST['nombre_eB'];
$sentenciaEliminarB = null;
$queryEliminarB = null;

if (!isset($_POST)) {
    echo 'error';

}else{

    $sentenciaEliminarB = "DELETE FROM bonos WHERE id_bonos = '".$idB."'";
    $queryEliminarB = $conexion->query($sentenciaEliminarB);

    if ($queryEliminarB == TRUE) {
        echo '1';
    }

}

?>