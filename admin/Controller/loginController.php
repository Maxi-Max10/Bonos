<?php

session_start();
include '../Model/conexion_admin.php';

$usuario = $_POST['usuario'];
$password = $_POST['password'];

print_r($_POST);


$sentencia =("SELECT idadmin FROM admin WHERE usuario = '".$usuario."' AND password_admin = '".$password."'");
$queryBuscadm = $conexion->query($sentencia);
$datosAd = $queryBuscadm->fetch_all();

// print $_SESSION['id'] = $datos->id;
if ($datosAd) {
    $_SESSION['idadmin'] = $datosAd;
   header('Location: ../index_bonos.php');
}else{
    header('Location: ../login.php?mensaje=no'); 
}

?>