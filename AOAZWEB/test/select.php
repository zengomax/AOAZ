
<?php 


include ("conexion.php");
$conexion=connectDataBase();
$sql= "SELECT * FROM bolsa";
$resultado= mysqli_query($conexion,$sql);

	while($imprimir=mysqli_fetch_array($resultado)){
	echo $imprimir['eurostotales'];		

}

 ?>


