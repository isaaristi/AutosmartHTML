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
	<title>Auto Smart-Estado</title>
</head>
<body class="paginaImg">
	<header id="header">
		<table cellspacing="5">
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
				<td class="cerrarIndex"><a href="index.php" class="botonIn lato">Página principal</a></td>
				
			</tr>
		</table>
	</header>
	<div class="textPagina text-center lato">
	<div class="text-center">
	<p class="latoCont">
	<h1 class="contTeam">Estado de la alarma</h1>
	<BR><BR><BR><BR>
		<?php
	 			if ($_SESSION["tipo"]== "Consulta")
	 			{
			?>	
	<table  cellspacing="0" cellpadding="40" align="center" style="padding: 0px 30px 0px 30px;" class="latoContent">
		<tr>
			<td rowspan="3" class="acomodar" align="right"><h1 >Esta es la última acción que se realizó con la alarma del carro</h1></td>
			<td rowspan="2" align="center" class="latoC" >
				<?php

					include ("conexion.php");
					$con = mysqli_connect($host,$user,$pw,$db);
					$estado = mysqli_query($con, "SELECT * FROM alarma where placa = '$placa' ORDER BY id_estado DESC LIMIT 1") 
									or die (mysql.error());
					$registro = mysqli_query($con, "SELECT estado FROM alarma where placa = '$placa' ORDER BY id_estado DESC LIMIT 1") 
									or die (mysql.error());

					while ($reg = mysqli_fetch_array($estado))
					{
						echo "Estado: ".$reg['estado']."<BR>";
						echo "Origen: ".$reg['origen']."<BR>";
						echo "Fecha: ".$reg["fecha"]."<BR>";
						echo "Hora: ".$reg["hora"]."<BR><BR>";
					}
					
				?>
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
		<?php
				//$esta = "SELECT estado FROM alarma ORDER BY id_estado DESC LIMIT 1";
				$esta = mysqli_fetch_array($registro);
				if ($esta['estado'] == "activada")
				{
		?>
			<td style="padding: 0px;"><a><input type=image src="icons/transport (1).png" align="center"></a></td>
		<?php
			}
			else {
				if ($esta['estado'] == "desactivada")
			
		?>
			<td style="padding: 0px;"><a><input type=image src="icons/tool.png" align="center"></a></td>
		<?php
			}
		?>
			<td style="padding: 0px;"><input type=image src="icons/telephone.png" align="center"></a></td>
			<td style="padding: 0px;" class="latoCo"><h4 class="lato text-center">Nuestro teléfono</h4></td>
			<td style="padding: 0px;" class="latoCo"><h5 class="lato text-center">8209800 Ext:2016</h5></td>
		</tr>
		
	</table>
	<?php
	}
		else {
				if ($_SESSION["tipo"]== "Administrador"){
					if (!(isset($_POST["enviado"])))
				
            {
    ?>
    <form action="estado.php" method="POST">
    <h3 class="latoContenido text-center">Introduzca la placa del carro que desea consultar</h3>
		<table cellspacing="20" align="center" width="40%">
		
			<tr>
				<td class="latoCont">Placa</a></td>
				<td><input type=text name="plac" class="inputContacto" required value=""></input></td>
			</tr>
			<tr>
				<td class="teamIndex"><input type=hidden value="1" name="enviado"><button class="botonInto lato" type="submit" name="envia">Buscar</button></td>
			</tr>
     	</table>

     	<?php
			}
			else
         	{
	            $enviado = $_POST["enviado"];
	            $plac = $_POST["plac"];
	            ?>
		<table  cellspacing="0" cellpadding="40" align="center" style="padding: 0px 30px 0px 30px;" class="latoContent">
			<tr>
				<td rowspan="3" class="acomodar" align="right"><h1 >Esta es la última acción que se realizó con la alarma del carro</h1></td>
				<td rowspan="2" align="center" class="latoC">
			<?php
	            include ("conexion.php");
					$con = mysqli_connect($host,$user,$pw,$db);
					$estado = mysqli_query($con, "SELECT * FROM alarma where placa = '$plac' ORDER BY id_estado DESC LIMIT 1") 
									or die (mysql.error());
					$registro = mysqli_query($con, "SELECT estado FROM alarma where placa = '$plac' ORDER BY id_estado DESC LIMIT 1") 
									or die (mysql.error());

					while ($reg = mysqli_fetch_array($estado))
					{
						echo "Estado: ".$reg['estado']."<BR>";
						echo "Origen: ".$reg['origen']."<BR>";
						echo "Fecha: ".$reg["fecha"]."<BR>";
						echo "Hora: ".$reg["hora"]."<BR><BR>";
					}
			?>
			</td>	
			</tr>
			<tr>
		<?php
				//$esta = "SELECT estado FROM alarma ORDER BY id_estado DESC LIMIT 1";
				$esta = mysqli_fetch_array($registro);
				if ($esta['estado'] == "activada")
				{
		?>
			<td style="padding: 0px;"><a><input type=image src="icons/transport (1).png" align="center"></a></td>
		<?php
			}
			else {
				if ($esta['estado'] == "desactivada")
			
		?>
			<td style="padding: 0px;"><a><input type=image src="icons/tool.png" align="center"></a></td>
		<?php
			}
		?>
			
		</tr>
		
	</table>
	<?php
		}
	}
}
	?>
	</p>

	</div>
	</div>
	
</body>
</html>
