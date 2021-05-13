
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
        <th>Edit</th>
        <th>Delete</th>
      </tr>

<?php 

include ("conexion.php");
$conexion=connectDataBase();

$resultado= mysqli_query($conexion,"SELECT * FROM reserva inner join metalbins on reserva.idmetal = metalbins.idmetal")or die(mysqli_error($conexion));
while($imprimir=mysqli_fetch_array($resultado)){



  echo "   
        <tr>
        <td id='idreserva' data-id_prueba='".$imprimir['0']."'>".$imprimir['0']."</td>
        <td id='fecha'>".$imprimir['fechainicio']."</td>
        <td>".$imprimir['tipo']."</td>
        <td><button type='button' class='btn btn-warning'>Edit</button></td>
        <td><button type='button' id='eliminar' class='btn btn-danger'>Delete</button></td>
        </tr>
 
  ";  
 } 
echo "</table>";
 ?>
  <br><br><br>
</div>


<script >




</script>