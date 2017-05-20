<?php

    session_start();

    $login = $_SESSION['logged'];

	include ("conexion.php");

			$envi = $_POST["envi"];
            $envia = $_POST["envia"];
            $identi = $_SESSION["identi"];
            $nom = $_POST["nom"];
            $dir = $_POST["dir"];
            $tel = $_POST["tel"];

            if ($envi == 2)
            {
                $mysqli = new mysqli($host, $user, $pw, $db);
                $mysqli->set_charset("utf8");
                //$con = mysql_connect($host,$user,$pw,$db);
    			$sql = "UPDATE usuario SET nombre='$nom',direccion='$dir',telefono='$tel' WHERE identificacion='$identi'"; 
                $result1 = $mysqli->query($sql);
                //$result = mysql_query($sql);
                if($result1 == 1)
                         header("location: cambiar_datos.php?mensaje=1&nom=$nom&dir=$dir&tel=$tel&id=$identi");
                       else   
                         header ("location: cambiar_datos.php?mensaje=2");
            }

?>