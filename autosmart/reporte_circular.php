<?php
	session_start();
	include "conexion.php";
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
	<title>Auto Smart-Reporte Circular</title>
</head>
	
<body class="paginaAct">
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
  <form action="reporte_circular.php" method="POST">
	<div class="textPagina text-center lato">
	<div class="text-center">
	<p class="latoCont">
	<h1 class="contTeam">Reporte Circular</h1><BR>
	
    <?php

    if ($_SESSION["tipo"]== "Consulta")
	 			{
      	if (!(isset($_POST["enviado"])))
            {
    ?>
    <h3 class="latoContenido text-center">Introduzca el rango de fechas en las cuales quisiera ver el reporte de los estados de la alarma</h3>
		<table cellspacing="20" align="center" width="40%">
		
			<tr>
				<td class="latoCont">Fecha</a></td>
				<td><input type=date name="fecha_ini" class="inputContacto" required value=""></input></td>
			</tr>
			<tr>
				<td class="latoCont">Fecha final</a></td>
				<td><input type=date name="fecha_fin" class="inputContacto" required value=""></input></td>
			</tr>
			<tr>
				<td colspan="2"  class="teamIndex"><input type=hidden value="1" name="enviado"><button class="botonInto lato" type="submit" name="envia">Ver gráfico</button></td>

			</tr>
     	</table>
     	<?php
			}
			else
         	{
	            $enviado = $_POST["enviado"];
	            $fecha_ini = $_POST["fecha_ini"];
	            $fecha_fin = $_POST["fecha_fin"];
	            if ($enviado == 1)
             {
             	$mysqli = new mysqli($host, $user, $pw, $db);
			    $sql = "SELECT * from alarma where fecha >='$fecha_ini' and fecha<= '$fecha_fin' and placa = '$placa' order by id_estado";
			    $result1 = $mysqli->query($sql);
			    $sql1 = "SELECT * from eventos where fecha >='$fecha_ini' and fecha<= '$fecha_fin' and placa = '$placa' order by id_evento";
			    $resultado = $mysqli->query($sql1);
			       // A continuación despliega el encabezado de la tabla resultante
           echo '
           		<table cellspacing="20" align="center" width="40%">
                <tr>  
                    <td colspan=4><h2 class="latoTextdos text-center">Datos para elaboración de Grafico '.$fecha_ini.' - '.$fecha_fin.'</h2>
                    </td>
		        </tr>
                <tr>
                  	<td class="latoCont">Estado</td>
                   	<td class="latoCont">Origen</td>
                   	<td class="latoCont">Fecha</td>
                  	<td class="latoCont">Hora</td>
                </tr>';

            $alarma[0]=0;
            $alarma[1]=0;
           

            while($row1 = $result1->fetch_array(MYSQLI_NUM))
            {

	            $estado_alarma = $row1[1];
                    if ($estado_alarma == "activada")
                    	$alarma[0] = $alarma[0] +1;
                    $estado1 = "Activada";
                    if ($estado_alarma == "desactivada")                    	
                    	$alarma[1] = $alarma[1] +1;
                    $estado2 = "Desactivada";
	            $origen_alarma = $row1[2];
	            $fecha_alarma = $row1[3];
	            $hora_alarma = $row1[4];

	            echo ' 
                <tr>
                	<td class="latoCont">'.$estado_alarma.'</td>
                  	<td class="latoCont">'.$origen_alarma.'</td>
                  	<td class="latoCont">'.$fecha_alarma.'</td>
                  	<td class="latoCont">'.$hora_alarma.'</td>
                </tr>';
                     
            }

             $disparo[0]=0;
            while($row2 = $resultado->fetch_array(MYSQLI_NUM))
            {

	            $estado_disparo = $row2[1];
	            	if($estado_disparo == "disparada")
	            		$estado3 = "Disparada";
	            		$disparo[0] = $disparo[0] +1;
	            $origen_disparo = $row2[2];
	            $fecha_disparo = $row2[3];
	            $hora_disparo = $row2[4];
	            
	            echo '    
                <tr>
                	<td class="latoCont">'.$estado_disparo.'</td>
                  	<td class="latoCont">'.$origen_disparo.'</td>
                  	<td class="latoCont">'.$fecha_disparo.'</td>
                  	<td class="latoCont">'.$hora_disparo.'</td>
                </tr>
                	
                ';
              
                }


            echo "</table>";
           
                 
	include("GoogChart.class.php");
	$chart = new GoogChart( );
	$color = array ( '#95b645', '#7498e9', '#F19999',);
	$dataMultiple = array(
		'Activada: '.$alarma[0] => $alarma[0],
		'Desactivada: '.$alarma[1] => $alarma[1],
		'Disparada: '.$disparo[0] => $disparo[0],
		);

	echo '<h2 class=latoCont>REPORTE DE LA ALARMA</h2>';
	$chart->setChartAttrs( array(
	'type' => 'pie',
	'title' => 'ALARMA '.$fecha_ini,
	'data' => $dataMultiple,
	'size' => array( 550, 300 ),
	'color' => $color,
	'labelsXY' => true,
));
echo $chart;

 		echo '                 
        <table width=670 border=0  align=center> 
           <tr>
          		<td align="center" ><form action="reporte_circular.php" method=POST><input class="botonInto lato" type=submit value="Otro Reporte" name="Enviar2"></form></td>
				<td align="center" ><form action="reportes.php" method=POST><input class="botonInto lato" type=submit value="Volver al Menu" name="Enviar3"></form></td>
            </tr>
        </table>';

               }            
	         } 
	     }
	     else {
	     		if ($_SESSION["tipo"]== "Administrador"){
					if (!(isset($_POST["enviado"])))
				
            {
    ?>
    <h3 class="latoContenido text-center">Introduzca la placa del carro que desea consultar</h3>
		<table cellspacing="20" align="center" width="40%">
		
			<tr>
				<td class="latoCont">Placa</a></td>
				<td><input type=text name="plac" class="inputContacto" required value=""></input></td>
			</tr>
			<tr>
			</tr>
	     </table>
	             <h3 class="latoContenido text-center">Introduzca el rango de fechas en las cuales quisiera ver el reporte de los estados de la alarma</h3>
			<table cellspacing="20" align="center" width="40%">
			<tr>
				<td class="latoCont">Fecha</a></td>
				<td><input type=date name="fecha_ini" class="inputContacto" required value=""></input></td>
			</tr>
			<tr>
				<td class="latoCont">Fecha final</a></td>
				<td><input type=date name="fecha_fin" class="inputContacto" required value=""></input></td>
			</tr>
			<tr>
				<td colspan="2"  class="teamIndex"><input type=hidden value="1" name="enviado"><button class="botonInto lato" type="submit" name="envia">Ver gráfico</button></td>

			</tr>
     	</table>
     	<?php
			}
			else
         	{
	            $enviado = $_POST["enviado"];
	            $fecha_ini = $_POST["fecha_ini"];
	            $fecha_fin = $_POST["fecha_fin"];
	         	$placa = $_POST["plac"];
	          if ($enviado == 1)
             {
             	$mysqli = new mysqli($host, $user, $pw, $db);
			    $sql = "SELECT * from alarma where fecha >='$fecha_ini' and fecha<= '$fecha_fin' and placa = '$placa' order by id_estado";
			    $result1 = $mysqli->query($sql);
			    $sql1 = "SELECT * from eventos where fecha >='$fecha_ini' and fecha<= '$fecha_fin' and placa = '$placa' order by id_evento";
			    $resultado = $mysqli->query($sql1);
			       // A continuación despliega el encabezado de la tabla resultante
           echo '
           		<table cellspacing="20" align="center" width="40%">
                <tr>  
                    <td colspan=4><h2 class="latoTextdos text-center">Datos para elaboración de Grafico '.$fecha_ini.' - '.$fecha_fin.'</h2>
                    </td>
		        </tr>
                <tr>
                  	<td class="latoCont">Estado</td>
                   	<td class="latoCont">Origen</td>
                   	<td class="latoCont">Fecha</td>
                  	<td class="latoCont">Hora</td>
                </tr>';

            $alarma[0]=0;
            $alarma[1]=0;
           

            while($row1 = $result1->fetch_array(MYSQLI_NUM))
            {

	            $estado_alarma = $row1[1];
                    if ($estado_alarma == "activada")
                    	$alarma[0] = $alarma[0] +1;
                    $estado1 = "Activada";
                    if ($estado_alarma == "desactivada")                    	
                    	$alarma[1] = $alarma[1] +1;
                    $estado2 = "Desactivada";
	            $origen_alarma = $row1[2];
	            $fecha_alarma = $row1[3];
	            $hora_alarma = $row1[4];

	            echo ' 
                <tr>
                	<td class="latoCont">'.$estado_alarma.'</td>
                  	<td class="latoCont">'.$origen_alarma.'</td>
                  	<td class="latoCont">'.$fecha_alarma.'</td>
                  	<td class="latoCont">'.$hora_alarma.'</td>
                </tr>';
                     
            }

             $disparo[0]=0;
            while($row2 = $resultado->fetch_array(MYSQLI_NUM))
            {

	            $estado_disparo = $row2[1];
	            	if($estado_disparo == "disparada")
	            		$estado3 = "Disparada";
	            		$disparo[0] = $disparo[0] +1;
	            $origen_disparo = $row2[2];
	            $fecha_disparo = $row2[3];
	            $hora_disparo = $row2[4];
	            
	            echo '    
                <tr>
                	<td class="latoCont">'.$estado_disparo.'</td>
                  	<td class="latoCont">'.$origen_disparo.'</td>
                  	<td class="latoCont">'.$fecha_disparo.'</td>
                  	<td class="latoCont">'.$hora_disparo.'</td>
                </tr>
                	
                ';
              
                }


            echo "</table>";
           
                 
	include("GoogChart.class.php");
	$chart = new GoogChart( );
	$color = array ( '#95b645', '#7498e9', '#F19999',);
	$dataMultiple = array(
		'Activada: '.$alarma[0] => $alarma[0],
		'Desactivada: '.$alarma[1] => $alarma[1],
		'Disparada: '.$disparo[0] => $disparo[0],
		);

	echo '<h2 class=latoCont>REPORTE DE LA ALARMA</h2>';
	$chart->setChartAttrs( array(
	'type' => 'pie',
	'title' => 'ALARMA '.$fecha_ini,
	'data' => $dataMultiple,
	'size' => array( 550, 300 ),
	'color' => $color,
	'labelsXY' => true,
));
echo $chart;

 		echo '                 
        <table width=670 border=0  align=center> 
           <tr>
          		<td align="center" ><form action="reporte_circular.php" method=POST><input class="botonInto lato" type=submit value="Otro Reporte" name="Enviar2"></form></td>
				<td align="center" ><form action="configuracion.php" method=POST><input class="botonInto lato" type=submit value="Volver al Menu" name="Enviar3"></form></td>
		
            </tr>
        </table>';
}
}
}
}
//}
		?>
		<br><br>
			</p>
	</div>
	</div>
</body>
</html>
              