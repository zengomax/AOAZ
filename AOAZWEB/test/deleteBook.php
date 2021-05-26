<?php
//php para eliminar la reserva mediante el id recibido

$idreserva = $_POST['id'];



include ("conexion.php");

$conexion=connectDataBase();


// hacemos select para obtener el metalbin y ponerlo disponible

 $resultado= mysqli_query($conexion,"SELECT * FROM reserva WHERE idreserva ='$idreserva'"); //consulta para ver el metalbin que utiliza la reserva que queremos borrar
$imprimir= mysqli_fetch_array($resultado);
$metalbin= $imprimir['idmetal'];


//eliminamos la reserva
$sql= "DELETE  FROM reserva WHERE idreserva='$idreserva'";
$ejecutar= mysqli_query($conexion,$sql) or die(mysqli_error($conexion)); //borramos la reserva



	if(!$ejecutar){

			echo 'ERROR';		   
		}else{ 

	//Actualizamos la reserva
		$update="UPDATE metalbins SET estado='DISPONIBLE' WHERE idmetal='$metalbin'AND tipo!='MY OWN' "; //ponemos disponible el metalbin
		$update= mysqli_query($conexion,$update) or die(mysqli_error($conexion));
		if($update){
				 echo"Cancelled succesfully";
		} else{
			echo "Error";

		}

			}

	

  ?>

  	