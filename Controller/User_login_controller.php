<?php

session_start();
include '../Model/conexion_usuario.php';

$usuario = $_POST['usuario'];
$password = $_POST['password'];

print_r($_POST);


$sentencia =("SELECT id_login_personal FROM login_personal WHERE cuil_login = '".$usuario."' AND password_login = '".$password."'");
$queryBuscadm = $conexion->query($sentencia);
$datosAd = $queryBuscadm->fetch_all();


// print $_SESSION['id'] = $datos->id;
if ($datosAd) {
    $_SESSION['idusuario'] = $datosAd;
   header('Location: ../index_usuario.php');
}else{
    header('Location: ../login.php?mensaje=no'); 
}

?>