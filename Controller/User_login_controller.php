<?php

session_start();
include '../Model/conexion_usuario.php';

$cuil = $_POST['cuil'];
$password = $_POST['password'];


$sentencia =("SELECT idpersonal FROM personal WHERE cuil = '".$cuil."' AND password_personal = '".$password."'");
$resultadoUs = mysqli_query($conexionUs, $sentencia);

while ($row = mysqli_fetch_array($resultadoUs)) {
    $idpersonal = $row['idpersonal'];
}

if ($resultadoUs) {
    $_SESSION['idpersonal'] = $idpersonal;
   header('Location: ../index_usuario.php');
}else{
    header('Location: ../loginUs.php?mensaje=no'); 
}

?>