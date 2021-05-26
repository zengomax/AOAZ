<?php 

//imprime las deudas de los usuarios dependiendo del dni que reciba

include ("conexion.php");
$conexion=connectDataBase();

session_start();

$dni=$_GET['dni'];

if($dni=="all"){

  $consulta="SELECT * FROM deudas inner join usuario where deudas.dni=usuario.dni ORDER BY usuario.dni"; //si es all muestra todos

}else{

  $consulta="SELECT * FROM deudas inner join usuario where deudas.dni=usuario.dni and usuario.dni='$dni'"; //muestra dependiendo del dni elegido

}


$resultado= mysqli_query($conexion,$consulta)or die(mysqli_error($conexion));

if(isset($resultado)){ 

?>
<div class="container">

 <table class="table table-bordered">
      <tr>
        
        <th>Cause</th>
        <th>Euros</th>
        <th>DNI</th>
        <th>Name & Surname</th>
        </tr>

<?php


while($imprimir=mysqli_fetch_array($resultado)){

?>      <tr>
        <td id="cause" data-id_prueba="<?php echo $imprimir['motivo'] ?>" ><?php echo $imprimir['motivo'] ?></td>
        <td id="euros"><?php echo $imprimir['eurosdeuda']." €" ?></td>  
        <td id="dni"><?php echo $imprimir['dni'] ?></td>  
        <td id="nombre"><?php echo $imprimir['nombre']." ".$imprimir['apellido'] ?></td>  
  
        


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
