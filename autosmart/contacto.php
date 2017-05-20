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
	<title>Auto Smart - Email</title>
</head>
<body class="fondoNegro">
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
				<td class="cerrarIndex"><a href="index.php" class="botonIn lato">Página principal</a></td>
			</tr>
		</table>
	</header>
	<form action="contacto.php" method="POST">
	<div id="contactoIndex">
		<div class="textPagina text-center">
			<h1 class="contTeam">Contáctanos</h1>
			 <?php
      	if (!(isset($_POST["enviado"])))
            {
    ?>
			<table cellspacing="20" align="center" style="padding: 0px 30px 0px 30px">
				<tr>
					<td><input placeholder="Tu nombre" type="text" name="nombre" class="inputContacto" required value=""></input><BR></td>
					<td><input placeholder="Tu correo" type="text" name="correo" class="inputContacto" required value=""></input><BR></td>
					<td><input placeholder="Asunto" type="text" name="asunto" class="inputContacto" required value=""></input><BR></td>
				</tr>
			</table>
			<textarea rows="10" cols="70" wrap="soft" placeholder="Escríbenos tu mensaje" type="text" name="mensaje" class="inputContacto"></textarea><BR>
			<table cellspacing="20" align="right" style="padding: 0px 235px 0px 10px">
				<tr>
					<td colspan="3"  class="teamIndex"><input type=hidden value="1" name="enviado"><button class="botonInn lato" type="submit" name="envia">Mandar mensaje</button></td>
				</tr>
			</table>
		
	<?php
		}
		else
		{
			$enviado = $_POST["enviado"];
			$nombre = $_POST["nombre"];
			$correo = $_POST["correo"];
			$asunto1 = $_POST["asunto"];
			$mensaje = $_POST["mensaje"];

			 if ($enviado == 1)
             {
             	
			//include ("phpmailer/class.phpmailer.php");
			//include ("phpmailer/class.smtp.php");
			require 'phpmailer/PHPMailerAutoload.php';

			$mail = new PHPMailer(); 
			$mail->IsSMTP(); 
			//$mail->SMTPDebug = 2;   
			// Si se quiere mas detalle de un posible error, 
			// descomentar la linea anterior 
			$mail->SMTPAuth = true; 
			$mail->SMTPSecure = "ssl"; 
			$mail->Host = "smtp.gmail.com"; 
			$mail->Port = 465; 
			$mail->Username = "smartcarfab@gmail.com"; 
			$mail->Password = "Smartcar";
			$mail->From = "smartcarfab@gmail.com"; 
			$mail->FromName = "Sugerencias Usuario"; 
			$mail->Subject = $asunto1; 
			$mail->AltBody = $mensaje; 
			$mail->MsgHTML("<b>El usuario ".$nombre."<br> con correo ".$correo."<br><br>Mando el siguiente mensaje: <br>".$mensaje."</b>."); 
			//$mail->AddAttachment("files/files.zip"; 
			//$mail->AddAttachment("files/img03.jpg"; 
			$mail->AddAddress("isaaristi0@gmail.com", "Usuario de Prueba"); 
			$mail->IsHTML(true); 
			if(!$mail->Send()) { 
			  echo "Error: " . $mail->ErrorInfo; 
			  } else { 
			?>
			<h1 class="latoCont">Mensaje enviado con éxito</h1>
			<form action="contacto.php" method=POST><input class="botonIn lato" type=submit value="Mandar otro mensaje" name="Enviar3">

			<?php
			 }

	}
	}
	?>
	</div>
	</div>
	<div id="portadaDos" class="text-center" align="center">
		</table><br><br>
		<table cellspacing="20" align="center" style="padding: 0px 30px 0px 30px;">
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