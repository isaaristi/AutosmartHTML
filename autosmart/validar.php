<?php

	$usuario = $_REQUEST['user'];
	$pass = $_REQUEST['pass'];
	$pass_c = crypt($pass,"2A");

	session_start();

	$login = $_SESSION['logged'];
	

	include ("conexion.php");
	
	$con = mysqli_connect($host,$user,$pw,$db);
	$log = mysqli_query($con, "SELECT * FROM usuario WHERE usuario = '".$usuario."' AND contrasena = '".$pass_c."'") 
					or die (mysql.error());
	if ($reg = mysqli_fetch_array($log))
	{
		$_SESSION['logged'] = "si";
		
		$tipo = $reg[8];
		$_SESSION["nombre"] = $reg[1];
		$_SESSION["placa"] = $reg[9]; 
		if ($tipo == 1)
			$_SESSION["tipo"] = "Administrador";
		if ($tipo == 2)
			$_SESSION["tipo"] = "Consulta";
		header("Location: index.php");
	} else {
		header("Location: login.php?mensaje=1");
	}
?>