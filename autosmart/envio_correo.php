<?php

$causa = $_GET['causa'];

require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer(); 
$mail -> IsSMTP(); 
$mail->SMTPAuth = true; 
$mail->SMTPSecure = "ssl"; 
$mail->Host = "smtp.gmail.com"; 
$mail->Port = 465; 
$mail->Username = "gestionalarma.34@gmail.com"; 
$mail->Password = "lablab35";
$mail->From = "gestionalarma.34@gmail.com"; 
$mail->FromName = "Servivio de notificacion de disparo"; 
$mail->Subject = "Notificacion de disparo"; 
$mail->AltBody = "La alarma de su auto se ha disparado debido a: ".$causa; 
$mail->MsgHTML("<b>La alarma de su auto se ha disparado debido a: ".$causa." </b>."); 
$mail->AddAddress("bniko.777@gmail.com", "Nicolas Paz"); 
$mail->IsHTML(true); 

if(!$mail->Send()) { 
	echo "Error: " . $mail->ErrorInfo; 
} 
else { 
	echo "Mensaje enviado correctamente"; 
}

?>