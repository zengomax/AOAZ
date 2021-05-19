
<?php 

include ("conexion.php");
$conexion=connectDataBase();

session_start();

$estado=$_GET['estado'];
$dni= $_POST['dni'];

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
        <th>Edit</th>
   

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
        <td><button type="button" id="editar"class="btn btn-warning" data-id="<?php echo $imprimir['dni'] ?>" data-toggle="modal" data-target="#edit" onclick="dni()">Edit</button></td>
  
        


      </tr>
  <?php }


$resultado= mysqli_query($conexion,"SELECT * FROM usuario WHERE estado= 'ACTIVO' and  dni = '$dni'")or die(mysqli_error($conexion));

  $imprimir=mysqli_fetch_array($resultado);

   ?>
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background: orange;" >
      <div class="modal-header" style="background: orange;" >
        <h5 class="modal-title" id="exampleModalLabel">Edit information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p">
       <form id="formu">
            
  
            <label for="recipient-name"   class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="name" style=" border:2px solid black; box-shadow:0 0 0px;background: none; color:black; width:50%;margin: auto;text-align: center;" value="<?php   echo $imprimir['nombre']   ?>">
        
            <label for="recipient-name" class="col-form-label">Surname:</label>
            <input type="text" class="form-control" id="surname"style=" border:2px solid black; box-shadow:0 0 0px;background: none; color:black; width:50%;margin: auto;text-align: center;" value="<?php   echo $imprimir['apellido']   ?>">
     
      
            <label for="recipient-name" class="col-form-label">Email:</label>
            <input type="text"   class="form-control" id="email" style=" border:2px solid black; box-shadow:0 0 0px;background: none; color:black; width:50%;margin: auto;text-align: center;" value="<?php   echo $imprimir['email']   ?>">

         
            <label for="recipient-name" class="col-form-label"> New Password:</label>
            <input type="Password" class="form-control" style=" border:2px solid black; box-shadow:0 0 0px;background: none; color:black; width:50%;margin: auto;text-align: center;" id="password">
          
            
            <label for="recipient-name" class="col-form-label">Repeat
             new Password:</label>
            <input type="Password"  class="form-control" style=" border:2px solid black; box-shadow:0 0 0px;background: none; color:black; width:50%;margin: auto;text-align: center;" id="repeatpassword" >
  
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success">Save</button>
      </div>
    </div>
  </div>
</div>
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
        <th>Edit</th>
   

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
        <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit" >Edit</button></td>
  
        


      </tr>


  <?php } ?>
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background: orange;" >
      <div class="modal-header" style="background: orange;" >
        <h5 class="modal-title" id="exampleModalLabel">Edit information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p">
        <form>
            
  
            <label for="recipient-name"   class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="name" value="<?php   echo $imprimir['nombre']   ?>">
        
            <label for="recipient-name" class="col-form-label">Surname:</label>
            <input type="text" class="form-control" id="surname" value="<?php   echo $imprimir['apellido']   ?>">
     
      
            <label for="recipient-name" class="col-form-label">Email:</label>
            <input type="text"   class="form-control" id="email" value="<?php   echo $imprimir['email']   ?>">

         
            <label for="recipient-name" class="col-form-label">Password:</label>
            <input type="Password" class="form-control" id="password" placeholder="Password">
          
            
            <label for="recipient-name" class="col-form-label">Repeat Password:</label>
            <input type="Password"  class="form-control" id="repeatpassword" placeholder="Repeat password">
  

         
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success">Save</button>
      </div>
    </div>
  </div>
</div>
  </table>


  <br><br><br>
</div>
<?php 

}
 ?>

<script >


</script>