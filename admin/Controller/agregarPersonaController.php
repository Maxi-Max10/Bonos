<?php

include '../Model/conexion_admin.php';

//print_r($_POST);

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$cuil = $_POST['cuil'];
$password = $_POST['password'];
$sentencia = null;
$query = null;

$buscCuit = "SELECT cuil FROM personal WHERE cuil = '".$cuil."'";
$queryBuscCuil = $conexion->query($buscCuit);
$datos = $queryBuscCuil->fetch_all();

if ($nombre == "" || $apellido == "" || $cuil == "" || $password == "") {
    echo 'vacios';

} else if ($datos) {
    echo 'cuil';

} else {

    $sentencia = "INSERT INTO personal(nombre,apellido,cuil,password_personal) 
    VALUES('".$nombre."', '".$apellido."', '".$cuil."', '".$password."')";

    $query = $conexion->query($sentencia);

    if ($query == TRUE) {
        echo '1';
    }
}



    
    





?>