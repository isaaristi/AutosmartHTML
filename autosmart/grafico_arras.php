<?php
require_once ('jpgraph/jpgraph.php');

require_once ('jpgraph/jpgraph_bar.php');

include "conexion.php";
$mysqli = new mysqli($host, $user, $pw, $db);
$sql="SELECT * FROM alarma ";

$result1 = $mysqli->query($sql);
//$res=mysql_query($sql);
while($row=mysqli_fetch_array($result1))
{
	$datos = $row[1];
	$labels = $row['id_estado'];
}

$grafico = new Graph(500, 400, 'auto');
$grafico->SetScale("textlin");
#$grafico->img->SetMargin(40, 20, 20, 40);
$grafico->title->Set("Gráfico de barras");
$grafico->xaxis->title->Set("Altura" );
$grafico->yaxis->title->Set("Total" ) ;

$barplot1 =new BarPlot($datos);

$barplot1->SetColor("red");
$barplot1->SetWidth(30);

$grafico->Add($barplot1);

$grafico->$Stroke();

?>