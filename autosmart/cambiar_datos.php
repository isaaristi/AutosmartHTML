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
	<title>Auto Smart -Modificar Usuario</title>
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
	
	<div style="padding-top: 90px;" align="center">
	<div class="usuarioForm">
	<div class="text-center">
		<h1 align="center" class="border-white lato">Actualiza los datos o elimina el Usuario</h1>

		<form action="actualizar.php" method="POST">
		 <?php
                	$nom = $_GET["nom"];
                	$dir = $_GET["dir"];
                	$tel = $_GET["tel"];
                	$id = $_GET["id"];
             ?>
        
        <p id="flashIncorrecto">

		 <?php
                if (isset($_GET["mensaje"]))
                {
                	$mensaje = $_GET["mensaje"];
                   		if ($_GET["mensaje"]!=""){
                    	 if ($mensaje == 1)
                         echo "El Usuario fue actualizado correctamente.";
                     	 if ($mensaje == 2)
                         echo "Error al actualizar el usuario.";
                     	 if ($mensaje == 3)
                         echo "El usuario fue eliminado correctamente.";
                      	if ($mensaje == 4)
                         echo "Error al eliminar el usuario.";
                 		}
             	}
             ?>
             </p>
		<table cellspacing="20" width="80%">
			<tr>
				<td class="latoCont">La cédula del usuario es</a></td>
				<td class="inputContacto"><?php echo $id;?></td>
				<?php
					$_SESSION['identi']=$id;
				?>
			</tr>
			<tr>
				<td class="latoCont">Nombre y Apellidos</a></td>
				<td><input type="text" name="nom" class="inputContacto" value="<?php echo $nom;?>"></input></td>
			</tr>
			<tr>
				<td class="latoCont">Dirección</a></td>
				<td><input type="text" name="dir" class="inputContacto" value="<?php echo $dir?>"></input></td>
			</tr>
			<tr>
				<td class="latoCont">Teléfono</a></td>
				<td><input type="text" name="tel" class="inputContacto" value="<?php echo $tel?>"></input></td>
			</tr>
			<tr>
				<td><a href="usuarios.php" class="botonInto lato">Cancelar</a></td>
				<td><input type=hidden value="2" name="envi"><button class="botonInto lato" type="submit" name="envia">Actualizar usuario</button></td>
			</tr>
			</form>
		</table>
	</div>
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