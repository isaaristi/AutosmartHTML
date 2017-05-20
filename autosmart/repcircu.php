<?php
	session_start();
	include "conexion.php";
  include("circular.php");
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
	<title>Smart Automobile-Reporte Circular</title>
</head>
	
<body class="paginaImg">
	<header id="header">
		<table cellspacing="5">
			<tr>
				<td><img src="imgs/car.png" class="imgIndex" /></td>
				<td><h3 class="tituloIndex lobster">Smart Automobile</h3></td>
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
				<td class="cerrarIndex"><a href="index.php" class="botonIn lato">Página principal<input type=image src="icons/web.png" align="center"></a></td>
				
			</tr>
		</table>
	</header>
  <form action="reporte_circular.php" method="POST">
	<div class="textPagina text-center lato">
	<div class="text-center">
	<p class="latoCont">
	<h1 class="contTeam">Reporte Circular</h1><BR>
	
    <?php
      if (!(isset($_POST["enviado"])))
            {
    ?>
    <h3 class="latoContenido text-center">Introduzca las fechas en las cuales quisiera ver el reporte de los estados de la alarma</h3>
		  <table cellspacing="20" align="center" width="40%">
		
			<tr>
				<td class="latoCont">Fecha inicial</a></td>
				<td><input type=date name="fecha_ini" class="inputContacto" required value=""></input></td>
			</tr>
			<tr>
				<td class="latoCont">Fecha final</a></td>
				<td><input type=date name="fecha_fin" class="inputContacto" required value=""></input></td>
			</tr>
			<tr>
				<td colspan="2"  class="teamIndex"><input type=hidden value="1" name="enviado"><button class="botonIn lato" type="submit" name="envia">Ver gráfico</button></td>

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
			      $sql = "SELECT * from alarma where fecha >='$fecha_ini' and fecha<= '$fecha_fin' order by id_estado";
			      $result1 = $mysqli->query($sql);
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

              // A continuación se despliegan todos los datos. 
              $cant_luz[0]=0;
              $cant_luz[1]=0;
              while($row1 = $result1->fetch_array(MYSQLI_NUM))
                  {
                    $esta  = $row1[1];
                    if ($esta == "activada")
                        $estado = "Acivada";
                    	$cant_luz[0] = $cant_luz[0] +1;
                    if ($esta == "desactivada")
                        $estado = "Desactivada";
                    	$cant_luz[1] = $cant_luz[1] +1;
                    $origen  = $row1[2];
                    $fecha = $row1[3];
                    $hora  = $row1[4];
                
                echo ' 
                <tr>
                	<td class="latoCont">'.$esta.'</td>
                  	<td class="latoCont">'.$origen.'</td>
                  	<td class="latoCont">'.$fecha.'</td>
                  	<td class="latoCont">'.$hora.'</td>
                </tr>';
                }
              
               //echo "cant 0...".$cant_luz[0]."cant 1...".$cant_luz[1]."cant 2...".$cant_luz[2];
                 
               echo '
               	</table>
              	<table width=670 border=0  align=center>
                 	<tr>
                  		<td align="center"  colspan=2 class="">&nbsp;&nbsp;&nbsp;';
                   

                 // Asigna ahora los datos para graficar y envia solicitud de graficacion.
                 
                 
                 // El vector cant_luz ya tiene valores almacenados
                 // Se le asignan valores al vector nombre luz
                 
                 $alarma[0] = "Alarma Encendida";
                 $alarma[1] = "Alarma apagada";
                
                 $titulo_grafica = "Estadística de los estados de la alarma";

                 $nombre_imagen = grafica_circ($cant_luz,$alarma,"Cant_encendidos","nombre_luces",$titulo_grafica);

                 echo "<center><img src=reports_graph/".$nombre_imagen.">

                  		</td>
                 	</tr>";
                  
                // Ahora se despliega el fin de la tabla 
                echo '                 
                  
                   <tr>
                   <td align="center" ><form action="reporte_circular.php" method=POST><input class="botonIn lato" type=submit value="Otro Reporte" name="Enviar2"></form></td>
                   <td align="center" ><form action="configuracion.php" method=POST><input class="botonIn lato" type=submit value="Volver al Menu" name="Enviar3"></form></td>
                 </tr>
              </table>';
            }         // fin else enviado = 1
            
	         }  // fin else (mostrar datos consultados)
		?>
		
			</p>
	</div>
	</div>
</body>
</html>
<?php
 
?>