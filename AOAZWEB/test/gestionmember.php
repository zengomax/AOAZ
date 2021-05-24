<?php 

include ("conexion.php");
$conexion=connectDataBase();

session_start();

$estado=$_GET['estado'];
$dni=$_SESSION['dni'];

if($estado=="ACTIVO"){  //SI LA RESERVA ESTA PENDIENTE CARGA LA TABLA CON BOTONES

?>
<div class="container">

  <h5 class="display-6"> Active users</h5>
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
$i=0;
$resultado= mysqli_query($conexion,"SELECT * FROM usuario WHERE estado= 'ACTIVO' AND dni != '$dni'")or die(mysqli_error($conexion));
while($imprimir=mysqli_fetch_array($resultado)){

?>      <tr>
        <td id="id" data-id_prueba="<?php echo $imprimir['dni'] ?>" ><?php echo $imprimir['dni'] ?></td>
        <td id="fecha"><?php echo $imprimir['1'] ?></td>
        <td><?php echo $imprimir['2'] ?></td>
        <td><?php echo $imprimir['4'] ?></td>
       
        
        <td><button type="button" data-id="<?php echo $imprimir['dni'] ?>" id="bloquear" class="btn btn-warning">Lock</button></td>
        <td><button type="button" id="editar"class="btn btn-warning" data-id="<?php echo $imprimir['dni'] ?>" data-toggle="modal" data-target="#edit<?php echo $i ?>" >Edit</button></td>
  
        


      </tr>

    <div class="modal fade" id="edit<?php echo $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <input type="text" class="form-control" id="name<?php echo $i ?>" style=" border:2px solid black; box-shadow:0 0 0px;background: none; color:black; width:50%;margin: auto;text-align: center;" value="<?php echo $imprimir['nombre']  ?>">
        
            <label for="recipient-name" class="col-form-label">Surname:</label>
            <input type="text" class="form-control" id="surname<?php echo $i ?>"style=" border:2px solid black; box-shadow:0 0 0px;background: none; color:black; width:50%;margin: auto;text-align: center;" value="<?php echo $imprimir['apellido']  ?>">
     
      
            <label for="recipient-name" class="col-form-label">Email:</label>
            <input type="text"   class="form-control" id="email<?php echo $i ?>" style=" border:2px solid black; box-shadow:0 0 0px;background: none; color:black; width:50%;margin: auto;text-align: center;" value="<?php echo $imprimir['email']  ?>">

         
            <label for="recipient-name" class="col-form-label"> New Password:</label>
            <input type="Password" class="form-control" style=" border:2px solid black; box-shadow:0 0 0px;background: none; color:black; width:50%;margin: auto;text-align: center;" id="password<?php echo $i ?>">
          
            
            <label for="recipient-name" class="col-form-label">Repeat
             new Password:</label>
            <input type="Password"  class="form-control" style=" border:2px solid black; box-shadow:0 0 0px;background: none; color:black; width:50%;margin: auto;text-align: center;"  id="repeatpassword<?php echo $i ?>" >
  
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" id="save" value="<?php echo $i ?>"data-id="<?php echo $imprimir['dni'] ?>" class="btn btn-success">Save</button>
      </div>
    </div>
  </div>

    <?php
    $i=$i+1;
     } //fin while


   ?>
</div>
  </table>

  <br><br><br>
</div>

<?php 
}

?>


<?php 

if($estado=="BLOQUEADO"){
//__________________________________________________________________________________________________________________

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
$j=0;
while($imprimir=mysqli_fetch_array($resultado)){
?>
   
       <tr>
        <td id="id" data-id_prueba="<?php echo $imprimir['dni'] ?>" ><?php echo $imprimir['dni'] ?></td>
        <td id="fecha"><?php echo $imprimir['1'] ?></td>
        <td><?php echo $imprimir['2'] ?></td>
        <td><?php echo $imprimir['4'] ?></td>
       
        
        <td><button type="button" data-id="<?php echo $imprimir['dni'] ?>" id="bloquear" class="btn btn-warning">Unblock</button></td>
          <td><button type="button" id="editar"class="btn btn-warning" data-id="<?php echo $imprimir['dni'] ?>" data-toggle="modal" data-target="#edit<?php echo $j ?>" >Edit</button></td>

        


      </tr>



    <div class="modal fade" id="edit<?php echo $j  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <input type="text" class="form-control" id="name<?php echo $j ?>"  required value="<?php   echo $imprimir['nombre']   ?>">
        
            <label for="recipient-name" class="col-form-label">Surname:</label>
            <input type="text" class="form-control" id="surname<?php echo $j ?>" value="<?php   echo $imprimir['apellido']   ?>">
     
      
            <label for="recipient-name" class="col-form-label">Email:</label>
            <input type="text"   class="form-control" id="email<?php echo $j ?>" value="<?php   echo $imprimir['email']   ?>">

         
            <label for="recipient-name" class="col-form-label">Password:</label>
            <input type="Password" class="form-control" id="password<?php echo $j ?>" placeholder="Password">
          
            
            <label for="recipient-name" class="col-form-label">Repeat Password:</label>
            <input type="Password"  class="form-control"id="repeatpassword<?php echo $j ?>" placeholder="Repeat password">
  

         
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" id="save" value="<?php echo $j ?>"data-id="<?php echo $imprimir['dni'] ?>" class="btn btn-success">Save</button>
      </div>
    </div>
  </div>
    <?php $j=$j+1;} ?>
</div>
  </table>


  <br><br><br>
</div>
<?php 


}
 ?>

<script >


</script>