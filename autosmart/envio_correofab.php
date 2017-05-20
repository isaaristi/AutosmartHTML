

<?php
$causa = $_GET['causa'];

//include ("phpmailer/class.phpmailer.php");
//include ("phpmailer/class.smtp.php");
require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer(); 
$mail->IsSMTP(); 
//$mail->SMTPDebug = 2;   
// Si se quiere mas detalle de un posible error, 
// descomentar la linea anterior 
$mail->SMTPAuth = true; 
$mail->SMTPSecure = "ssl"; 
$mail->Host = "smtp.gmail.com"; 
$mail->Port = 465; 
$mail->Username = "smartcarfab@gmail.com"; 
$mail->Password = "Smartcar";
$mail->From = "smartcarfab@gmail.com"; 
$mail->FromName = "Servicio de notificacion de disparos"; 
$mail->Subject = "Alerta!"; 
$mail->AltBody = "ALERTA! la alarma de su automivil se ha disparado por: ".$causa; 
$mail->MsgHTML("<b>ALERTA! la alarma de su automivil se ha disparado por: ".$causa."</b>."); 
//$mail->AddAttachment("files/files.zip"; 
//$mail->AddAttachment("files/img03.jpg"; 
$mail->AddAddress("galindezfabian6@gmail.com", "Usuario de Prueba"); 
$mail->IsHTML(true); 
if(!$mail->Send()) { 
  echo "Error: " . $mail->ErrorInfo; 
  } else { 
echo "Mensaje enviado correctamente"; 
 }

?>