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
$mail->IsSMTP(); 
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
$mail->AddAddress("galindezfabian6@gmail.com", "Usuario de Prueba"); 
$mail->IsHTML(true); 
if(!$mail->Send()) { 
  echo "Error: " . $mail->ErrorInfo; 
  } else { 
echo "Mensaje enviado correctamente"; 
 }
?>