

<?php 

include ("conexion.php");
$conexion=connectDataBase();

session_start();

$dni=$_SESSION['dni'];
$resultado= mysqli_query($conexion,"SELECT * FROM deudas ")or die(mysqli_error($conexion));

if(isset($resultado)){ 

?>
<div class="container">

 <table class="table table-bordered">
      <tr>
        
        <th>Cause</th>
        <th>Euros</th>
        <th>DNI</th>
        </tr>

<?php


while($imprimir=mysqli_fetch_array($resultado)){

?>      <tr>
        <td id="cause" data-id_prueba="<?php echo $imprimir['motivo'] ?>" ><?php echo $imprimir['motivo'] ?></td>
        <td id="euros"><?php echo $imprimir['eurosdeuda']." €" ?></td>  
        <td id="dni"><?php echo $imprimir['dni'] ?></td>  
  
        


      </tr>
  <?php } ?>
  </table>

  <br><br><br>
</div>

<?php 
}

?>

  <br><br><br>
</div>
