<?php

include '../Model/conexion_admin.php';

//print_r($_POST);
$id_m = $_POST['id_m'];
$nombreM = $_POST['nombre_m'];
$apellidoM = $_POST['apellido_m'];
$cuilM = $_POST['cuil_m'];
$passwordM = $_POST['password_m'];
$sentenciaM = null;
$queryM = null;

$buscCuitM = "SELECT cuil FROM personal WHERE cuil = '".$cuilM."'";
$queryBuscCuilM = $conexion->query($buscCuitM);
$datosM = $queryBuscCuilM->fetch_all();

if ($nombreM == "" || $apellidoM == "" || $cuilM == "" || $passwordM == "") {
    echo 'vaciosM';

}else if (!is_numeric($cuilM)) {
    echo 'cuilNM';

}else if ($datosM) {
    echo 'cuilM';

} else{

    $sentenciaM = "UPDATE personal SET nombre = '".$nombreM."', apellido = '".$apellidoM."' , cuil = '".$cuilM."', password_personal = '".$passwordM."' WHERE idpersonal = '".$id_m."'";
    
    $queryM = $conexion->query($sentenciaM);

    if ($queryM == TRUE) {
        echo '1';
    }
}



    
    





?>