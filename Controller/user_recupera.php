<?php
include '../Model/conexion_usuario.php';

use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\SMTP;
use \PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../admin/PHPMailer/Exception.php';
require '../admin/PHPMailer/PHPMailer.php';
require '../admin/PHPMailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


$correo = $_POST['txtcorreo'];
$cuil = $_POST['cuil'];


$consulta = ("SELECT * FROM personal WHERE cuil = '$cuil'");
$queryusuario 	= mysqli_query($conexionUs ,$consulta);
$nr 			= mysqli_num_rows($queryusuario); 
if ($nr == 1 ) {
	$mostrar		= mysqli_fetch_array($queryusuario); 
	$enviarpass 	= $mostrar['password_personal'];
	try {
		//Server settings
		$mail->SMTPDebug = 2;                      //Enable verbose debug output
		$mail->isSMTP();                                            //Send using SMTP
		$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		$mail->Username   = 'gasopensas@gmail.com';                     //SMTP username
		$mail->Password   = 'trpepakperulluqu';                               //SMTP password
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
		$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

		//Recipients
		$mail->setFrom('gasopensas@gmail.com', 'GASOPEN SAS');
		$mail->addAddress($correo);     //Add a recipient

		//Attachments
		//$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
		// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

		//Content
		$mail->isHTML(true);                                  //Set email format to HTML
		$mail->Subject = 'Recuperación de contraseña';
		$mail->Body    = '<h1 align=center> Usuario:'.$cuil.'<br>Aqu&iacute; está su contraseña: ' . $enviarpass.'</h1>';
		// $mail->AltBody = $mensaje;

		$mail->send();
		echo "<script> alert('Contraseña enviada');window.location= '../loginUs.php' </script>";
	} catch (Exception $e) {
		echo "<script> alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}')";
	}
}
?>