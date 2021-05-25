<?php 

//Controller para gestionar las reservas
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if(!isset($_SESSION["rol"])||$_SESSION["rol"]== null||$_SESSION["rol"]!= 'usuario'){
	echo "<html> <marquee><h1>You don't have permission to load this page.<h1></marquee><html>";
	die();
}
 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Manage Bookings</title>

  		<link rel="shortcut icon" type="image/x-icon" href="img/ico.png" />

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		
		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		


		<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

<!-- 
    RTL version
-->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.rtl.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.rtl.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css"/>
<link rel="stylesheet" href="allcss.css" ></link>

</head>
<body>
	<!-- Starts nav bar-->
	<div class="bs-example">
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
		</div>


<!-- Ends nav bar-->

<br>

<div class="infod2">
<div class="infoh1">
	
	<h1><b>Manage Books</b></h1>

</div>
<br>
<div class="infop1">
	<div style="text-align: center" >
	<label><input type="radio" id=pendiente  name="estadoreserva" value="PENDIENTE" checked onclick="obtenerDatos()"> PENDING</label>	
	<label><input type="radio"  id="finalizadas"  name="estadoreserva" value="FINALIZADA" onclick="obtenerDatos()"> FINISHED</label>
	
</div>
<br>
		<div id="datos" style="text-align: center"></div>

	</div>
	</div>	


<!-- Starts carrousel-->


<br><br><br><br><br>


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
   
//cuando la pagina cargue 
$( document ).ready(function() {
   obtenerDatos();
});


//imprimimos las tablas de las reservas dependiendo del radiobutton seleccionado

function obtenerDatos(){
  $estado = $('input[name="estadoreserva"]:checked').val();

		$.ajax({

		url: 'gestionReserva.php?estado='+$estado+'',
		
		success:function(datos){


		$('#datos').fadeIn().html(datos);},
		error:function(){
			$('#datos').fadeIn().html('<p><strong>The server is not working</p>');
		}
			});

		
	
		}




//funciona para comprobar fechas y dias pasados
function fecha(){

 var fechainicioField = document.getElementById("fecha").innerText.split("-");
  var fechainicio = new Date(parseInt(fechainicioField[0]),parseInt(fechainicioField[1]-1),parseInt(fechainicioField[2]));
  var hoy = new Date();
  hoy.setHours(0,0,0);
  fechainicio.setHours(23,23,23);

  alert(hoy);
  alert(fechainicio);

  
     if(fechainicio<hoy) {
     	 alertify.error("You can't cancel because the day expired");
   
        return false;
    } else {
    	return true;
    }

    
		}


//accion de hacer click en el boton eliminar
//-------CANCELAR RESERVA--------
$(document).on("click","#eliminar",function(){
	if(confirm("Do you want to cancel this book?")){
	

  var fechainicioField = $(this).data("fecha").split("-");
  var fechainicio = new Date(parseInt(fechainicioField[0]),parseInt(fechainicioField[1]-1),parseInt(fechainicioField[2]));
  var hoy = new Date();
  hoy.setHours(0,0,0);
  fechainicio.setHours(23,23,23);


  if(fechainicio<hoy) {
     	 alertify.error("You can't cancel because the day expired");
   
    } else {
   		var id = $(this).data("id");
        var parametros = {
                "id" : id,
                
        };
        $.ajax({
                data:  parametros, 
                url:   'deleteBook.php', 
                type:  'post', 

		success:function(datos){
			alertify.success(datos);
			obtenerDatos();
		},
		
			});
    	
    	}
	}

	});

//-------------FINALIZAR RESERVA---------
//se nos abre un nuevo form para finalizar la reserva
$(document).on("click","#finalizar",function(){

	var id = $(this).data("id");
    var parametros = {"idreserva" : id,};

$.ajax({
		data:  parametros, 
        url:   'finalizarReservaForm.php', 
        type:  'post',
		

		beforeSend:function(){
			
		$('#datos').html('<div><img src="img/abeja.gif" width="400"/></div>')},


		success:function(datos){


		$('#datos').fadeIn().html(datos);},
		error:function(){
			$('#datos').fadeIn().html('<p><strong>The server is not working</p>');
		}
			});




});


//GENERAR DEUDA FORM 
//finalizamos la reserva cambiando su estado a finalizado

$(document).on("click","#terminar",function(){



if($("#kilos").val()!=""){
	var kilos = $("#kilos").val(); //obtener kilos
	var euros=0.25*kilos;
		if(confirm("Do you want to finish this book?\n it will generate a debt of "+euros+"€")){
		var reserva= $("#reserva").data("id_book"); //obtener reserva
	
    var parametros = {"kilos" : kilos,"idreserva" : reserva, "euros":euros,};

$.ajax({
		data:  parametros, 
        url:   'finalizarReservaForm.php', 
        type:  'post',
		

		beforeSend:function(){
			
		$('#datos').html('<div><img src="img/abeja.gif" width="400"/></div>')},


		success:function(datos){


		$('#datos').fadeIn().html(datos);


		},
		error:function(){
			$('#datos').fadeIn().html('<p><strong>The server is not working</p>');
		}
			});


	}
 }else{
		
	alertify.error("You cant save empty data, please isert the kilos");
 }

});

	





  </script>