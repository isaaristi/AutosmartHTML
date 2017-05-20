<?php

 // Se incluyen las clases para el manejo de graficas
 
 include("clases/pchart/pChart/pData.class");
 include("clases/pchart/pChart/pChart.class");

function grafica_barras($datos1,$datos2,$datos3,$datos4,$nombre_datos1, $nombre_datos2, $nombre_datos3, $nombre_datos4, $titulo_grafica)
{

                $DataSet = new pData;
               // Despues de array, van organizados cada uno de los datos que se desean graficar, inicialmente los valores
               // Al final se coloca el nombre de la serie
               
                $DataSet->AddPoint($datos1,$nombre_datos1);
                
                $DataSet->AddPoint($datos2,$nombre_datos2);
        
			$DataSet->AddPoint($datos3,$nombre_datos3);        
                
			$DataSet->AddPoint($datos4,$nombre_datos4);        
                
			// Se adicionan las series respectivas a las barras
                $DataSet->AddSerie($nombre_datos1);
                $DataSet->AddSerie($nombre_datos2);
                // Se define la serie que sera los titulos del eje X.
			$DataSet->AddSerie($nombre_datos3);
                                
			$DataSet->SetAbsciseLabelSerie($nombre_datos4);
                

               // Inicializa la Grafica
               // Los dos parametros que tiene la siguiente funcion son para definir el tamano del objeto Pchart, que va
               // a contener la grafica, son el ancho y el alto. Si se quiere aun mas grande, se deben incrementar.

                $Test = new pChart(880,480);
                // Los parametros de la siguiente funcion definen la fuente y su tamano.
                $Test->setFontProperties("clases/pchart/Fonts/tahoma.ttf",12);

                // De los siguientes parametros se debe tener en cuenta que son X1, Y1, X2, Y2 los puntos de inicio y fin de la grafica
                $Test->setGraphArea(50,30,850,450);
                // La siguiente funcion define el rectangulo donde va a estar la grafica
               // Los 4 primeros parametros son la posicion X1,Y1, X2, Y2 del rectangulo
               // Luego sigue el campo RADIUS y finalmente el codigo R G B 240 240 240 es casi blanco.
                $Test->drawFilledRoundedRectangle(7,7,750,450,5,240,240,240);
               // La siguiente funcion define el color y grosor del margen del rectangulo anterior.
               // el 5o campo es el grosor de la linea y los siguientes 3 el RGB.
                $Test->drawRoundedRectangle(5,5,790,440,5,230,230,230);
                // Dibuja el fondo de la grafica con los parametros RGB, 255 255 255 es blanco
                $Test->drawGraphArea(255,255,255,TRUE);
                
                // Dibuja la escala de la grafica, 
                // Tener en cuenta el penultimo parametro para definir el numero de decimales a manejar, en ejemplo 0
                // El tercer parametro es el numero de divisiones
                // 4o, 5o y 6o parametro son el RGB. El ultimo parametro es para dibujar o no un margen.
                // El 7o parametro es para que escriba los nÃºmeros de las divisiones.
                
                $Test->drawScale($DataSet->GetData(),$DataSet->GetDataDescription(),SCALE_START0,150,150,150,TRUE,0,0,TRUE);
                // La siguiente funcion dibuja la grilla, define el grueso de la linea en el primer parametro
                // el 3er,4o y 5o parametros son el codigo RGB 
                $Test->drawGrid(4,TRUE,230,230,230,50);

                // Draw the 0 line
                // Redefine nuevamente para los los siguientes mensajes, las propiedades de la fuente.
                $Test->setFontProperties("clases/pchart/Fonts/tahoma.ttf",8);
                // a Continuacion dibuja el umbral, con 0 parte la barra desde 0.
                // El RGB es para el color de la linea del umbral
                $Test->drawTreshold(0,145,72,52,TRUE,TRUE);

                // Para fijar los colores de las barras se puede hacer individualmente por cada barra
                // El primer parametro es el numero de la serie.
                // Recordar que los otros parametros son R G B , el nivel de los colores basicos red, green, blue
                $Test->setColorPalette(0,0,0,255);
                $Test->setColorPalette(1,255,0,0);
		     $Test->setColorPalette(2,0,255,0);


                // Dibuja la grafica de barras, tiene como parametros los datos.
                $Test->drawBarGraph($DataSet->GetData(),$DataSet->GetDataDescription(),TRUE);

                 // Se define la fuente para el nombre de las barras
                $Test->setFontProperties("clases/pchart/Fonts/tahoma.ttf",12);
                $Test->drawLegend(670,54,$DataSet->GetDataDescription(),255,255,255);
                 // Nuevamente se define la fuente para el ti­tulo
                $Test->setFontProperties("clases/pchart/Fonts/tahoma.ttf",12);
                // Dibuja el titulo, los primeros parametros son la posicion X y Y, luego el titulo y el color.
                $Test->drawTitle(50,22,$titulo_grafica,50,50,50,585);
                
                // Genera el archivo de la imagen,
                $codigo_imagen2 = date("Ymdhis");
                $nombre_imagen2 = "reports".$codigo_imagen2.".png";
                //echo "nombre_imagen2 es...".$nombre_imagen2;
                $directorio_img2 = "reports_graph/".$nombre_imagen2;
                $Test->Render($directorio_img2);

               return $nombre_imagen2;

}
                                                                                               
?>
