
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 	

    <link rel="stylesheet" href="reserva.css" ></link>

<?php 

include ("conexion.php");
$conexion=connectDataBase();

session_start();

$estado=$_GET['estado'];
$dni=$_SESSION['dni'];

if($estado=="PENDIENTE"){  //SI LA RESERVA ESTA PENDIENTE CARGA LA TABLA CON BOTONES

?>
<div class="container">

  <h5 class="display-6"> My Pending Books</h5>
 <table class="table table-bordered">
      <tr>
        <th>ID Book</th>
        <th>Date</th>
        <th>MetalBin Kind</th>
        <th>Finalize</th>
        <th>Cancel</th>

      </tr>

<?php
$resultado= mysqli_query($conexion,"SELECT * FROM reserva inner join metalbins on reserva.idmetal = metalbins.idmetal WHERE dni ='$dni' AND reserva.estado ='PENDIENTE'")or die(mysqli_error($conexion));
while($imprimir=mysqli_fetch_array($resultado)){

?>      <tr>
        <td id="id" data-id_prueba="<?php echo $imprimir['0'] ?>" ><?php echo $imprimir['0'] ?></td>
        <td id="fecha"><?php echo $imprimir['fechainicio'] ?></td>
        <td><?php echo $imprimir['tipo'] ?></td>
        <td><button type="button" data-id="<?php echo $imprimir['0'] ?>" id="finalizar" class="btn btn-warning">Finalize</button></td>
        <td><button type="button" data-id="<?php echo $imprimir['0'] ?>" data-fecha="<?php echo $imprimir['fechainicio'] ?>" id="eliminar" class="btn btn-danger">Cancel</button></td>

        


      </tr>
  <?php } ?>
  </table>

  <br><br><br>
</div>

<?php 
}
?>


<?php 
if($estado=="FINALIZADA"){


?>
<div class="container">
    <h5 class="display-6"> My Completed Books</h5>

 <table class="table table-bordered">
      <tr>
        <th>ID Book</th>
        <th>Date</th>
        <th>MetalBin Kind</th>
        <th>Kilos</th>

      </tr>

<?php

$resultado= mysqli_query($conexion,"SELECT * FROM reserva inner join metalbins on reserva.idmetal = metalbins.idmetal WHERE dni ='$dni' AND reserva.estado ='FINALIZADA'")or die(mysqli_error($conexion));

while($imprimir=mysqli_fetch_array($resultado)){

?>
   
      <tr>
        <td id="id" data-id_prueba="<?php echo $imprimir['0'] ?>" ><?php echo $imprimir['0'] ?></td>
        <td id="fecha"><?php echo $imprimir['fechainicio'] ?></td>
        <td><?php echo $imprimir['tipo'] ?></td>
        <td><?php echo $imprimir['kilos'] ?></td>   
      </tr>


  <?php } ?>
  </table>

  <br><br><br>
</div>
<?php 
}
 ?>

