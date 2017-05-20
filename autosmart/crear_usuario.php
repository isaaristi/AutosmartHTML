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
	<title>Auto Smart -Crear Usuario</title>
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
	<form action="usuario.php" method="POST">
	<div style="padding-top: 90px;" align="center">
	<div class="usuarioForm">
	<div class="text-center">
		<h1 align="center" class="border-white lato">Crea un nuevo usuario</h1>
			<p id="flashIncorrecto">
			 <?php
                if (isset($_GET["mensaje"]))
                {
                	$mensaje = $_GET["mensaje"];
                   		if ($_GET["mensaje"]!=""){
                    	 if ($mensaje == 1)
                         echo "El Usuario fue creado correctamente.";
                     	 if ($mensaje == 2)
                         echo "Error al crear el usuario.";
                 		}
             	}
             ?>
             </p>
		<table cellspacing="20" width="80%">
			<tr>
				<td class="latoCont">Nombre y Apellidos</a></td>
				<td><input type="text" name="nombre" class="inputContacto"></input></td>
			</tr>
			<tr>
				<td class="latoCont">Identificación</a></td>
				<td><input type="text" name="identificacion" class="inputContacto"></input></td>
			</tr>
			<tr>
				<td class="latoCont">Dirección</a></td>
				<td><input type="text" name="direccion" class="inputContacto"></input></td>
			</tr>
			<tr>
				<td class="latoCont">Fecha de nacimiento</a></td>
				<td><input type="text" name="fecha" placeholder="dd/mm/aaaa" class="inputContacto"></input></td>
			</tr>
			<tr>
				<td class="latoCont">Teléfono</a></td>
				<td><input type="text" name="telefono" class="inputContacto"></input></td>
			</tr>
			<tr>
				<td class="latoCont">Nombre de usuario</a></td>
				<td><input type="text" name="usuario" class="inputContacto"></input></td>
			</tr>
			<tr>
				<td class="latoCont">Contraseña</a></td>
				<td><input type="password" name="contrasena" class="inputContacto"></input></td>
			</tr>
			<tr>
				<td class="latoCont">Placa</a></td>
				<td><input type="text" name="placa" class="inputContacto"></input></td>
			</tr>
			<tr>
				<td class="latoCont">Tipo de usuario</a></td>
				<td>Administrador <input type="radio" name="tipo" value="1">
			        Consulta <input type="radio" name="tipo" value="2" checked>	</td>
			</tr>
			<tr>
				<td><a href="configuracion.php" class="botonInto lato">Cancelar</a></td>
				<td><input type=hidden value="1" name="enviado"><button class="botonInto lato" type="submit" name="enviar">Crear usuario</button></td>
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