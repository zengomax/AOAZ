<?php

//php para eliminar la deuda y generar movimiento mediante el id recibido

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$id = $_POST['iddeuda'];



include ("conexion.php");

$conexion=connectDataBase();

// hacemos select para obtener el metalbin y ponerlo disponible

 $resultado= mysqli_query($conexion,"SELECT * FROM deudas WHERE iddeuda ='$id'");

$imprimir= mysqli_fetch_array($resultado);
$motivo="PAY OF ".$imprimir['motivo'];
$fecha=date('Y-m-d');
$euros=$imprimir['eurosdeuda'];
//eliminamos la deuda
$sql= "DELETE  FROM deudas WHERE iddeuda ='$id'";
$ejecutar= mysqli_query($conexion,$sql) or die(mysqli_error($conexion)); //eliminamos la deuda mediante el id que obtiene con post



	if(!$ejecutar){

			echo 'ERROR';		   
		}else{ 
				


		$insert="INSERT INTO  movimiento VALUES ('','$motivo','$fecha','$euros') ";
		$insert= mysqli_query($conexion,$insert) or die(mysqli_error($conexion)); //Creamos un movimiento con los datos de la deuda
		if($insert){


				 $bolsa= mysqli_query($conexion,"SELECT * FROM bolsa");//hacemos select para saber el dinero que hay en la bolsa
				 $imprimir= mysqli_fetch_array($bolsa);
				 $total=$imprimir['eurostotales'] + $euros;
				 
				 $update="UPDATE bolsa SET eurostotales = '$total'";
				 $update= mysqli_query($conexion,$update) or die(mysqli_error($conexion));  //añadimos el dinero cobrado al saldo que hay en bolsa
				 if($update){

						echo"Paid succesfully";

						$_SESSION['motivodeuda']=$_POST['motivo']; //creamos dos variables de sesion para autogenerar el ticket de pago
						$_SESSION['eurodeuda']=$_POST['euro'];
						



				 }else{
						echo "Error";

						}

		} else{
			echo "Error";

		}
		

			}

	

  ?>