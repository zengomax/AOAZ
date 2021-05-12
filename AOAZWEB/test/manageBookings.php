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
	<title>Home menu</title>

  		<link rel="shortcut icon" type="image/x-icon" href="img/ico.png" />

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
		
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		
		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="reserva.css" ></link>
</head>
<body onload="obtenerDatos()">
	
	
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
								<a class="dropdown-item" href="mybooks.php">Reservations</a>
								<div style="border-color:#999691" class="dropdown-divider"></div>
								<a class="dropdown-item" id="close" href="logout.php">Log Out &nbsp; <img src="img/exit.png" style="width:20px;height: 17px" /></a>
							</div>
						</li>   
					</ul>
					
					
				</div>
			</nav>
	
	<div class="container" id="reservadv">
		<h1>Manage Books</h1><br><br>

<div id="datos"></div>
			
</div>



</body>
</html>
<script>
    




function obtenerDatos(){

		$.ajax({

		url: 'gestionReserva.php',

		beforeSend:function(){
			
		$('#datos').html('<div><img src="img/loading.gif" width="100"/></div>')},


		success:function(datos){


		$('#datos').fadeIn().html(datos);},
		error:function(){
			$('#datos').fadeIn().html('<p><strong>The server is not working</p>');
		}
			});

		
	
		}




		$(document).on("click","#eliminar",function(){
			 alert(document.getElementById("idreserva").value)
			var id =document.getElementById("idreserva").value=1;
		//	var id=$(this).data("id");
			alert(id);

		});



function eliminar(){


$.ajax({

		url: 'deleteBook.php',

		beforeSend:function(){
			
		$('#datos').html('<div><img src="img/loading.gif" width="100"/></div>')},


		success:function(datos){


		$('#datos').fadeIn().html(datos);},
		error:function(){
			$('#datos').fadeIn().html('<p><strong>The server is not working</p>');
		}
			});

		
	
	


}


  </script>