<?php
	include ("conexion.php");

			$enviado = $_POST["enviado"];
            $nombre = $_POST["nombre"];
            $identificacion = $_POST["identificacion"];
            $direccion = $_POST["direccion"];
            $fecha = $_POST["fecha"];
            $telefono = $_POST["telefono"];
            $login = $_POST["usuario"];
           	$pass = crypt($_POST["contrasena"],"2A");
            //$pass = $_POST["contrasena"];
            $tipo_usuario = $_POST["tipo"];

             if ($enviado == 1)
             {
            // Se hace la conexion y posterior registro en la base de datos
  		      $mysqli = new mysqli($host, $user, $pw, $db);
			      $sql = "INSERT INTO usuario (nombre, identificacion, direccion, fecha, telefono, usuario, contrasena, tipo) 
            VALUES ('$nombre','$identificacion','$direccion','$fecha','$telefono','$login','$pass','$tipo_usuario')";
            //echo "sql es...".$sql;
            $result1 = $mysqli->query($sql);

            if ($result1)
                     echo "DATOS ACTUALIZADOS CORRECTAMENTE" ;
                   else   
                     echo "ERROR AL ACTUALIZAR DATOS";
        }

?>