<?php

include 'Model/conexion_admin.php';

print_r($_POST);

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$cuil = $_POST['cuil'];
$password = $_POST['password'];

$sentencia = "INSERT INTO personal(nombre,apellido,cuil,password_personal) 
              VALUES('".$nombre."', '".$apellido."', '".$cuil."', '".$password."')";

$resulRep = $conexion->query($sentencia);

?>