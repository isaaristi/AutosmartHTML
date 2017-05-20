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
	<title>Auto Smart-Buscar Usuario</title>
</head>
<body class="loginImg">
	<header id="header">
		<table style="padding: 0px 30px 0px 30px;">
			<tr>
				<td><img src="imgs/car.png" class="imgIndex" /></td>
					<td class="tituliIndex"><h4 class="blacklisted">Auto</h4></td>

				<td class="tituloIndex"><h4 class="beyond">Smart</h4></td>
				<td class="teamIndex"><a href="team.php" class="botonIn lato">¿Quienes somos?</a></td>	
				<td class="teamIndex"><a href="configuracion.php" class="botonIn lato">Configuración</a></td>
				<td class="cerrarIndex"><a href="index.php" class="botonIn lato">Página principal </a></td>
			</tr>
		</table>
	</header>
	<form action="buscar.php" method="POST">
	<div style="padding-top: 90px;" align="center">
	<div class="usuarioForm">
	<div class="text-center">
		<h1 align="center" class="border-white lato">Busca el usuario que deseas ver</h1>
		<p id="flashIncorrecto">
			 <?php
                if (isset($_GET["mensaje"]))
                {
                	$mensaje = $_GET["mensaje"];
                   		if ($_GET["mensaje"]!=""){
                    	 if ($mensaje == 1)
                         echo "La cédula introducida no coincide con ningún usuario.";
                 		}
             	}
             ?>
             </p>
		<table cellspacing="20" width="80%">
			<tr>
				<td class="latoCont">Introduce la cédula</a></td>
				<td><input type="text" name="identi" placeholder="Cédula" class="inputContacto"></input></td>
			</tr>
			<tr>
				<td><a href="configuracion.php" class="botonInto lato">Cancelar</a></td>
				<td><input type=hidden value="1" name="enviado"><button class="botonInto lato" type="submit" name="enviar">Buscar usuario</button></td>
			</tr>
		</table>
	</div>
	</div>
	</div>
	</form>
	</body>
</html>
<?php
 }
 else {
 	header("Location: index.php");
}
?>