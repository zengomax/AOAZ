<?php 

include ("conexion.php");
$conexion=connectDataBase();

session_start();

$estado=$_GET['estado'];
$dni=$_SESSION['dni'];

if($estado=="PENDIENTE"){  //SI LA RESERVA ESTA PENDIENTE CARGA LA TABLA CON BOTONES

?>
<div class="container">

  <h5 class="display-6">Pending Books</h5>
 <table class="table table-bordered">
      <tr>
        <th>ID Book</th>
        <th>Date</th>
        <th>MetalBin Kind</th>
        <th>Name and surname</th>
        <th>Cancel</th>

      </tr>

<?php
$resultado= mysqli_query($conexion,"SELECT * FROM reserva inner join metalbins on reserva.idmetal = metalbins.idmetal inner join usuario on usuario.dni = reserva.dni WHERE  reserva.estado ='PENDIENTE'")or die(mysqli_error($conexion));
while($imprimir=mysqli_fetch_array($resultado)){

?>      <tr>
        <td id="id" data-id_prueba="<?php echo $imprimir['0'] ?>" ><?php echo $imprimir['0'] ?></td>
        <td id="fecha"><?php echo $imprimir['fechainicio'] ?></td>
        <td><?php echo $imprimir['tipo'] ?></td>
        <td><?php echo $imprimir['nombre'] ." ". $imprimir['apellido'] ?></td>
     
        <td><button type="button" data-id="<?php echo $imprimir['0'] ?>" data-fecha="<?php echo $imprimir['fechainicio'] ?>" id="eliminar" class="btn btn-danger">Cancel</button></td>

        


      </tr>
  <?php } ?>
  </table>

  <br><br><br>
</div>

<?php 
}
?>




