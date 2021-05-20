<?php


$idusuario = $_POST['dni'];
$estado = $_POST['estado'];



include ("conexion.php");

$conexion=connectDataBase();


if($estado=='ACTIVO'){



//bloqueamos usuario
$sql= "UPDATE usuario SET estado = 'BLOQUEADO' WHERE dni='$idusuario'";
$ejecutar= mysqli_query($conexion,$sql) or die(mysqli_error($conexion));



	if(!$ejecutar){

			echo 'ERROR';		   
		}else{ 

				echo "Blocked successfully";

			}

}else{	

//desbloqueamos usuario
  $sql= "UPDATE usuario SET estado = 'ACTIVO' WHERE dni='$idusuario'";
$ejecutar= mysqli_query($conexion,$sql) or die(mysqli_error($conexion));



	if(!$ejecutar){

			echo 'ERROR';		   
		}else{ 

				echo "Unblocked successfully";

			}

	
}
  ?>
