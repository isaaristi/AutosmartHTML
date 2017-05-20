<?php
	session_start();
	$log = $_SESSION['logged'];

	if ($log != "si") {
		header("Location: login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
	<title>Smart Automobile-Nuestro Equipo</title>
</head>
<body class="fondoBlanco">
	<header id="header">
		<table style="padding: 0px 30px 0px 30px;">
			<tr>
				<td><img src="imgs/car.png" class="imgIndex" /></td>
				<td class="tituliIndex"><h4 class="blacklisted">Auto</h4></td>

				<td class="tituloIndex"><h4 class="beyond">Smart</h4></td>
				<td class="teamIndex"><a href="team.php" class="botonIn lato">¿Quienes somos?</a></td>
				<?php
	 			if ($_SESSION["tipo"]== "Administrador")
	 			{
			?>	
				<td class="teamIndex"><a href="crear_usuario.php" class="botonIn lato">Configuración</a></td>
			<?php
				}
				else {
					if ($_SESSION["tipo"]== "Consulta")
			?>
				<td class="teamIndex"><a href="reportes.php" class="botonIn lato">Reportes</a></td>
			<?php
				}
			?>
				<td class="cerrarIndex"><a href="index.php" class="botonIn lato">Página principal </a></td>
			</tr>
		</table>
	</header>
	<div class="text-center textPagina">
		<h1 class="contTeam">El equipo</h1>
		<h2 class="lato"></h2>
	</div>

<div id="portadaDos" class="text-center" align="center">
		<table cellspacing="20" align="center" style="padding: 0px 30px 0px 30px;">
			<tr>
				<td><input type=image class="teamImg" src="imgs/karen.jpg" align="center"></td>
				<td><input type=image class="teamImg" src="imgs/isabel.jpg" align="center"></td>
				<td><input type=image class="teamImg" src="imgs/nathalia.jpg" align="center"></td>
				<td><input type=image class="teamImg" src="imgs/ana.jpg" align="center"></td>
			</tr>
			<tr>
				<td><h2 class="latoTextuno text-center">Karen Muñoz</h2></td>
				<td class="table"><h2 class="latoTextdos text-center">Isabel Aristizábal</h2></td>
				<td><h2 class="latoTexttres text-center">Nathalia Girón</h2></td>
				<td><h2 class="latoTextcu text-center">Ana Díaz</h2></td>
			</tr>
			
		</table><br><br>
		<table cellspacing="30" align="center" style="padding: 0px 30px 0px 30px;">
			<tr>
				<td><input type=image src="icons/location.png" align="center"></a></td>
				<td><a href="contacto.php"><input type=image src="icons/black.png" align="center"></a></td>
				<td><input type=image src="icons/telephone.png" align="center"></a></td>
			</tr>
			<tr>
				<td><h4 class="latoContenido text-center">Nuestra dirección</h4></td>
				<td><h4 class="latoContenido text-center">contáctanos via e-mal</h4></td>
				<td><h4 class="latoContenido text-center">Nuestro teléfono</h4></td>
			</tr>
			<tr>
				<td><h5 class="latoContenido text-center">Universidad del Cauca</h5></td>
				<td><h4 class="latoContenido text-center"></h4></td>
				<td><h5 class="latoContenido text-center">8209800 Ext:2016</h5></td>
			</tr>
		</table>
		<br><br>
	</div>


	</body>
</html>