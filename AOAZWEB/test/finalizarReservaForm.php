
<!--Formulario intermedio para finalizar reserva-->
<html>
<body>
<div>
    <h3 > Finalice Book</h3>

<br>

<?php 
sleep(2);

include ("conexion.php");

$conexion=connectDataBase();

session_start();

// hacemos select para obtener el metalbin los datos de la reserva

$idreserva=$_POST['idreserva'];
$resultado= mysqli_query($conexion,"SELECT * FROM reserva inner join metalbins on reserva.idmetal = metalbins.idmetal WHERE reserva.idreserva='$idreserva'");
$imprimir= mysqli_fetch_array($resultado);
$metalbin= $imprimir['idmetal'];



 ?>
<div class="form-group" style="text-align: left;">
<form>
<label id="reserva"data-id_book="<?php echo $imprimir['idreserva'] ?>"><h4>Book id:  <?php echo $imprimir['idreserva'] ?></h4></label><br>
<label><h4>Date:  <?php echo $imprimir['fechainicio'] ?></h4></label><br>
<label><h4>MetalBin Kind:  <?php echo $imprimir['tipo'] ?></h4></label><br><br>

<?php
if(!isset($_POST['kilos'])){  //solo se mostrara si el usuario no ha intoducido kilos

echo "<label><h5>Please insert the amount of generated honey(Kilo): </h5> <input type='number'  id='kilos' required></label><br>";
echo "<input type='submit' id='terminar' value='FINALIZE' class='btn btn-warning'>";

}else{
$kilos=$_POST['kilos'];
echo "<label><h4>Kilos: $kilos </h4></label>"; //cuando se haya hecho click en finalizar y recoge datos se muestra

}


  ?>
<br>



</form>
</div>
<?php 
//UPDATE DE KILOS MAS GENERAR DEUDA

		if(isset($_POST['kilos'])){
		$idreserva=$_POST['idreserva'];
		$fecha=$imprimir["fechainicio"];
		$euros =$_POST['euros'];
		$motivodeuda="RESERVATION: ".$idreserva. " ON DATE : ".$fecha;
		$dni=$_SESSION['dni'];
		if($_POST['kilos']== 0){
			$idreserva=$_POST['idreserva'];
			$fecha=$imprimir["fechainicio"];

			$sinkilos= mysqli_query($conexion,"UPDATE reserva SET estado='FINALIZADA' WHERE idreserva='$idreserva'")or die(mysqli_error($conexion));
				if($sinkilos){


						echo "<p class='bg-success'> <b>The booking has been completed successfully, you don't have a debt.</b></p>"; //si introducimos 0

				}else{


					echo "error";
				}
				
		}else{
		//Ponemos el metalbin disponible
		$update= mysqli_query($conexion,"UPDATE metalbins SET estado='DISPONIBLE' WHERE idmetal='$metalbin'AND tipo!='MY OWN' ") or die(mysqli_error($conexion));  
		//Finalizamos reserva
		$ejecutar= mysqli_query($conexion,"UPDATE reserva SET kilos='$kilos',estado='FINALIZADA' WHERE idreserva='$idreserva'")or die(mysqli_error($conexion));
		//Generamos deuda
		$insert= mysqli_query($conexion,"INSERT INTO deudas VALUES ('','$motivodeuda','$euros','$dni')")or die(mysqli_error($conexion));



		if(!$ejecutar||!$update||!$insert){

			echo "ERROR";
		}else{

			echo "<p class='bg-success' style='color:black'> <b>The booking has been completed successfully, you can go to the debts page to pay it.</b></p>";
		}

		}
	}


 ?>
</div>
 <br>





</body>
</html>


