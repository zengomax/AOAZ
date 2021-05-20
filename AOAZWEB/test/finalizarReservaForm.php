
<head>
  		<link rel="shortcut icon" type="image/x-icon" href="img/ico.png" />

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
		
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		
		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		
		<!-- Latest compiled JavaScript  -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="reserva.css" ></link>


		<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

<!-- 
    RTL version
-->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.rtl.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.rtl.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css"/>


</head>
<div>
    <h5 class="display-6"> Finalice Book
	   </h5>

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
<label id="reserva"data-id_book="<?php echo $imprimir['idreserva'] ?>">IdBook:  <?php echo $imprimir['idreserva'] ?></label><br>
<label>Fecha:  <?php echo $imprimir['fechainicio'] ?></label><br>
<label>MetalBin Kind:  <?php echo $imprimir['tipo'] ?></label><br><br>

<?php
if(!isset($_POST['kilos'])){

echo "<label>Pease insert the amount of generated honey(Kilo):<input type='number'  id='kilos' required></label><br>";
echo "<input type='submit' id='terminar' value='FINALIZE' class='btn btn-warning'>";

}else{
$kilos=$_POST['kilos'];
echo "<label>Kilos: $kilos </label>";

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


						echo "<p style='color:green'> The booking has been completed successfully, you don't have a debt.</p>";

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

			echo "<p style='color:green'> The booking has been completed successfully, you have a new debt.</p>";
		}

		}
	}


 ?>
</div>
 <br>


