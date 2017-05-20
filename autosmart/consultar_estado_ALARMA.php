<?php

// Este programa es ejecutado por el modulo electronico, para 
// consultar el estado de la luz y proceder a hacer el cambio 
// respectivo en el Hardware (Bombillo).

include ("conexion.php");
$placa = $_GET['placa'];
$mysqli = new mysqli($host, $user, $pw, $db);
       
$sql = "SELECT * from alarma where placa = '$placa'order by id_estado DESC";
//echo "sql es...".$sql;
$result1 = $mysqli->query($sql);
$row1 = $result1->fetch_array(MYSQLI_NUM);
$dato_alarma = $row1[1];

     
echo "**-*".$dato_alarma;


?>