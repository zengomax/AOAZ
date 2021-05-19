
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
	<title>Members</title>
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
				#formu input{

					border:2px solid black; 
					box-shadow:0 0 0px;	
					background: none;


				}
			
		</style>
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
							<a href="managebookingadmin.php" class="nav-link">Modify a booking</a>
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
		<h1>Manage members</h1><br>

<div>
	<label><input type="radio"  id="unlocked"  name="estadomembers" value="ACTIVO" checked onclick="obtenerDatos()"> Unblocked</label>
	<label><input type="radio"  id="locked"  name="estadomembers" value="BLOQUEADO" onclick="obtenerDatos()"> Locked</label>
	
</div><br><br>

<div id="datos"></div>
			
</div>

<br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>
<script>
   

$( document ).ready(function() {
   obtenerDatos();
});



function obtenerDatos(){
  $estado = $('input[name="estadomembers"]:checked').val();

		$.ajax({

		url: 'gestionmember.php?estado='+$estado+'',
	
		
		success:function(datos){


		$('#datos').fadeIn().html(datos);},
		error:function(){
			$('#datos').fadeIn().html('<p><strong>The server is not working</p>');
		}
			});

		
	
		}



//-------------BLoquear usuario---------
$(document).on("click","#bloquear",function(){
  var estado = $('input[name="estadomembers"]:checked').val();

  $message="";
if(estado=="ACTIVO"){
  $message="Do you want to block this user?";


 }else{



 	 $message="Do you want to unblock this user?";
 }
 var dni = $(this).data("id");
var parametros = {"dni" : dni, "estado": estado,};

//if(alertify.confirm($message).set({title:"WARNING!!"},'onok', function(closeEvent){ 


$.ajax({
			data:  parametros, 
	        url:   'updatestatususer.php', 
	        type:  'post',
			
			success:function(datos){

			alertify.success(datos);		
			obtenerDatos();},
			error:function(){
				$('#datos').fadeIn().html('<p><strong>The server is not working</p>');
			}
				});
	


});
//----------------CAMBIAR DATOS USUARIO-------------
$(document).on("click","#save",function(){
	$valor=$(this).val(); //obtiene el valor para saber el id de cada fila 
	 var dni = $(this).data("id");
	 var nombre = $("#name"+$valor).val();
	 var apellido = $("#surname"+$valor).val();
	 var email=$("#email"+$valor).val();
	 var password = $("#password"+$valor).val();
	 var passwordrep = $("#repeatpassword"+$valor).val();


if(dni==""||nombre==""||apellido==""||email==""||password==""||passwordrep==""){

	alert("You cant save empty data");


}else{
	if(password!=passwordrep){
		alert("Passwords must match");

	}else{
	var parametros = {"dni" : dni, "nombre": nombre,"apellido": apellido,"email": email,"password": password,};



$.ajax({
			data:  parametros, 
	        url:   'editmemberadmin.php', 
	        type:  'post',
			
			success:function(datos){

					
			alert(datos)
			obtenerDatos();},
			error:function(){
				$('#edit'+$valor).fadeIn().html('<p><strong>The server is not working</p>');
			}
				});
	}	
}

});

//--------------------------------------------------------






	





  </script>



</body>
</html>





<script>
	
$("#close").click(function() {
		alert("Session Closed");
		$(location).attr('href', 'logout.php');
	});
	

</script>
