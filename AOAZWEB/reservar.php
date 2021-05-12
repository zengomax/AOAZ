
<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if(!isset($_SESSION["rol"])||$_SESSION["rol"]== null||$_SESSION['rol']!="usuario"){
  echo "<html> <marquee><h1>You don't have permission to load this page<h1></marquee><html>";
  die();
}
 ?>


<!DOCTYPE html>
<html>
<head>
  <title>Reserva</title>
 <link rel="stylesheet" href="lib/css/bootstrap.min.css">

</head>
<body>


<div class="container">
  <h1 class="display-4">Make a Book</h1>
 

  <form id="reserva" name="reserva" method="POST" enctype="multipart/form-data" action="reservar.php">

<form>
  <div class="form-group">
   Start Date : <input class="form-control" type="date" id="fechainicio" name="fechainicio" required="">
   <br>
<?php
        include ("conexion.php");
        $conexion=connectDataBase();



//SELECIONA LOS METAL BINS DISPONIBLES

        $resultado= mysqli_query($conexion,"SELECT * FROM metalbins WHERE estado='DISPONIBLE'");
?>

  Select MetalBin: <select class="form-control" id="metalbin"  name="metalbin">
  <?php
          while($imprimir=mysqli_fetch_array($resultado)){ 
            ?>
             <option value="<?php echo $imprimir['idmetal'] ?>"><?php echo $imprimir['tipo'] ?></option>
            <?php 
            }
             ?>
          </select>
          <br><br>


<?php

if (isset($_POST['fechainicio'])){

  $fechainicio= $_POST['fechainicio'];
  $metalbin= $_POST['metalbin'];
  $dni=$_SESSION['dni'];

//COMPRUEBA QUE LAS FECHAS ESTAN DISPONIBLES
  

$sql1= mysqli_query($conexion,"SELECT * FROM reserva WHERE fechainicio = '$fechainicio'");

$fila= mysqli_num_rows($sql1);
if($fila>0)
{

echo("hay reservas ese dia");

}else{




    // insert a la reserva con el dni
    $sql="INSERT INTO reserva VALUES ('','$fechainicio','$dni','0','PENDIENTE','$metalbin')";
    $ejecutar=mysqli_query($conexion, $sql);

    if(!$ejecutar){
      echo("Error al insertar en reserva");

    }else{
        $sql3="UPDATE metalbins SET estado='OCUPADO' WHERE idmetal='$metalbin'AND tipo!='FROM MY HOUSE' ";
        $ejecutar3=mysqli_query($conexion, $sql3);    
        if(!$ejecutar3){
          echo ' METALBIN Fail ';      
        }else{ 
          echo"Reserva OK";
         // header("Location: reservar.php");


    }
      
    }

  }
 
 }





  ?>

  <button type="submit" class="btn btn-primary" id="Reservar">Reservar</button>
  <button type="clear" class="btn btn-danger">Delete</button>
  </form>
  </div>

</div>
</body>
</html>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
 <script>
    

$("#reserva").submit(function(){
  var fechainicioField = document.getElementById("fechainicio").value.split("-");
  var fechainicio = new Date(parseInt(fechainicioField[0]),parseInt(fechainicioField[1]-1),parseInt(fechainicioField[2]));
  var hoy = new Date();
  hoy.setHours(0,0,0);
  fechainicio.setHours(12,12,12);
 
  
     if(fechainicio<hoy) {

        alert("no puedes reservar en dias que ya han pasado");
        return false;
    }

    
        

      
        });








  </script>

