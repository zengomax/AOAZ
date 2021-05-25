<?php 
//Controller para gestionar el cambio de datos del usuario
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if(!isset($_SESSION["rol"])||$_SESSION["rol"]== null){
	echo "<html> <marquee><h1>You don't have permission to load this page.<h1></marquee><html>";
	die();
}
 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="shortcut icon" href="img/ico.png">

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
		<?php if($_SESSION["rol"]=='usuario'){?> 
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
			<?php }else { ?>
				<nav class="navbar navbar-expand-md navbar-customclass bg-dark">
				
				<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div id="navbarCollapse" class="collapse navbar-collapse">
					<ul class="nav navbar-nav ">
						
						<li class="nav-item">
							<a href="managebookingadmin.php" class="nav-link active">Modify a booking</a>
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
			<?php } ?>
		</div>


<!-- Ends nav bar-->




<!--starts text--><br>

		


<?php
        include ("conexion.php");
        $conexion=connectDataBase();
        $dni=$_SESSION['dni'];

  $resultado= mysqli_query($conexion,"SELECT * FROM usuario WHERE dni='$dni'");

$imprimir=mysqli_fetch_array($resultado);

?>
<div class="infod2">
	
<form id="profileform" class="mt-4 mb-4" name="login" method="POST" enctype="multipart/form-data" action="profile.php">
	 <h2 class="display-4" style="text-align: center;">Welcome <?php echo$_SESSION['nombre'] ?> !</h2>
<br>
<div class="infop11">
		

<div class="row" >
 	<div class="col-4">
  	<?php echo "<img class='rounded-circle' id='argazki' width=250px height=250px; src=".$_SESSION['imagen'].">"?>
  	
 	<br>
 	<br>
  	<label><input type="file"  name="file" id="file"  onchange="mostrarImagen()"></label>

</div>
<div class="col-8 data imgp" id="datos" >
  	<label>Name:<input type="text" name="pname" id="pname"  value="<?php echo $imprimir['nombre']; ?>"  readonly></label><br>
   <label>Surname:<input type="text" name="psurname" id="psurname"  value="<?php echo $imprimir['apellido']; ?>"  readonly></label><br>
   <label>Birthday:<input type="date" name="date" id="date"  value="<?php echo $imprimir['nacimiento']; ?>"  readonly></label><br>
   <label>Email:<input type="email" name="email" id="email" value="<?php echo $imprimir['email']; ?>"  readonly></label><br>


 <div id="btnedit">
  <input type="button" class="btn btn-danger" id="editar" value="Edit"/>
  <input type="submit" class="btn btn-success" id="Guardar" value="Save"/>
   <input type="button" class="btn btn-warning" id="buttonpassword" onclick="cambiarPassword()" value="Change Password"/>


</div>
</div>
</div>
  </form>

</div>




<?php
if(isset($_POST['pname'])){
	$apellido=$_POST['psurname'];
	$edad=$_POST['date'];
	$email=$_POST['email'];
	$dni = $_SESSION['dni'];
	$dir="img";
	$imagen=$_FILES['file']['name'];
	$archivo= $_FILES['file']['tmp_name'];
	$dir=$dir."/".$imagen;
	move_uploaded_file($archivo, $dir);
	$nombre=$_POST['pname'];
	$fotoactual=   $_SESSION["imagen"];

    
if ($dir=="img/"){
        $sql3="UPDATE usuario SET nombre='$nombre', apellido= '$apellido', nacimiento= '$edad', email='$email',imagen= '$fotoactual' WHERE dni = '$dni'";
    } else{
        $sql3="UPDATE usuario SET nombre='$nombre', apellido= '$apellido', nacimiento= '$edad', email='$email',imagen= '$dir' WHERE dni = '$dni'";


    }

        $ejecutar3=mysqli_query($conexion, $sql3);    
        if(!$ejecutar3){
          echo '<script type="text/javascript">alert("It was an error.");</script>';     
        }else{ 
          if ($dir=="img/"){
          
		 $_SESSION["imagen"] = $fotoactual;
		}else{
		 $_SESSION["imagen"] = $dir;

		}

		 $_SESSION["nombre"]=$nombre;

		  


			
			echo "<script language=Javascript> location.href=\"profile.php\"; </script>";

    }
      
    



}


?>




<!--ends text-->

</div>	
<?php if($_SESSION["rol"]=='usuario'){?> 
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
<?php } ?>

</body>
</html>





<script>
	
$("#close").click(function() {
		alert("Session Closed");
		$(location).attr('href', 'logout.php');
	});
	




//funcion para cambiar de no editable a editable los input
$(document).ready(function(){
           	$("#editar").click(function(){
			 $('input').attr('readonly', false); 
			 $("#Guardar").attr('hidden',false);
			 $("#editar").attr('hidden',true);
		     $("#file").attr('hidden',false);
			 });

           	 $("#file").attr('hidden',true);

           	$("#Guardar").click(function(){
			 $('input').attr('readonly', true); 
			 $("#Guardar").attr('hidden',true);
		      $("#editar").attr('hidden',false);
		      $("#file").attr('hidden',true);

			 });

           	$("#Guardar").attr('hidden',true);

		  });



function mostrarImagen(){   //Script para mostrar la previsualización de la imagen
					
					
					
					var preview=$("#argazki")[0];
					var archivo = $("#file")[0].files[0];
					
					var leer = new FileReader();
					
					if(archivo){
					leer.readAsDataURL(archivo);
					leer.onloadend=function(){
					preview.src=leer.result;
					
					};   }
					} 


//Verificacion del formulario, para no guardar datos vacios

 $("#profileform").submit(function(){

 	$nombre = $("#pname").val();
 	$apellido = $("#psurname").val();
 	$fecha = $("#date").val();
 	$email = $("#email").val();

if($nombre==""||$apellido==""||$fecha==""||$email==""){
	alert("You can't save empty data");
	return false;
}

	                })


//funcion para desplegar form de cambio de contraseña
 function cambiarPassword(){

$.ajax({
        url:   'cambiarPassword.php', 
		

		beforeSend:function(){
			
		$('#datos').html('<div><img src="img/loading.gif" width="100"/></div>')},


		success:function(datos){


		$('#datos').fadeIn().html(datos);},
		error:function(){
			$('#datos').fadeIn().html('<p><strong>The server is not working</p>');
		}
			});


 	
 }

//Funcion del boton del formulario


$(document).on("click","#buton",function(){
	
	var passwordvieja = $('#passwordvieja').val();
	var password = $('#passwordintroducida').val();
	var passwordrep = $('#passwordrep').val();
    var parametros = {"passwordvieja" : passwordvieja,"password" : password,"passwordrep":passwordrep,};
	if(passwordvieja==""||password==""||passwordrep==""){
		alert("You cant save empty data");
	}else{

	$.ajax({

		data:   parametros,
        url:   'cambiarPassword.php', 
        type: 'post',
		

		beforeSend:function(){
			
		$('#datos').html('<div><img src="img/loading.gif" width="100"/></div>')},


		success:function(datos){


		$('#datos').fadeIn().html(datos);},
		error:function(){
			$('#datos').fadeIn().html('<p><strong>The server is not working</p>');
		}
			});

 }	
 });

</script>

