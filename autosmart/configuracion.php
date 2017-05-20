<?php
	session_start();
	$log = $_SESSION['logged'];

	if ($log != "si") {
		header("Location: login.php");
	}
	if ($_SESSION["tipo"]== "Administrador")
	 {
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
	<title>Auto Smart-Configuración</title>
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
	<h1 class="contTeam">Configuración</h1>
	<BR><BR><BR><BR><BR><BR>
	<table cellspacing="20" align="center" style="padding: 0px 30px 0px 30px;">
			<tr>
				<td><a href="usuarios.php" class="botonIcon lato"><input type=image src="icons/usuario.png" align="center"></a></td>
				<td><a href="reporte_circular.php" class="botonIcon lato"><input type=image src="icons/technology.png" align="center"></a></td>
				<td><a href="reporte_barras.php" class="botonIcon lato"><input type=image src="icons/business.png" align="center"></a></td>
			</tr>
			<tr>
				<td><h2 class="latoTextuno text-center">Usuarios</h2></td>
				<td><h2 class="latoTextcu text-center">Gráfico Circular</h2></td>
				<td><h2 class="latoTexttres text-center">Gráfico de barras</h2></td>
			</tr>
			
		</table>
		
		</p>
	</div>
	</div>
</body>
</html>
<?php
 }
 else {
 	header("Location: index.php");
}
?>