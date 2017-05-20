<?php
	session_start();
	$log = $_SESSION['logged'];
	$nombre = $_SESSION['nombre'];
	$placa = $_SESSION['placa'];

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
	<title>Auto Smart-Página Principal</title>
</head>
<body class="fondoBlanco">

	<header id="header">
			<table style="padding: 0px 30px 0px 30px;">
			<tr>
			<td><img src="imgs/car.png" class="imgIndex"></td>
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
				<td class="cerrarIndex"><a href="login.php" class="botonIn lato">Cerrar sesión</a></td>
			</tr>
		</table>
	</header>
	<div id="portadaIndex">
	<div>
	<?php
	 			if ($_SESSION["tipo"]== "Administrador")
	 			{
			?>	
			<h3 class="latoCont" style="text-align: left; padding: 130px 0px 0px 30px;">Bienvenido: <?php echo $nombre; ?></h3>
			<h3 class="latoCont" style="text-align: left; padding-left: 30px;">Administrador</h3>
			<?php
				}
				else {
					if ($_SESSION["tipo"]== "Consulta")
			?>
		<h3 class="champ" style="text-align: left; padding: 100px 0px 0px 30px;">Bienvenido: <?php echo $nombre; ?></h3>
		<h3 class="champ" style="text-align: left; padding-left: 30px;">Placa: <?php echo $placa; ?></h3>
		<?php
				}
			?>
			<h1 class="blacklisted border-white textPortada">KEEP IT SAFE!</h1>
	</div>
		<div class="textPortada">
			
		</div>
	</div>
	<div id="portadaDos" class="text-center" align="center">
		<br><br>
		<h1 class="color">OPCIONES</h1>
		<h4 class="colorP">Selecciona la opcion que deseas</h4>
		<br>
		<table cellspacing="20" align="center" style="padding: 0px 30px 0px 30px;">
			<tr>
				<td><a href="estado.php" class="botonIconU lato"><input type=image src="icons/car.png" align="center"></a></td>
				<td><a href="disparos.php" class="botonIconD lato"><input type=image src="icons/alarm (1).png" align="center"></a></td>
					<?php
	 			if ($_SESSION["tipo"]== "Administrador")
	 			{
			?>	
				<td></td>
				
			<?php
				}
				else {
					if ($_SESSION["tipo"]== "Consulta")
			?>
				<td><a href="activacion.php" class="botonIconT lato"><input type=image src="icons/key.png" align="center"></a></td>
			<?php
				}
			?>
				
			</tr>
			<tr>
				<td><h2 class="latoTextuno text-center">Estados</h2></td>
				<td class="table"><h2 class="latoTextdos text-center">Disparos</h2></td>
				<?php
	 			if ($_SESSION["tipo"]== "Administrador")
	 			{
			?>	
				<td></td>
				
			<?php
				}
				else {
					if ($_SESSION["tipo"]== "Consulta")
			?>
				<td><h2 class="latoTexttres text-center">Activación y Desactivación</h2></td>
			<?php
				}
			?>
				
			</tr>
			<tr>
				<td><h3 class="latoContenido text-center">Aquí podrás consultar el estado actual de la alarma de tu carro.</h3></td>
				<td class="table"><h3 class="latoContenido text-center">Aquí podrás consultar los últimos tres eventos ocurridos con la alarma de tu carro.</h3></td>
					<?php
	 			if ($_SESSION["tipo"]== "Administrador")
	 			{
			?>	
				<td></td>
				
			<?php
				}
				else {
					if ($_SESSION["tipo"]== "Consulta")
			?>
				<td><h3 class="latoContenido text-center">Aquí podrás activar o desactivar la alarma de tu carro.</h3></td>
			<?php
				}
			?>
				
			</tr>
		</table><br><br><br><br>
		<table cellspacing="10" align="center" style="padding: 0px 30px 0px 30px;">
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
				<td><h5 class="latoContenido text-center">8231037</h5></td>
			</tr>
		</table>
		<br><br>
	</div>
</body>
</html>