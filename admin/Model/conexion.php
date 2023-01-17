<?php

$user = "root";
$password = "";
$base_name = "bonos_db";


try {
    $conexion = new mysqli("localhost",$user, $password, $base_name);

} catch (Exception $e) {
    printf("Fallo la conexión".$e->getMessage());
}



?>