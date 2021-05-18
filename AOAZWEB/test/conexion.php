<?php

$enlace='10.2.197';
function ConnectDataBase()		{

$local=1;		

	if($local==0){		

			if (!($conexion=mysqli_connect("localhost","root","")))
			{
			echo "There is an error connecting the server.";
			exit();
			}
			if (!mysqli_select_db($conexion,"erlete"))
			{
			echo "There is an error selecting the DB.";
			exit();
            }
            
			return $conexion;
		}
		else {
			if (!($conexion=mysqli_connect("localhost","root","dam1")))
			{
			echo "There is an error connecting the server.";
			exit();
			}
			if (!mysqli_select_db($conexion,"erlete"))
			{
			echo "There is an error selecting the DB.";
			exit();
            }
            
			return $conexion;
		}

		}


	



?>