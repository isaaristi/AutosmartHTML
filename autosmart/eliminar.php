<?php

    session_start();

    $login = $_SESSION['logged'];

	include ("conexion.php");

			$identificacion = $_POST["enviar"];

            
                $mysqli = new mysqli($host, $user, $pw, $db);
                //$con = mysql_connect($host,$user,$pw,$db);
    			$sql = "DELETE FROM usuario WHERE identificacion='$identificacion'"; 
                $result1 = $mysqli->query($sql);
                //$result = mysql_query($sql);
                         header("location: eliminar_usuario.php");

?>