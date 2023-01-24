<?php
include '../Model/conexion_usuario.php';

$correo = $_POST['txtcorreo'];
$cuil = $_POST['cuil'];


$consulta = ("SELECT * FROM personal WHERE cuil = '$cuil'");
$queryusuario 	= mysqli_query($conexionUs ,$consulta);
$nr 			= mysqli_num_rows($queryusuario); 
if ($nr > 0)
{
	$mostrar		= mysqli_fetch_array($queryusuario); 
	$enviarpass 	= $mostrar['password_personal'];

	$paracorreo 		= $correo;
	$titulo				= "Recuperar contraseña";
	$mensaje			= $enviarpass;
	$tucorreo			= "From: abelisho.sabe@gmail.com";

	if(mail($paracorreo,$titulo,$mensaje,$tucorreo))
	{
		echo "<script> alert('Contraseña enviada');window.location= '../loginUs.php' </script>";
	}else
	{
		echo "<script> alert('Error');window.location= '../loginUs.php' </script>";
	}
}
else
{
	echo "<script> alert('Este usuario no existe');window.location= '../loginUs.php' </script>";
}
/*VaidrollTeam*/
?>