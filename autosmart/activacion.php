<?php
	session_start();
	$log = $_SESSION['logged'];
	$nombre = $_SESSION['nombre'];
	$placa = $_SESSION['placa'];
	if ($log != "si") {
		header("Location: login.php");
	}
	if ($_SESSION["tipo"]== "Consulta")
	 {
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
	<title>Auto Smart-Activar/Desactivar</title>
</head>
<body class="paginaAct">
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
				<td class="teamIndex"><a href="configuracion.php" class="botonIn lato">Configuración</a></td>
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
	<div class="textPagina text-center">
		<!--<img src="imgs/LightRedFlash.gif" class="imgppl"><BR><BR>-->
		<h1 class="contTeam">Alarma</h1>
		<BR><BR><BR><BR>

		<table  cellspacing="0" cellpadding="50" align="center" style="padding: 0px 30px 0px 30px;" class="latoContent">
		<tr>
			<td rowspan="3" class="acomodar" align="right"><h1>Haga click en la acción que desea realizar</h1></td>
			<td rowspan="3" align="center">
				<form action="cambiarEstado.php" method="POST">
					<button class="botonInn lato" type="submit" name="estado" value="activada">Activar<input type=image src="icons/lock.png" align="center"></button><BR><BR>
					<button class="botonInn lato" type="submit" name="estado" value="desactivada">Desactivar<input type=image src="icons/unlock.png" align="center"></button>
				</form>
			</td>
			<td style="padding: 0px;"><input type=image src="icons/location.png" align="center"></a></td>
			<td style="padding: 0px;" class="latoCo"><h4 class="lato text-center">Nuestra dirección</h4></td>
			<td style="padding: 0px;" class="latoCo"><h5 class="lato text-center">Universidad del Cauca</h5></td>
		</tr>
		
		<tr>
			<td style="padding: 0px;"><a href="contacto.php"><input type=image src="icons/black.png" align="center"></a></td>
			<td style="padding: 0px;" class="latoCo"><h4 class="lato text-center">contáctanos via e-mal</h4></td>
			<td style="padding: 0px;"></td>
		</tr>

		<tr>
			<td style="padding: 0px;"><input type=image src="icons/telephone.png" align="center"></a></td>
			<td style="padding: 0px;" class="latoCo"><h4 class="lato text-center">Nuestro teléfono</h4></td>
			<td style="padding: 0px;" class="latoCo"><h5 class="lato text-center">8209800 Ext:2016</h5></td>
		</tr>
		
	</table>
	</div>

</body>
</html>
<?php
 }
 else {
 	header("Location: index.php");
}
?>