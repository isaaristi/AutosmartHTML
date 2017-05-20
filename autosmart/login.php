<?php
	session_start();
	$_SESSION['logged'] = "no";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
	<title>Auto Smart</title>
</head>
<body class="loginImg">
	<div class="contenedor">
		<div class="text-center loginForm">
			<img src="imgs/car.png" class="imgppl"/>
			<h1 class="blacklisted">Auto</h1>
            <h1 class="beyond">Smart</h1>
            <br>
				<p id="flashIncorrecto">
			 <?php
                if (isset($_GET["mensaje"]))
                {
                	$mensaje = $_GET["mensaje"];
                   		if ($_GET["mensaje"]!=""){
                    	 if ($mensaje == 1)
                         echo "El usuario o la Contraseña son incorrectos.";
                 		}
             	}
             ?>
             </p>
			<h2 class="lato">Ingresa tu cuenta</h2>
			<form action="validar.php" method="POST">
			<div class="inner-addon left-addon">
				<img src="icons/user.png" class="glyphicon"></img>
				<input placeholder="Usuario" type="text" name="user" class="inputLogin"></input><BR>
			</div>
			<div class="inner-addon left-addon">
				<img src="icons/pass.png" class="glyphicon"></img>
				<input placeholder="Contraseña" type="password" name="pass" class="inputLogin"></input><BR><BR>
			</div>
				<button class="botonInto lato" type="submit" name="ingresar">Ingresar</button>
			</form>
		</div>
	</div>
</body>
</html>