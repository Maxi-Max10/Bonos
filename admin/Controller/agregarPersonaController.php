<?php

include_once "../Model/conexion.php";

print_r($_POST);

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$cuil = $_POST['cuil'];
$password = $_POST['password'];

$sentencia = "INSERT INTO personal(nombre,apellido,cuil,password_personal) 
              VALUES($nombre, $apellido, $cuil, $password)";

$query = $conexion->query($sentencia) or die (mysqli_error($conexion));

$r=1;
echo $r;

?>