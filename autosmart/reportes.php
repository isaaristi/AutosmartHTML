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
	<title>Auto Smart-Reportes</title>
</head>
<body class="paginaDisp">
	<header id="header">
		<table cellspacing="5">
			<tr>
				<td><img src="imgs/car.png" class="imgIndex" /></td>
					<td class="tituliIndex"><h4 class="blacklisted">Auto</h4></td>

				<td class="tituloIndex"><h4 class="beyond">Smart</h4></td>
				<td class="teamIndex"><a href="team.php" class="botonIn lato">¿Quienes somos?</a></td>
				<td class="cerrarIndex"><a href="index.php" class="botonIn lato">Página principal</a></td>
				
			</tr>
		</table>
	</header>
	<div class="textPagina text-center lato">
	<div class="text-center">
	<p class="latoCont">
	<h1 class="contTeam">Reportes</h1>
	<BR><BR>
	<table cellspacing="20" align="center" style="padding: 0px 30px 0px 30px;">
			<tr>
				<td><a href="reporte_circular.php" class="botonIcon lato"><input type=image src="icons/technology.png" align="center"></a></td>
				<td><a href="reporte_barras.php" class="botonIcon lato"><input type=image src="icons/business.png" align="center"></a></td>
			</tr>
			<tr>
				<td><h2 class="latoTexttres text-center">Gráfico Circular</h2></td>
				<td><h2 class="latoTextuno text-center">Gráfico de barras</h2></td>
			</tr>
			
		</table>
		<table cellspacing="10" align="center" style="padding: 0px 30px 0px 30px;">
			<tr>
				<td><input type=image src="icons/location.png" align="center"></a></td>
				<td><a href="contacto.php"><input type=image src="icons/black.png" align="center"></a></td>
				<td><input type=image src="icons/telephone.png" align="center"></a></td>
			</tr>
			<tr>
				<td><h4 class="latoCont text-center">Nuestra dirección</h4></td>
				<td><h4 class="latoCont text-center">contáctanos via e-mal</h4></td>
				<td><h4 class="latoCont text-center">Nuestro teléfono</h4></td>
			</tr>
			<tr>
				<td><h5 class="latoCont text-center">Universidad del Cauca</h5></td>
				<td><h4 class="latoCont text-center"></h4></td>
				<td><h5 class="latoCont text-center">8231037</h5></td>
			</tr>
		</table>
		<br><br>
		</p>
	</div>
	</div>
</body>
</html>