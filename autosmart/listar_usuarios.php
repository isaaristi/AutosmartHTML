<?php
	include ("conexion.php");
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
	<title>Auto Smart-Listar Usuarios</title>
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
	<div class="text-center">
		<h1 class="contTeam">Lista de Usuarios</h1>

		<?php
			//Se hace la conexion y posterior consulta en la base de datos
			$mysqli = new mysqli($host, $user, $pw, $db);
			$sql = "SELECT * from usuario order by id DESC";
			//echo "sql es...".$sql;
			$result1 = $mysqli->query($sql);
			//$row1 = $result1->fetch_array(MYSQLI_NUM);

			// A continuación despliega el encabezado de la tabla resultante
			echo '
			
			<table cellspacing="20" align="center" width="40%">
						
			<tr>
				<td class="latoCont"><h2>Nombre</h2></td>
				<td class="latoCont"><h2>Identificación</h2></td>
				<td class="latoCont"><h2>Dirección</h2></td>
				<td class="latoCont"><h2>Fecha de nacimiento</h2></td>
				<td class="latoCont"><h2>Telefono</h2></td>
				<td class="latoCont"><h2>Usuario</h2></td>
				
				<td class="latoCont"><h2>Tipo</h2></td>
			</tr>';
				// A continuación se despliegan todos los datos. 
              
				while($row1 = $result1->fetch_array(MYSQLI_NUM))
				 {
					$nombre = $row1[1];
					$identificacion = $row1[2];
					$direccion  = $row1[3];
					$fecha = $row1[4];
					$telefono  = $row1[5];
					$usuario  = $row1[6];
				
					$tipo  = $row1[8];
						
					echo ' 
						<tr>
							<td class="latoCont">'.$nombre.'</td>
							<td class="latoCont">'.$identificacion.'</td>
							<td class="latoCont">'.$direccion.'</td>
							<td class="latoCont">'.$fecha.'</td>
							<td class="latoCont">'.$telefono.'</td>
							<td class="latoCont">'.$usuario.'</td>
						
							<td class="latoCont">'.$tipo.'</td>							
						</tr>';
						
					}				
                 
                // Ahora se despliega el fin de la tabla 
                echo '
				</td>
                 </tr>
				 </table>
					
                 <a href="usuarios.php" class="botonInto lato">Volver</a>';
			   
	      ?>
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