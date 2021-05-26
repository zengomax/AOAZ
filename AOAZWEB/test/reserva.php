<?php 
//controller de la reserva

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
  <title>Booking</title>

      <link rel="shortcut icon" type="image/x-icon" href="img/ico.png" />

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    
<!-- librerias calendario-->
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet' />
<link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='lib/main.css' rel='stylesheet' />
    <script src='lib/main.js'></script>
    <script>
//Utilizamos la libreria FullCalendar y mediante una vista sql generamos unos eventos para que puedan visualizarse en el calendario

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        
        var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,listMonth'
      },
      
      events:'selectCalendar.php',
      eventColor:'#ff9466',
    });
        calendar.render();
      });



    </script>
<link rel="stylesheet" href="allcss.css" ></link>
    <!------------>
</head>
<body style=" background: #FFBD59;">
  
  
    <img src="img/banner2.png" width=100% height=20% ></img>
      <nav class="navbar navbar-expand-md navbar-customclass bg-dark">
        
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div id="navbarCollapse" class="collapse navbar-collapse">
          <ul class="nav navbar-nav ">
            <li class="nav-item">
              <a href="indexmember.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="reserva.php" class="nav-link">Make a booking</a>
            </li>
            
          </ul>
          
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo "&nbsp;&nbsp;<img class='rounded-circle' width=50px height=50px; src=".$_SESSION['imagen'].">"?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" >
                
                <a class="dropdown-item" id="profile" href="profile.php">Edit Profile</a>
                <a class="dropdown-item" href="debts.php">Debts</a>
                <a class="dropdown-item" href="managebooking.php">Reservations</a>
                <div style="border-color:#999691" class="dropdown-divider"></div>
                <a class="dropdown-item" id="close" href="logout.php">Log Out &nbsp; <img src="img/exit.png" style="width:20px;height: 17px" /></a>
              </div>
            </li>   
          </ul>
          
          
        </div>
      </nav>

<br>
<div class="infod2">
<div class="infoh1">
  
   <h1><b>Reservation</b></h1>

</div>
<br>
<div class="infop11">
      <form id="reserva" name="reserva" method="POST" enctype="multipart/form-data" action="reserva.php">


   Start Date : <input class="form-control" type="date" id="fechainicio" name="fechainicio" required="">
   <br>
<?php
        include ("conexion.php");
        $conexion=connectDataBase();



//SELECIONA LOS METAL BINS DISPONIBLES

        $resultado= mysqli_query($conexion,"SELECT * FROM metalbins WHERE estado='DISPONIBLE'"); //introducimos en un select los metalbins disponibles
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
  

$sql1= mysqli_query($conexion,"SELECT * FROM reserva WHERE fechainicio = '$fechainicio'"); //comprueba si existe alguna reserva con esa fecha

$fila= mysqli_num_rows($sql1);





if($fila>0)
{



 echo '<script type="text/javascript">alert("The dates are not avaliable");</script>'; //si alguna fecha existe salta error


}else{

    // insert a la reserva con el dni
    $sql="INSERT INTO reserva VALUES ('','$fechainicio','$dni','0','PENDIENTE','$metalbin')"; //crea una reserva
    $ejecutar=mysqli_query($conexion, $sql);

    if(!$ejecutar){
      echo("Error making the book");

    }else{
        $sql3="UPDATE metalbins SET estado='OCUPADO' WHERE idmetal='$metalbin'AND tipo!='MY OWN' "; //actualiza el estado del metalbin
        $ejecutar3=mysqli_query($conexion, $sql3);    
        if(!$ejecutar3){
          echo '<script type="text/javascript">alert("It was an error.");</script>';     
        }else{ 
          
         
      echo '<script type="text/javascript">alert("The reservation is confirmed.");</script>';
      echo "<script language=Javascript> location.href=\"reserva.php\"; </script>";

    }
      
    }

  }
 
 }





  ?>

  <button type="submit" class="btn btn-warning" id="Reservar">Book</button>
  </form>
  </div>
  </div>  





<br>
<br>

<div class="infod2">
<div class="infoh3">
  
  <h1><b>Reservations calendar</b></h1>

</div>
<br>
<div id="infomap">
   

<br>


<div class="row">  
    <div class="col-1"></div>
    <div class="col-10"><div class="container" style="background:#f2f2eb ;" id="calendar"></div> <!-- div para cargar el calendario -->
</div>
    <div class="col-1"></div>


  </div>
  </div>  





  
  



  
</div>
<br><br>
<footer>
  <div class="container-fluid">
    <div class="row">

    <div class="col-4" style="float:left;margin:auto;">
      <p>Achondo, Jauregi Street 28<br>
      Email:aoazdebelopers@gmail.com<br>
      Telf: <b>654389234</b></p>      
    </div>
    <div class="col-4" style="float:center;margin:auto;">
      <h1 style="font-size: 25px">Public opening hours</h1>
      <p>Monday-Friday: 9:00AM-8:00PM<br>
      Saturday: 10:00AM-5:00PM<br>
      Sunday: 11:00AM-6:00PM</p>
      <p>Holiday hours may vary.</p>
    </div>
    <div class="col-4" style="margin:auto;">
      <h1 style="font-size: 25px">Follow Us</h1>
      <a href="#" class="fa fa-facebook"></a>
      <a href="#" class="fa fa-twitter"></a>
      <a href="#" class="fa fa-youtube"></a>
      <a href="#" class="fa fa-instagram"></a>
      <p>@Desing by:AOAZ</p>
    </div>
  </div>
</div>
</footer> 
</body>
</html>
<script>
    
//comprobamos la fecha actual para que el usuario no pueda reservar en una que ya ha pasado
$("#reserva").submit(function(){
  var fechainicioField = document.getElementById("fechainicio").value.split("-");
  var fechainicio = new Date(parseInt(fechainicioField[0]),parseInt(fechainicioField[1]-1),parseInt(fechainicioField[2]));
  var hoy = new Date();
  hoy.setHours(0,0,0);
  fechainicio.setHours(12,12,12);
 
  
     if(fechainicio<hoy) {

        alert("You cant book in days that have already passed");
        return false;
    }

    
        

      
        });





  </script>