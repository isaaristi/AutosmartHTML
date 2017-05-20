<?php

	$identi = $_REQUEST['identi'];
	//$pass = $_REQUEST['pass'];
	//$pass_c = crypt($pass,"2A");

	session_start();

	$login = $_SESSION['logged'];
	

	include ("conexion.php");
	
	$con = mysqli_connect($host,$user,$pw,$db);
	$log = mysqli_query($con, "SELECT * FROM usuario WHERE identificacion = '".$identi."'") 
					or die (mysql.error());

	if ($reg = mysqli_fetch_array($log))
	{
		$_SESSION['logged'] = "si";
		
		$ide = $reg[2];
		if ($ide == $identi)
			$id = $reg[2];
			$nom = $reg[1];
			$dir = $reg[3];
			$tel = $reg[5];
			header("Location: cambiar_datos.php?nom=$nom&dir=$dir&tel=$tel&id=$id");
	} else {
			header("Location: buscar_usuario.php?mensaje=1");
	}
?>