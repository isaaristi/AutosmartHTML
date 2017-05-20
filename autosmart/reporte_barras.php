<?php
	session_start();
	include "conexion.php";
  include("barras.php");
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
	<title>Auto Smart-Reporte de barras</title>
</head>
<body class="paginaOm">
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
	 <form action="reporte_barras.php" method="POST">
	<div class="textPagina text-center lato">
	<div class="text-center">
	<p class="latoCont">
	<h1 class="contTeam">Reporte de barras</h1><BR>
	
    <?php
     if ($_SESSION["tipo"]== "Consulta")
	 			{
      if (!(isset($_POST["enviado"])))
            {
    ?>
    <h3 class="latoContenido text-center">Introduzca la fecha a partir de la cual se contara una semana para ver el reporte de los estados de la alarma</h3>
		 <table cellspacing="20" align="center" width="40%">
		
			<tr>
				<td class="latoCont">Fecha inicial</a></td>
				<td><input type=date name="fecha_ini" class="inputContacto" required value=""></input></td>
			</tr>
			<tr>
				<td class="teamIndex"><input type=hidden value="1" name="enviado"><button class="botonInto lato" type="submit" name="envia">Ver gráfico</button></td>

			</tr>
      </table>
      	<?php
			}
			else
         	{
	            $enviado = $_POST["enviado"];
	            $fecha_ini = $_POST["fecha_ini"];
	            if ($enviado == 1)
             {
             	$mysqli = new mysqli($host, $user, $pw, $db);
			    $sql1 = "SELECT * from alarma where fecha = '$fecha_ini' and placa = '$placa' order by id_estado";
			    $sql2 = "SELECT * from alarma where fecha =DATE_ADD('$fecha_ini', INTERVAL 1 DAY) and placa = '$placa' order by id_estado";
			    $sql3 = "SELECT * from alarma where fecha =DATE_ADD('$fecha_ini', INTERVAL 2 DAY) and placa = '$placa' order by id_estado";
				$sql4 = "SELECT * from alarma where fecha =DATE_ADD('$fecha_ini', INTERVAL 3 DAY) and placa = '$placa' order by id_estado";
				$sql5 = "SELECT * from alarma where fecha =DATE_ADD('$fecha_ini', INTERVAL 4 DAY) and placa = '$placa' order by id_estado";
		        $sql6 = "SELECT * from alarma where fecha =DATE_ADD('$fecha_ini', INTERVAL 5 DAY) and placa = '$placa' order by id_estado";
				$sql7 = "SELECT * from alarma where fecha =DATE_ADD('$fecha_ini', INTERVAL 6 DAY) and placa = '$placa' order by id_estado";
					//echo "sql es...".$sql;
					$result1 = $mysqli->query($sql1);
					$result2 = $mysqli->query($sql2);
					$result3 = $mysqli->query($sql3);
					$result4 = $mysqli->query($sql4);
					$result5 = $mysqli->query($sql5);
					$result6 = $mysqli->query($sql6);
					$result7 = $mysqli->query($sql7);
			    $sql11 = "SELECT * from eventos where fecha ='$fecha_ini' and placa = '$placa' order by id_evento";
			    $sql12 = "SELECT * from eventos where fecha =DATE_ADD('$fecha_ini', INTERVAL 1 DAY) and placa = '$placa' order by id_evento";
			    $sql13 = "SELECT * from eventos where fecha =DATE_ADD('$fecha_ini', INTERVAL 2 DAY) and placa = '$placa' order by id_evento";
				$sql14 = "SELECT * from eventos where fecha =DATE_ADD('$fecha_ini', INTERVAL 3 DAY) and placa = '$placa' order by id_evento";
				$sql15 = "SELECT * from eventos where fecha =DATE_ADD('$fecha_ini', INTERVAL 4 DAY) and placa = '$placa' order by id_evento";
		        $sql16 = "SELECT * from eventos where fecha =DATE_ADD('$fecha_ini', INTERVAL 5 DAY) and placa = '$placa' order by id_evento";
				$sql17 = "SELECT * from eventos where fecha =DATE_ADD('$fecha_ini', INTERVAL 6 DAY) and placa = '$placa' order by id_evento";
					//echo "sql es...".$sql;
					$result11 = $mysqli->query($sql11);
					$result12 = $mysqli->query($sql12);
					$result13 = $mysqli->query($sql13);
					$result14 = $mysqli->query($sql14);
					$result15 = $mysqli->query($sql15);
					$result16 = $mysqli->query($sql16);
					$result17 = $mysqli->query($sql17);
			     
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
            }

             $disparo[0]=0;
            while($row11 = $result11->fetch_array(MYSQLI_NUM))
            {
	            $estado_disparo = $row11[1];
	            	if($estado_disparo == "disparada")
	            		$estado3 = "Disparada";
	            		$disparo[0] = $disparo[0] +1;
	            $origen_disparo = $row11[2];
	            $fecha_disparo = $row11[3];
	            $hora_disparo = $row11[4];             
            }

 			$alarma[2]=0;
            $alarma[3]=0;
            while($row2 = $result2->fetch_array(MYSQLI_NUM))
            {
	            $estado_alarma = $row2[1];
                    if ($estado_alarma == "activada")
                    	$alarma[2] = $alarma[2] +1;
                    $estado1 = "Activada";
                    if ($estado_alarma == "desactivada")                    	
                    	$alarma[3] = $alarma[3] +1;
                    $estado2 = "Desactivada";
	            $origen_alarma = $row2[2];
	            $fecha_alarma = $row2[3];
	            $hora_alarma = $row2[4];                  
            }

            $disparo[1]=0;
            while($row12 = $result12->fetch_array(MYSQLI_NUM))
            {
	            $estado_disparo = $row12[1];
	            	if($estado_disparo == "disparada")
	            		$estado3 = "Disparada";
	            		$disparo[1] = $disparo[1] +1;
	            $origen_disparo = $row12[2];
	            $fecha_disparo = $row12[3];
	            $hora_disparo = $row12[4];             
            }

            $alarma[4]=0;
            $alarma[5]=0;
            while($row3 = $result3->fetch_array(MYSQLI_NUM))
            {
	            $estado_alarma = $row3[1];
                    if ($estado_alarma == "activada")
                    	$alarma[4] = $alarma[4] +1;
                    $estado1 = "Activada";
                    if ($estado_alarma == "desactivada")                    	
                    	$alarma[5] = $alarma[5] +1;
                    $estado2 = "Desactivada";
	            $origen_alarma = $row3[2];
	            $fecha_alarma = $row3[3];
	            $hora_alarma = $row3[4];                  
            }

             $disparo[2]=0;
            while($row13 = $result13->fetch_array(MYSQLI_NUM))
            {

	            $estado_disparo = $row13[1];
	            	if($estado_disparo == "disparada")
	            		$disparo[2] = $disparo[2] +1;
	            		$estado3 = "Disparada";
	            $origen_disparo = $row13[2];
	            $fecha_disparo = $row13[3];
	            $hora_disparo = $row13[4];             
            }


            $alarma[6]=0;
            $alarma[7]=0;
            while($row4 = $result4->fetch_array(MYSQLI_NUM))
            {
	            $estado_alarma = $row4[1];
                    if ($estado_alarma == "activada")
                    	$alarma[6] = $alarma[6] +1;
                    $estado1 = "Activada";
                    if ($estado_alarma == "desactivada")                    	
                    	$alarma[7] = $alarma[7] +1;
                    $estado2 = "Desactivada";
	            $origen_alarma = $row4[2];
	            $fecha_alarma = $row4[3];
	            $hora_alarma = $row4[4];                  
            }

             $disparo[3]=0;
            while($row14 = $result14->fetch_array(MYSQLI_NUM))
            {

	            $estado_disparo = $row14[1];
	            	if($estado_disparo == "disparada")
	            		$estado3 = "Disparada";
	            		$disparo[3] = $disparo[3] +1;
	            $origen_disparo = $row14[2];
	            $fecha_disparo = $row14[3];
	            $hora_disparo = $row14[4];             
            }


            $alarma[8]=0;
            $alarma[9]=0;
            while($row5 = $result5->fetch_array(MYSQLI_NUM))
            {
	            $estado_alarma = $row5[1];
                    if ($estado_alarma == "activada")
                    	$alarma[8] = $alarma[8] +1;
                    $estado1 = "Activada";
                    if ($estado_alarma == "desactivada")                    	
                    	$alarma[9] = $alarma[9] +1;
                    $estado2 = "Desactivada";
	            $origen_alarma = $row5[2];
	            $fecha_alarma = $row5[3];
	            $hora_alarma = $row5[4];                  
            }

             $disparo[4]=0;
            while($row15 = $result15->fetch_array(MYSQLI_NUM))
            {

	            $estado_disparo = $row15[1];
	            	if($estado_disparo == "disparada")
	            		$estado3 = "Disparada";
	            		$disparo[4] = $disparo[4] +1;
	            $origen_disparo = $row15[2];
	            $fecha_disparo = $row15[3];
	            $hora_disparo = $row15[4];             
            }

            $alarma[10]=0;
            $alarma[11]=0;
            while($row6 = $result6->fetch_array(MYSQLI_NUM))
            {
	            $estado_alarma = $row6[1];
                    if ($estado_alarma == "activada")
                    	$alarma[10] = $alarma[10] +1;
                    $estado1 = "Activada";
                    if ($estado_alarma == "desactivada")                    	
                    	$alarma[11] = $alarma[11] +1;
                    $estado2 = "Desactivada";
	            $origen_alarma = $row6[2];
	            $fecha_alarma = $row6[3];
	            $hora_alarma = $row6[4];                  
            }

             $disparo[5]=0;
            while($row16 = $result16->fetch_array(MYSQLI_NUM))
            {

	            $estado_disparo = $row16[1];
	            	if($estado_disparo == "disparada")
	            		$estado3 = "Disparada";
	            		$disparo[5] = $disparo[5] +1;
	            $origen_disparo = $row16[2];
	            $fecha_disparo = $row16[3];
	            $hora_disparo = $row16[4];             
            }

            $alarma[12]=0;
            $alarma[13]=0;
            while($row7 = $result7->fetch_array(MYSQLI_NUM))
            {
	            $estado_alarma = $row7[1];
                    if ($estado_alarma == "activada")
                    	$alarma[12] = $alarma[12] +1;
                    $estado1 = "Activada";
                    if ($estado_alarma == "desactivada")                    	
                    	$alarma[13] = $alarma[13] +1;
                    $estado2 = "Desactivada";
	            $origen_alarma = $row7[2];
	            $fecha_alarma = $row7[3];
	            $hora_alarma = $row7[4];                  
            }

             $disparo[6]=0;
            while($row17 = $result17->fetch_array(MYSQLI_NUM))
            {

	            $estado_disparo = $row17[1];
	            	if($estado_disparo == "disparada")
	            		$estado3 = "Disparada";
	            		$disparo[6] = $disparo[6] +1;
	            $origen_disparo = $row17[2];
	            $fecha_disparo = $row17[3];
	            $hora_disparo = $row17[4];             
            }

            $datos1[0] = $fecha_ini;
			$datos1[1] = date("Y-m-d",strtotime ( '+1 day' , strtotime ($fecha_ini)));
			$datos1[2] = date("Y-m-d",strtotime ( '+2 day' , strtotime ($fecha_ini)));
			$datos1[3] = date("Y-m-d",strtotime ( '+3 day' , strtotime ($fecha_ini)));
			$datos1[4] = date("Y-m-d",strtotime ( '+4 day' , strtotime ($fecha_ini)));
			$datos1[5] = date("Y-m-d",strtotime ( '+5 day' , strtotime ($fecha_ini)));
			$datos1[6] = date("Y-m-d",strtotime ( '+6 day' , strtotime ($fecha_ini)));

            echo '
           		<table cellspacing="20" align="center" width="40%">
                <tr>  
                    <td colspan=4><h2 class="latoTextdos text-center">Datos para elaboración de Grafico</h2>
                    </td>
		        </tr>
                <tr>
                  	<td class="latoCont">Dia</td>
                   	<td class="latoCont">Activada</td>
                   	<td class="latoCont">Desactivada</td>
                  	<td class="latoCont">Disparada</td>
                </tr>

                   <tr>
                	<td class="latoCont">'.$datos1[0].'</td>
                  	<td class="latoCont">'.$alarma[0].'</td>
                  	<td class="latoCont">'.$alarma[1].'</td>
                  	<td class="latoCont">'.$disparo[0].'</td>
                </tr>

                 <tr>
                	<td class="latoCont">'.$datos1[1].'</td>
                  	<td class="latoCont">'.$alarma[2].'</td>
                  	<td class="latoCont">'.$alarma[3].'</td>
                  	<td class="latoCont">'.$disparo[1].'</td>
                </tr>

                <tr>
                	<td class="latoCont">'.$datos1[2].'</td>
                  	<td class="latoCont">'.$alarma[4].'</td>
                  	<td class="latoCont">'.$alarma[5].'</td>
                  	<td class="latoCont">'.$disparo[2].'</td>
                </tr>

                <tr>
                	<td class="latoCont">'.$datos1[3].'</td>
                  	<td class="latoCont">'.$alarma[6].'</td>
                  	<td class="latoCont">'.$alarma[7].'</td>
                  	<td class="latoCont">'.$disparo[3].'</td>
                </tr>

                <tr>
                	<td class="latoCont">'.$datos1[4].'</td>
                  	<td class="latoCont">'.$alarma[8].'</td>
                  	<td class="latoCont">'.$alarma[9].'</td>
                  	<td class="latoCont">'.$disparo[4].'</td>
                </tr>

                <tr>
                	<td class="latoCont">'.$datos1[5].'</td>
                  	<td class="latoCont">'.$alarma[10].'</td>
                  	<td class="latoCont">'.$alarma[11].'</td>
                  	<td class="latoCont">'.$disparo[5].'</td>
                </tr>

                <tr>
                	<td class="latoCont">'.$datos1[6].'</td>
                  	<td class="latoCont">'.$alarma[12].'</td>
                  	<td class="latoCont">'.$alarma[13].'</td>
                  	<td class="latoCont">'.$disparo[6].'</td>
                </tr>
                </table>';

    

	include("GoogChart.class.php");
	$chart = new GoogChart( );
	$color = array ( '#95b645', '#7498e9', '#F19999',);
	$dataMultiple = array(

		'Activada' => array(
		$datos1[0] => $alarma[0],
		$datos1[1] => $alarma[2],
		$datos1[2] => $alarma[4],
		$datos1[3] => $alarma[6], 
		$datos1[4] => $alarma[8],
		$datos1[5] => $alarma[10],
		$datos1[6] => $alarma[12],
		),
		'Desactivada' => array(
		$datos1[0] => $alarma[1],
		$datos1[1] => $alarma[3],
		$datos1[2] => $alarma[5],
		$datos1[3] => $alarma[7],
		$datos1[4] => $alarma[9],
		$datos1[5] => $alarma[11],
		$datos1[6] => $alarma[13],
		),
		'Disparada' => array(
		$datos1[0] => $disparo[0],
		$datos1[1] => $disparo[1],
		$datos1[2] => $disparo[2],
		$datos1[3] => $disparo[3],
		$datos1[4] => $disparo[4],
		$datos1[5] => $disparo[5],
		$datos1[6] => $disparo[6],
		),
		);
	echo "<BR>";
	$chart->setChartAttrs( array(
	'type' => 'bar-vertical',
	'title' => 'ALARMA',
	'data' => $dataMultiple,
	'size' => array( 850, 350 ),
	'color' => $color,
	'labelsXY' => true,
));
echo $chart;

 		echo '                 
        <table width=670 border=0  align=center> 
           <tr>
          		<td align="center" ><form action="reporte_circular.php" method=POST><input class="botonInto lato" type=submit value="Otro Reporte" name="Enviar2"></form></td>';
            	if ($_SESSION["tipo"]== "Administrador")
	 			{	
				echo'<td align="center" ><form action="configuracion.php" method=POST><input class="botonInto lato" type=submit value="Volver al Menu" name="Enviar3"></form></td>';
				}
				else {
					if ($_SESSION["tipo"]== "Consulta")
				echo'<td align="center" ><form action="reportes.php" method=POST><input class="botonInto lato" type=submit value="Volver al Menu" name="Enviar3"></form></td>';
				}
            echo '</tr>
        </table>';
}
                           
	         } 
	     }
else	{
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
	     <h3 class="latoContenido text-center">Introduzca la fecha a partir de la cual se contara una semana para ver el reporte de los estados de la alarma</h3>
		 <table cellspacing="20" align="center" width="40%">
		
			<tr>
				<td class="latoCont">Fecha inicial</a></td>
				<td><input type=date name="fecha_ini" class="inputContacto" required value=""></input></td>
			</tr>
			<tr>
				<td class="teamIndex"><input type=hidden value="1" name="enviado"><button class="botonInto lato" type="submit" name="envia">Ver gráfico</button></td>

			</tr>
      </table>
      	<?php
			}
			else
         	{
	            $enviado = $_POST["enviado"];
	            $fecha_ini = $_POST["fecha_ini"];
	            $placa = $_POST["plac"];
	            if ($enviado == 1)
             {
             	$mysqli = new mysqli($host, $user, $pw, $db);
			    $sql1 = "SELECT * from alarma where fecha = '$fecha_ini' and placa = '$placa' order by id_estado";
			    $sql2 = "SELECT * from alarma where fecha =DATE_ADD('$fecha_ini', INTERVAL 1 DAY) and placa = '$placa' order by id_estado";
			    $sql3 = "SELECT * from alarma where fecha =DATE_ADD('$fecha_ini', INTERVAL 2 DAY) and placa = '$placa' order by id_estado";
				$sql4 = "SELECT * from alarma where fecha =DATE_ADD('$fecha_ini', INTERVAL 3 DAY) and placa = '$placa' order by id_estado";
				$sql5 = "SELECT * from alarma where fecha =DATE_ADD('$fecha_ini', INTERVAL 4 DAY) and placa = '$placa' order by id_estado";
		        $sql6 = "SELECT * from alarma where fecha =DATE_ADD('$fecha_ini', INTERVAL 5 DAY) and placa = '$placa' order by id_estado";
				$sql7 = "SELECT * from alarma where fecha =DATE_ADD('$fecha_ini', INTERVAL 6 DAY) and placa = '$placa' order by id_estado";
					//echo "sql es...".$sql;
					$result1 = $mysqli->query($sql1);
					$result2 = $mysqli->query($sql2);
					$result3 = $mysqli->query($sql3);
					$result4 = $mysqli->query($sql4);
					$result5 = $mysqli->query($sql5);
					$result6 = $mysqli->query($sql6);
					$result7 = $mysqli->query($sql7);
			    $sql11 = "SELECT * from eventos where fecha ='$fecha_ini' and placa = '$placa' order by id_evento";
			    $sql12 = "SELECT * from eventos where fecha =DATE_ADD('$fecha_ini', INTERVAL 1 DAY) and placa = '$placa' order by id_evento";
			    $sql13 = "SELECT * from eventos where fecha =DATE_ADD('$fecha_ini', INTERVAL 2 DAY) and placa = '$placa' order by id_evento";
				$sql14 = "SELECT * from eventos where fecha =DATE_ADD('$fecha_ini', INTERVAL 3 DAY) and placa = '$placa' order by id_evento";
				$sql15 = "SELECT * from eventos where fecha =DATE_ADD('$fecha_ini', INTERVAL 4 DAY) and placa = '$placa' order by id_evento";
		        $sql16 = "SELECT * from eventos where fecha =DATE_ADD('$fecha_ini', INTERVAL 5 DAY) and placa = '$placa' order by id_evento";
				$sql17 = "SELECT * from eventos where fecha =DATE_ADD('$fecha_ini', INTERVAL 6 DAY) and placa = '$placa' order by id_evento";
					//echo "sql es...".$sql;
					$result11 = $mysqli->query($sql11);
					$result12 = $mysqli->query($sql12);
					$result13 = $mysqli->query($sql13);
					$result14 = $mysqli->query($sql14);
					$result15 = $mysqli->query($sql15);
					$result16 = $mysqli->query($sql16);
					$result17 = $mysqli->query($sql17);
			     
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
            }

             $disparo[0]=0;
            while($row11 = $result11->fetch_array(MYSQLI_NUM))
            {
	            $estado_disparo = $row11[1];
	            	if($estado_disparo == "disparada")
	            		$estado3 = "Disparada";
	            		$disparo[0] = $disparo[0] +1;
	            $origen_disparo = $row11[2];
	            $fecha_disparo = $row11[3];
	            $hora_disparo = $row11[4];             
            }

 			$alarma[2]=0;
            $alarma[3]=0;
            while($row2 = $result2->fetch_array(MYSQLI_NUM))
            {
	            $estado_alarma = $row2[1];
                    if ($estado_alarma == "activada")
                    	$alarma[2] = $alarma[2] +1;
                    $estado1 = "Activada";
                    if ($estado_alarma == "desactivada")                    	
                    	$alarma[3] = $alarma[3] +1;
                    $estado2 = "Desactivada";
	            $origen_alarma = $row2[2];
	            $fecha_alarma = $row2[3];
	            $hora_alarma = $row2[4];                  
            }

            $disparo[1]=0;
            while($row12 = $result12->fetch_array(MYSQLI_NUM))
            {
	            $estado_disparo = $row12[1];
	            	if($estado_disparo == "disparada")
	            		$estado3 = "Disparada";
	            		$disparo[1] = $disparo[1] +1;
	            $origen_disparo = $row12[2];
	            $fecha_disparo = $row12[3];
	            $hora_disparo = $row12[4];             
            }

            $alarma[4]=0;
            $alarma[5]=0;
            while($row3 = $result3->fetch_array(MYSQLI_NUM))
            {
	            $estado_alarma = $row3[1];
                    if ($estado_alarma == "activada")
                    	$alarma[4] = $alarma[4] +1;
                    $estado1 = "Activada";
                    if ($estado_alarma == "desactivada")                    	
                    	$alarma[5] = $alarma[5] +1;
                    $estado2 = "Desactivada";
	            $origen_alarma = $row3[2];
	            $fecha_alarma = $row3[3];
	            $hora_alarma = $row3[4];                  
            }

             $disparo[2]=0;
            while($row13 = $result13->fetch_array(MYSQLI_NUM))
            {

	            $estado_disparo = $row13[1];
	            	if($estado_disparo == "disparada")
	            		$disparo[2] = $disparo[2] +1;
	            		$estado3 = "Disparada";
	            $origen_disparo = $row13[2];
	            $fecha_disparo = $row13[3];
	            $hora_disparo = $row13[4];             
            }


            $alarma[6]=0;
            $alarma[7]=0;
            while($row4 = $result4->fetch_array(MYSQLI_NUM))
            {
	            $estado_alarma = $row4[1];
                    if ($estado_alarma == "activada")
                    	$alarma[6] = $alarma[6] +1;
                    $estado1 = "Activada";
                    if ($estado_alarma == "desactivada")                    	
                    	$alarma[7] = $alarma[7] +1;
                    $estado2 = "Desactivada";
	            $origen_alarma = $row4[2];
	            $fecha_alarma = $row4[3];
	            $hora_alarma = $row4[4];                  
            }

             $disparo[3]=0;
            while($row14 = $result14->fetch_array(MYSQLI_NUM))
            {

	            $estado_disparo = $row14[1];
	            	if($estado_disparo == "disparada")
	            		$estado3 = "Disparada";
	            		$disparo[3] = $disparo[3] +1;
	            $origen_disparo = $row14[2];
	            $fecha_disparo = $row14[3];
	            $hora_disparo = $row14[4];             
            }


            $alarma[8]=0;
            $alarma[9]=0;
            while($row5 = $result5->fetch_array(MYSQLI_NUM))
            {
	            $estado_alarma = $row5[1];
                    if ($estado_alarma == "activada")
                    	$alarma[8] = $alarma[8] +1;
                    $estado1 = "Activada";
                    if ($estado_alarma == "desactivada")                    	
                    	$alarma[9] = $alarma[9] +1;
                    $estado2 = "Desactivada";
	            $origen_alarma = $row5[2];
	            $fecha_alarma = $row5[3];
	            $hora_alarma = $row5[4];                  
            }

             $disparo[4]=0;
            while($row15 = $result15->fetch_array(MYSQLI_NUM))
            {

	            $estado_disparo = $row15[1];
	            	if($estado_disparo == "disparada")
	            		$estado3 = "Disparada";
	            		$disparo[4] = $disparo[4] +1;
	            $origen_disparo = $row15[2];
	            $fecha_disparo = $row15[3];
	            $hora_disparo = $row15[4];             
            }

            $alarma[10]=0;
            $alarma[11]=0;
            while($row6 = $result6->fetch_array(MYSQLI_NUM))
            {
	            $estado_alarma = $row6[1];
                    if ($estado_alarma == "activada")
                    	$alarma[10] = $alarma[10] +1;
                    $estado1 = "Activada";
                    if ($estado_alarma == "desactivada")                    	
                    	$alarma[11] = $alarma[11] +1;
                    $estado2 = "Desactivada";
	            $origen_alarma = $row6[2];
	            $fecha_alarma = $row6[3];
	            $hora_alarma = $row6[4];                  
            }

             $disparo[5]=0;
            while($row16 = $result16->fetch_array(MYSQLI_NUM))
            {

	            $estado_disparo = $row16[1];
	            	if($estado_disparo == "disparada")
	            		$estado3 = "Disparada";
	            		$disparo[5] = $disparo[5] +1;
	            $origen_disparo = $row16[2];
	            $fecha_disparo = $row16[3];
	            $hora_disparo = $row16[4];             
            }

            $alarma[12]=0;
            $alarma[13]=0;
            while($row7 = $result7->fetch_array(MYSQLI_NUM))
            {
	            $estado_alarma = $row7[1];
                    if ($estado_alarma == "activada")
                    	$alarma[12] = $alarma[12] +1;
                    $estado1 = "Activada";
                    if ($estado_alarma == "desactivada")                    	
                    	$alarma[13] = $alarma[13] +1;
                    $estado2 = "Desactivada";
	            $origen_alarma = $row7[2];
	            $fecha_alarma = $row7[3];
	            $hora_alarma = $row7[4];                  
            }

             $disparo[6]=0;
            while($row17 = $result17->fetch_array(MYSQLI_NUM))
            {

	            $estado_disparo = $row17[1];
	            	if($estado_disparo == "disparada")
	            		$estado3 = "Disparada";
	            		$disparo[6] = $disparo[6] +1;
	            $origen_disparo = $row17[2];
	            $fecha_disparo = $row17[3];
	            $hora_disparo = $row17[4];             
            }

            $datos1[0] = $fecha_ini;
			$datos1[1] = date("Y-m-d",strtotime ( '+1 day' , strtotime ($fecha_ini)));
			$datos1[2] = date("Y-m-d",strtotime ( '+2 day' , strtotime ($fecha_ini)));
			$datos1[3] = date("Y-m-d",strtotime ( '+3 day' , strtotime ($fecha_ini)));
			$datos1[4] = date("Y-m-d",strtotime ( '+4 day' , strtotime ($fecha_ini)));
			$datos1[5] = date("Y-m-d",strtotime ( '+5 day' , strtotime ($fecha_ini)));
			$datos1[6] = date("Y-m-d",strtotime ( '+6 day' , strtotime ($fecha_ini)));

            echo '
           		<table cellspacing="20" align="center" width="40%">
                <tr>  
                    <td colspan=4><h2 class="latoTextdos text-center">Datos para elaboración de Grafico</h2>
                    </td>
		        </tr>
                <tr>
                  	<td class="latoCont">Dia</td>
                   	<td class="latoCont">Activada</td>
                   	<td class="latoCont">Desactivada</td>
                  	<td class="latoCont">Disparada</td>
                </tr>

                   <tr>
                	<td class="latoCont">'.$datos1[0].'</td>
                  	<td class="latoCont">'.$alarma[0].'</td>
                  	<td class="latoCont">'.$alarma[1].'</td>
                  	<td class="latoCont">'.$disparo[0].'</td>
                </tr>

                 <tr>
                	<td class="latoCont">'.$datos1[1].'</td>
                  	<td class="latoCont">'.$alarma[2].'</td>
                  	<td class="latoCont">'.$alarma[3].'</td>
                  	<td class="latoCont">'.$disparo[1].'</td>
                </tr>

                <tr>
                	<td class="latoCont">'.$datos1[2].'</td>
                  	<td class="latoCont">'.$alarma[4].'</td>
                  	<td class="latoCont">'.$alarma[5].'</td>
                  	<td class="latoCont">'.$disparo[2].'</td>
                </tr>

                <tr>
                	<td class="latoCont">'.$datos1[3].'</td>
                  	<td class="latoCont">'.$alarma[6].'</td>
                  	<td class="latoCont">'.$alarma[7].'</td>
                  	<td class="latoCont">'.$disparo[3].'</td>
                </tr>

                <tr>
                	<td class="latoCont">'.$datos1[4].'</td>
                  	<td class="latoCont">'.$alarma[8].'</td>
                  	<td class="latoCont">'.$alarma[9].'</td>
                  	<td class="latoCont">'.$disparo[4].'</td>
                </tr>

                <tr>
                	<td class="latoCont">'.$datos1[5].'</td>
                  	<td class="latoCont">'.$alarma[10].'</td>
                  	<td class="latoCont">'.$alarma[11].'</td>
                  	<td class="latoCont">'.$disparo[5].'</td>
                </tr>

                <tr>
                	<td class="latoCont">'.$datos1[6].'</td>
                  	<td class="latoCont">'.$alarma[12].'</td>
                  	<td class="latoCont">'.$alarma[13].'</td>
                  	<td class="latoCont">'.$disparo[6].'</td>
                </tr>
                </table>';

    

	include("GoogChart.class.php");
	$chart = new GoogChart( );
	$color = array ( '#95b645', '#7498e9', '#F19999',);
	$dataMultiple = array(

		'Activada' => array(
		$datos1[0] => $alarma[0],
		$datos1[1] => $alarma[2],
		$datos1[2] => $alarma[4],
		$datos1[3] => $alarma[6], 
		$datos1[4] => $alarma[8],
		$datos1[5] => $alarma[10],
		$datos1[6] => $alarma[12],
		),
		'Desactivada' => array(
		$datos1[0] => $alarma[1],
		$datos1[1] => $alarma[3],
		$datos1[2] => $alarma[5],
		$datos1[3] => $alarma[7],
		$datos1[4] => $alarma[9],
		$datos1[5] => $alarma[11],
		$datos1[6] => $alarma[13],
		),
		'Disparada' => array(
		$datos1[0] => $disparo[0],
		$datos1[1] => $disparo[1],
		$datos1[2] => $disparo[2],
		$datos1[3] => $disparo[3],
		$datos1[4] => $disparo[4],
		$datos1[5] => $disparo[5],
		$datos1[6] => $disparo[6],
		),
		);
	echo "<BR>";
	$chart->setChartAttrs( array(
	'type' => 'bar-vertical',
	'title' => 'ALARMA',
	'data' => $dataMultiple,
	'size' => array( 850, 350 ),
	'color' => $color,
	'labelsXY' => true,
));
echo $chart;

 		echo '                 
        <table width=670 border=0  align=center> 
           <tr>
          		<td align="center" ><form action="reporte_circular.php" method=POST><input class="botonInto lato" type=submit value="Otro Reporte" name="Enviar2"></form></td>';
            	if ($_SESSION["tipo"]== "Administrador")
	 			{	
				echo'<td align="center" ><form action="configuracion.php" method=POST><input class="botonInto lato" type=submit value="Volver al Menu" name="Enviar3"></form></td>';
				}
				else {
					if ($_SESSION["tipo"]== "Consulta")
				echo'<td align="center" ><form action="reportes.php" method=POST><input class="botonInto lato" type=submit value="Volver al Menu" name="Enviar3"></form></td>';
				}
            echo '</tr>
        </table>';
}
               }            
	         } 
	     }
	     ?>
	  
		
			</p>
	</div>
	</div>
</body>
</html>
              