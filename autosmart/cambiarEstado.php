<?php
	session_start();
	$log = $_SESSION['logged'];
	$nombre = $_SESSION['nombre'];
	$placa = $_SESSION['placa'];

	if ($log != "si") {
		header("Location: login.php");
	}

	$estado = $_REQUEST['estado'];
	include ("conexion.php");
	$con = mysqli_connect($host,$user,$pw,$db);

	if ($estado) {
		
		$in = mysqli_query($con, "INSERT INTO alarma (estado, origen, fecha, hora, placa) VALUES ('$estado', 'web', CURDATE(), CURTIME(), '$placa')") 
						or die (mysql.error());

						
		header("Location: activacion.php");

	} else {
		echo "Opc incorrecta";
	}

?>