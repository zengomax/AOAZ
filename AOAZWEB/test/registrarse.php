<!DOCTYPE html>
<html>
	<head>
		<title>Register</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
		<link herf="Register.css"/>
		
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		
		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

		  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
			<link rel="stylesheet" href="Register.css"/>
		

	</head>
	<body>
		<img src="img/banner2.png" width=100% height=20% ></img>
	
			<nav class="navbar navbar-expand-md navbar-customclass bg-dark">
				
				<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div id="navbarCollapse" class="collapse navbar-collapse">
					<ul class="nav navbar-nav ">
						<li class="nav-item">
							<a href="index.php" class="nav-link">Home</a>
						</li>
						
						
					</ul>
					
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
					</ul>
					
					
				</div>
			</nav>
	


	
 

	 <form class="box mt-4 mb-4"  id="registro" name="registro" method="POST" enctype="multipart/form-data" action="registrarse.php">
	 <h1 class="display-4">Register</h1>

	  <div>
	   <input  type="text" id="nombre" name="nombre"  placeholder="Name" required="">
	   <input  type="text" id="apellido" name="apellido"  placeholder="Surname"  required="">
	   <input  type="text" id="dni" name="dni"  placeholder="DNI" required pattern="^[0-9]{8,8}[A-Za-z]$">
	   <input type="email" name="email"  placeholder="Email" required>
	   <input type="password" id="password" placeholder="Password" name="password" minlength="6" required>
	   <input type="password" id="passwordrep"  placeholder="Repeat password" name="password" minlength="6" required>
	   <input  type="password" id="code" name="code" placeholder="Enter register code" required>
	   <input  type="Date" name="fecha" id="fecha" value required >
	   <input id="imagen" type="file" name="imagen" onchange="mostrarImagen()"><br>
	   <center><img id="argazki" name="imagen" width="150"></center> 
	   </div>
	  <input type="submit" class="btn" id="enviar" value="Register"/>
	 

			
			
			
				
				
				
					
					
				
			<?php 
				include ("conexion.php");
				$conexion=connectDataBase();
				
				
				if (isset($_POST['email'])){
					$nombre = $_POST["nombre"];
					$apellido= $_POST["password"];                
					$dni= $_POST["dni"];                
					$email= $_POST["email"];                
					$password= $_POST["password"];  
					$fecha=$_POST["fecha"];              
					$dir="img";
					$imagen=$_FILES['imagen']['name'];
					$archivo= $_FILES['imagen']['tmp_name'];
					$dir=$dir."/".$imagen;
					move_uploaded_file($archivo, $dir);
					$email=$_POST['email'];
					$code=$_POST['code'];
					$passwordEncriptada= password_hash($password, PASSWORD_DEFAULT);
					
					
					
					if($code!="erlete"){

	                echo '<script type="text/javascript">alert("The register code is not valid");</script>';



	        }else{

	                if($dir=="img/"){  // Si no hay foto añade una foto por defecto

	                $sql="INSERT INTO usuario VALUES ('$dni','$nombre','$apellido','$fecha','$email','$passwordEncriptada','usuario','img/fotoperfil.png','ACTIVO')";

	                } 
	                else{
	                $sql="INSERT INTO usuario VALUES ('$dni','$nombre','$apellido','$fecha','$email','$passwordEncriptada','usuario','$dir','ACTIVO')";

	                }

	                $ejecutar=mysqli_query($conexion, $sql);

	                if(!$ejecutar){
	                    echo '<script type="text/javascript">alert("This data is in used");</script>';

	                } else{
	                    $motivo="REGISTRO: ".$dni."";
	                    $eurodeuda= 30;
	                    $sql2="INSERT INTO deudas VALUES ('','$motivo','$eurodeuda','$dni')";
	                    $ejecutar2=mysqli_query($conexion, $sql2);

	                    if(!$ejecutar2){
	                        echo '<script type="text/javascript">alert("Something was wrong");</script>';
	                    }else{

	                        echo"<p style='color:white'>The Register was complete succesfully<p>";
							echo'<a href="login.php" class="btn btn-warning" style="color:black" type="button">Login</a>';
	                    }



	                }


	                }
	                }
	                ?>

				

					  </form>	
					
				
					
					<script>
					  $( function() {
					    $( "#dialog" ).dialog();
					  } );
					  </script>
					
					<script>
					
					function mostrarImagen(){   //Script para mostrar la previsualización de la imagen
					
					
					
					var preview=$("#argazki")[0];
					var archivo = $("#imagen")[0].files[0];
					
					var leer = new FileReader();
					
					if(archivo){
					leer.readAsDataURL(archivo);
					leer.onloadend=function(){
					preview.src=leer.result;
					
					};   }
					} 
					
					
					
					// validación de registro
	                $("#registro").submit(function(){


	                    var fechainicioField = document.getElementById("fecha").value.split("-");
	                    var fechainicio = new Date(parseInt(fechainicioField[0]),parseInt(fechainicioField[1]-1),parseInt(fechainicioField[2]));
	                    var hoy = new Date();
	                    var year = hoy.getFullYear()-18;
	                    if(fechainicio.getFullYear()>year){
	                     alert("You have to be of legal age");
	                     return false;

	                    }

	                if($("#password").val()!=$("#passwordrep").val()){

	                alert("The passwords must match");
	                return false;
	                }
	                })
					
					
					
					</script>

					
					
		
					
		</body>
	</html>