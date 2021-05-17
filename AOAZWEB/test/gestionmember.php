

<?php 

include ("conexion.php");
$conexion=connectDataBase();

session_start();

$estado=$_GET['estado'];


if($estado=="ACTIVO"){  //SI LA RESERVA ESTA PENDIENTE CARGA LA TABLA CON BOTONES

?>
<div class="container">

  <h5 class="display-6"> My active users</h5>
 <table class="table table-bordered">
      <tr>
        <th>DNI</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Email</th>
        <th>Status</th>
   

      </tr>

<?php
$resultado= mysqli_query($conexion,"SELECT * FROM usuario WHERE estado= 'ACTIVO'")or die(mysqli_error($conexion));
while($imprimir=mysqli_fetch_array($resultado)){

?>      <tr>
        <td id="id" data-id_prueba="<?php echo $imprimir['dni'] ?>" ><?php echo $imprimir['dni'] ?></td>
        <td id="fecha"><?php echo $imprimir['1'] ?></td>
        <td><?php echo $imprimir['2'] ?></td>
        <td><?php echo $imprimir['4'] ?></td>
       
        
        <td><button type="button" data-id="<?php echo $imprimir['dni'] ?>" id="bloquear" class="btn btn-warning">Lock</button></td>
  
        


      </tr>
  <?php } ?>
  </table>

  <br><br><br>
</div>

<?php 
}

?>


<?php 

if($estado=="BLOQUEADO"){


?>
<div class="container">
    <h5 class="display-6"> My BLOCKED USERS</h5>

 <table class="table table-bordered">
      <tr>
        <th>DNI</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Email</th>
        <th>Status</th>
   

      </tr>
<?php

$resultado= mysqli_query($conexion,"SELECT * FROM usuario WHERE estado ='BLOQUEADO'")or die(mysqli_error($conexion));

while($imprimir=mysqli_fetch_array($resultado)){

?>
   
       <tr>
        <td id="id" data-id_prueba="<?php echo $imprimir['dni'] ?>" ><?php echo $imprimir['dni'] ?></td>
        <td id="fecha"><?php echo $imprimir['1'] ?></td>
        <td><?php echo $imprimir['2'] ?></td>
        <td><?php echo $imprimir['4'] ?></td>
       
        
        <td><button type="button" data-id="<?php echo $imprimir['dni'] ?>" id="bloquear" class="btn btn-warning">Unblock</button></td>
  
        


      </tr>


  <?php } ?>
  </table>

  <br><br><br>
</div>
<?php 

}
 ?>

