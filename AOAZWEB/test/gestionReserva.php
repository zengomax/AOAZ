
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 	


<div class="container">
 <table class="table table-bordered">
      <tr>
        <th>ID Book</th>
        <th>Date</th>
        <th>MetalBin Kind</th>
        <th>Cancel</th>
        <th>Edit</th>

      </tr>

<?php 

include ("conexion.php");
$conexion=connectDataBase();


$tipo=$_GET['tipo'];

$resultado= mysqli_query($conexion,"SELECT * FROM reserva inner join metalbins on reserva.idmetal = metalbins.idmetal")or die(mysqli_error($conexion));

while($imprimir=mysqli_fetch_array($resultado)){

?>
   
      <tr>
        <td id="id" data-id_prueba="<?php echo $imprimir['0'] ?>" ><?php echo $imprimir['0'] ?></td>
        <td id="fecha"><?php echo $imprimir['fechainicio'] ?></td>
        <td><?php echo $imprimir['tipo'] ?></td>
        <td><button type="button" class="btn btn-warning">Edit</button></td>
        <td><button type="button" data-id="<?php echo $imprimir['0'] ?>" data-fecha="<?php echo $imprimir['fechainicio'] ?>" id="eliminar" class="btn btn-danger">Cancel</button></td>


      </tr>
  <?php } ?>
  </table>

  <br><br><br>
</div>


<script >




</script>