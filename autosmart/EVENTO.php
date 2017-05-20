<?php

// Este programa es ejecutado por el modulo electronico, para 
// escribir el nuevo estado de la luz en la base de datos
// si se hace un cambio por Hardware (Encendido o apagado manual del Bombillo).

include ("conexion.php");

$placa = $_GET['placa'];
$causa = $_GET['causa'];

$mysqli = new mysqli($host, $user, $pw, $db);
       
$sql = "SELECT * from eventos order by id_evento DESC";
$result1 = $mysqli->query($sql);
$row1 = $result1->fetch_array(MYSQLI_NUM);
$dato_causa = $row1[1];

echo "dato_estado esta en...".$dato_causa;
$sql = "INSERT INTO eventos(nombre,causa,fecha,hora,placa) VALUES ('disparada','$causa',CURDATE(),CURTIME(),'$placa')";
$result1 = $mysqli->query($sql);
echo "Dato Ingresado, alarma"+'$causa';

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