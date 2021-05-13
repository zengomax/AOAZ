<?php


$idreserva = $_POST['id'];



include ("conexion.php");

$conexion=connectDataBase();


$sql= "DELETE  FROM reserva WHERE idreserva='$idreserva'";
$ejecutar= mysqli_query($conexion,$sql) or die(mysqli_error($conexion));



	if(!$ejecutar){

			echo 'ERROR';		   
		}else{ 

		 	echo"Datuak Ondo ezabatu dira ";

		
			}

		

  ?>