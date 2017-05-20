<?php

// Este programa es ejecutado por el modulo electronico, para 
// escribir el nuevo estado de la luz en la base de datos
// si se hace un cambio por Hardware (Encendido o apagado manual del Bombillo).

include ("conexion.php");

$placa = $_GET['placa'];
$estado = $_GET['estado'];

$mysqli = new mysqli($host, $user, $pw, $db);
       
$sql = "SELECT * from alarma order by id_estado DESC";
$result1 = $mysqli->query($sql);
$row1 = $result1->fetch_array(MYSQLI_NUM);
$dato_estado = $row1[1];

echo "dato_estado esta en...".$dato_estado;
$sql = "INSERT INTO alarma(estado,origen,fecha,hora,placa) VALUES ('$estado','boton', CURDATE(),CURTIME(),'$placa')";
$result1 = $mysqli->query($sql);
echo "Dato Ingresado, alarma"+'$estado';

?>