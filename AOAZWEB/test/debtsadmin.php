<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if(!isset($_SESSION["rol"])||$_SESSION["rol"]== null||$_SESSION["rol"]!= 'admin'){
	echo "<html> <marquee><h1>You don't have permission to load this page.<h1></marquee><html>";
	die();
}
 ?>



<!DOCTYPE html>
<html>
<head>
	<title>INDEX</title>
	<link rel="shortcut icon" href="img/ico.png">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
		
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		
		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="reserva.css" ></link>

		<style type="text/css" media="screen">

			 body{
				  margin: auto;
				  padding: 0;
				  font-family: sans-serif;
				  background: #FFB133;
				}
				.navbar-customclass .navbar-nav .nav-link{
					  color:#ff8c00;
					}
				


			
		</style>
</head>
<body onload="obtenerDatos()">
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
							<a href="managebookingadmin.php" active class="nav-link">Modify a booking</a>
						</li>

						<li class="nav-item">
							<a href="managemembers.php" class="nav-link">Members</a>
						</li>
						<li class="nav-item">
							<a href="debtsadmin.php" class="nav-link">Debts</a>
						</li>
						
					</ul>
					
					<ul class="navbar-nav ml-auto">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?php echo "&nbsp;&nbsp;<img class='rounded-circle' width=50px height=50px; src=".$_SESSION['imagen'].">"?>
							</a>
							<div class="dropdown-menu dropdown-menu-right" >
								
								<a class="dropdown-item" id="profile" href="profile.php">Edit Profile</a>
							
								<div style="border-color:#999691" class="dropdown-divider"></div>
								<a class="dropdown-item" id="close" href="logout.php">Log Out &nbsp; <img src="img/exit.png" style="width:20px;height: 17px" /></a>
							</div>
						</li>   
					</ul>
					
					
				</div>
			</nav>
		</div>


<!-- Ends nav bar-->

<!-- Starts carrousel-->
<div class="container" id="reservadv">






<!-- Ends carrousel-->


<!--starts text--><br>

	
	<h1>Debts</h1><br><br>


<select onchange="obtenerDatos();" class="form-control" id="deudadni"  name="metalbin">
 <option value="all">ALL USERS</option>

  <?php

        include ("conexion.php");
        $conexion=connectDataBase();

          $resultado= mysqli_query($conexion,"SELECT * FROM deudas inner join usuario where deudas.dni=usuario.dni ");

          while($imprimir=mysqli_fetch_array($resultado)){ 
            ?>
             <option value="<?php echo $imprimir['dni'] ?>"><?php echo $imprimir['dni']." : ".$imprimir['nombre']." ".$imprimir['apellido'] ?></option>
            <?php 
            }
             ?>
</select>
          <br><br>



<div id="datos" >
		

</div>








<!--ends text-->

	

    		
</div>

</body>
</html>





<script>
	
$("#close").click(function() {
		alert("Session Closed");
		$(location).attr('href', 'logout.php');
	});
	

</script>

<script>
window.onload =function() {
   obtenerDatos();

};



function obtenerDatos(){
 
 $dni= $("#deudadni").val();
		$.ajax({

		url: 'gestiondebtsadmin.php?dni='+$dni+'',


		success:function(datos){


		$('#datos').fadeIn().html(datos);},
		error:function(){
			$('#datos').fadeIn().html('<p><strong>The server is not working</p>');
		}
			});

		
	
		}



	</script>