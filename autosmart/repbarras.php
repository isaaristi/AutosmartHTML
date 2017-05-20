<?php
	session_start();
	include "conexion.php";
  include("barras.php");
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
	<title>Smart Automobile-Reporte de barras</title>
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
    <h3 class="latoContenido text-center">Introduzca las fechas de la semana en la cual quisiera ver el reporte de los estados de la alarma</h3>
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
             	echo '
             	<table cellspacing="20" align="center" width="40%">
                <tr>  
                    <td colspan=4><h2 class="latoTextdos text-center">Datos para elaboración de Grafico '.$fecha_ini.' - '.$fecha_fin.'</h2>
                    </td>
		        </tr>

		         </table>
               <table width=670 border=0  align=center>
                 <tr>
                  <td align="center" bgcolor="#FEFEFE" colspan=2 class="_espacio_celdas_m">
                      &nbsp;&nbsp;&nbsp;';

                  $datos1[0] = 5;
                  $datos1[1] = 7;
                  $datos1[2] = 8;
                  $datos1[3] = 5;
                  $datos1[4] = 2;
                  $datos1[5] = 9;
                  $datos1[6] = 5;


                  $datos2[0] = 13;
                  $datos2[1] = 6;
                  $datos2[2] = 8;
                  $datos2[3] = 9;
                  $datos2[4] = 4;
                  $datos2[5] = 5;
                  $datos2[6] = 3;

                  $datos4[0] = "LU"; 
                  $datos4[1] = "MA";
                  $datos4[2] = "MI";
                  $datos4[3] = "JU";
                  $datos4[4] = "VI";
                  $datos4[5] = "SA";
                  $datos4[6] = "DO";

                  $nombre_datos1 = "# Alarma activada";
                  $nombre_datos2 = "# Alarma desactivada";
                  $nombre_datos4 = "Dias";
                  $titulo_grafica = "Reporte semanal";

                  $nombre_imagen = grafica_barras($datos1,$datos2,$datos4,$nombre_datos1, $nombre_datos2, $nombre_datos4,$titulo_grafica);

                  echo "<center><img src=reports_graph/".$nombre_imagen.">


                  </td>
                 </tr>";
                  
                // Ahora se despliega el fin de la tabla 
                echo '                 
                   <tr>
                    <td align="center"  class="_espacio_celdas_m">
                      &nbsp;&nbsp;&nbsp;
                    </td>
                    <td align="center"  class="_espacio_celdas_m">
                      &nbsp;&nbsp;&nbsp;
                    </td>
                   </tr>
                   <tr>
                   <td align="center"  class="_espacio_celdas_m">
                     <form action="reporte_barras.php" method=POST>
                       <input class="botonIn lato" type=submit value="Otro Reporte" name="Enviar2">
                     </form>
                    </td>
                   <td align="center"  class="_espacio_celdas_m">
                     <form action="configuracion.php"  method=POST>
                       <input type=submit class="botonIn lato" value="Volver al Menu" name="Enviar3">
                     </form>
                    </td>
                 </tr>
              </table>';
            }         // fin else enviado = 1
            
	         }  // fin else (mostrar datos consultados)
     
 
 }
       else {
     
        if ($_SESSION["tipo"]== "Administrador"){
          if (!(isset($_POST["enviado"])))
        
            {
    ?>
    <form action="disparos.php" method="POST">
    <h3 class="latoContenido text-center">Introduzca la placa del carro que desea consultar</h3>
    <table cellspacing="20" align="center" width="40%">
    
      <tr>
        <td class="latoCont">Placa</a></td>
        <td><input type=text name="plac" class="inputContacto" required value=""></input></td>
      </tr>
      <tr>
        <td class="teamIndex"><input type=hidden value="1" name="enviado"><button class="botonIn lato" type="submit" name="envia">Buscar</button></td>
      </tr>
      </table>

      <?php
      }
      else
          {
              $enviado = $_POST["enviado"];
              $plac = $_POST["plac"];
              ?>
   if (!(isset($_POST["enviado"])))
            {
    ?>
    <h3 class="latoContenido text-center">Introduzca las fechas de la semana en la cual quisiera ver el reporte de los estados de la alarma</h3>
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
              echo '
              <table cellspacing="20" align="center" width="40%">
                <tr>  
                    <td colspan=4><h2 class="latoTextdos text-center">Datos para elaboración de Grafico '.$fecha_ini.' - '.$fecha_fin.'</h2>
                    </td>
            </tr>

             </table>
               <table width=670 border=0  align=center>
                 <tr>
                  <td align="center" bgcolor="#FEFEFE" colspan=2 class="_espacio_celdas_m">
                      &nbsp;&nbsp;&nbsp;';

                  $datos1[0] = 5;
                  $datos1[1] = 7;
                  $datos1[2] = 8;
                  $datos1[3] = 5;
                  $datos1[4] = 2;
                  $datos1[5] = 9;
                  $datos1[6] = 5;


                  $datos2[0] = 13;
                  $datos2[1] = 6;
                  $datos2[2] = 8;
                  $datos2[3] = 9;
                  $datos2[4] = 4;
                  $datos2[5] = 5;
                  $datos2[6] = 3;

                  $datos4[0] = "LU"; 
                  $datos4[1] = "MA";
                  $datos4[2] = "MI";
                  $datos4[3] = "JU";
                  $datos4[4] = "VI";
                  $datos4[5] = "SA";
                  $datos4[6] = "DO";

                  $nombre_datos1 = "# Alarma activada";
                  $nombre_datos2 = "# Alarma desactivada";
                  $nombre_datos4 = "Dias";
                  $titulo_grafica = "Reporte semanal";

                  $nombre_imagen = grafica_barras($datos1,$datos2,$datos4,$nombre_datos1, $nombre_datos2, $nombre_datos4,$titulo_grafica);

                  echo "<center><img src=reports_graph/".$nombre_imagen.">


                  </td>
                 </tr>";
                  
                // Ahora se despliega el fin de la tabla 
                echo '                 
                   <tr>
                    <td align="center"  class="_espacio_celdas_m">
                      &nbsp;&nbsp;&nbsp;
                    </td>
                    <td align="center"  class="_espacio_celdas_m">
                      &nbsp;&nbsp;&nbsp;
                    </td>
                   </tr>
                   <tr>
                   <td align="center"  class="_espacio_celdas_m">
                     <form action="reporte_barras.php" method=POST>
                       <input class="botonIn lato" type=submit value="Otro Reporte" name="Enviar2">
                     </form>
                    </td>
                   <td align="center"  class="_espacio_celdas_m">
                     <form action="configuracion.php"  method=POST>
                       <input type=submit class="botonIn lato" value="Volver al Menu" name="Enviar3">
                     </form>
                    </td>
                 </tr>
              </table>';
            }         // fin else enviado = 1
            
           }  // fin else (mostrar datos consultados)

    }
  }
}
  ?>
  

        		</p>
	</div>
	</div>
</body>
</html>


  