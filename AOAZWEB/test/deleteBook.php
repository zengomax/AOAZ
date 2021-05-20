<?php


$idreserva = $_POST['id'];



include ("conexion.php");

$conexion=connectDataBase();


// hacemos select para obtener el metalbin y ponerlo disponible

 $resultado= mysqli_query($conexion,"SELECT * FROM reserva WHERE idreserva ='$idreserva'");
$imprimir= mysqli_fetch_array($resultado);
$metalbin= $imprimir['idmetal'];


//eliminamos la reserva
$sql= "DELETE  FROM reserva WHERE idreserva='$idreserva'";
$ejecutar= mysqli_query($conexion,$sql) or die(mysqli_error($conexion));



	if(!$ejecutar){

			echo 'ERROR';		   
		}else{ 

	//Actualizamos la reserva
		$update="UPDATE metalbins SET estado='DISPONIBLE' WHERE idmetal='$metalbin'AND tipo!='MY OWN' ";
		$update= mysqli_query($conexion,$update) or die(mysqli_error($conexion));
		if($update){
				 echo"Cancelled succesfully";
		} else{
			echo "Error";

		}

			}

	

  ?>

  	