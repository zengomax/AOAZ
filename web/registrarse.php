<!DOCTYPE html>
<html>
	<head>
		<title>Register</title>
		<link rel="stylesheet" href="lib/css/bootstrap.min.css">
	
		<link rel="stylesheet" href="Register.css" />
<style type="text/css">
		
  #error{   
    color: #FF0000;   
  }
  
  .box input[type = "email"],.box input[type = "text"],.box input[type = "date"],.box input[type = "file"]{
  border:0;
  background: none;
  display: block;
  margin: 20px auto;
  text-align: center;
  border: 2px solid black;
  padding: 5px 5px;
  width: 200px;
  outline: none;
  color: white;
  border-radius: 24px;
  transition: 0.45s;
}

.box input[type = "email"]:focus,.box input[type = "text"]:focus{
  width: 280px;
  border-color:black;
}

#password{
  border:0;
  background: none;
  display: block;
  margin: 20px auto;
  text-align: center;
  border: 2px solid black;
  padding: 5px 5px;
  width: 200px;
  outline: none;
  color: white;
  border-radius: 24px;
  transition: 0.45s;

}

#password:focus{
  width: 280px;
  border-color:black;
  
}
</style>
	</head>
	<body>
	<div class="bs-example">
			<nav class="navbar navbar-expand-md navbar-customclass bg-dark">
				
				<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div id="navbarCollapse" class="collapse navbar-collapse">
					<ul class="nav navbar-nav ">
						<li class="nav-item">
							<a href="#" class="nav-link">Home</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">Profile</a>
						</li>
						<li class="nav-item dropdown">
							<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Messages</a>
							<div class="dropdown-menu">
								<a href="#" class="dropdown-item">Inbox</a>
								<a href="#" class="dropdown-item">Drafts</a>
								<a href="#" class="dropdown-item">Sent Items</a>
								<div class="dropdown-divider"></div>
								<a href="#"class="dropdown-item">Trash</a>
							</div>
						</li>
					</ul>
					
				
					
					
				</div>
			</nav>
		</div>


<div class="container">
 

  <form class="box" id="registro" name="registro" method="POST" enctype="multipart/form-data" action="registrarse.php">
 <h1 class="display-4">Register</h1>

  <div>
   <input  type="text" id="nombre" name="nombre"  placeholder="Name" required="">
   <input  type="text" id="apellido" name="apellido"  placeholder="Surname"  required="">
   <input  type="text" id="dni" name="dni"  placeholder="DNI" required pattern="^[0-9]{8,8}[A-Za-z]$">
   <input type="email" name="email"  placeholder="Email" required>
   <input type="password" id="password" placeholder="Password" name="password" minlength="6" required>
   <input type="password" id="passwordrep"  placeholder="Repeat password" name="password" minlength="6" required>
   <input  type="password" id="code" name="code" placeholder="Enter register code" required>
   <input  type="Date" name="fecha" value required >
   <input id="imagen" type="file" name="imagen" onchange="mostrarImagen()"><br>
   <center><img id="argazki" name="imagen" width="150"></center> 
   </div>
  <input type="submit" class="btn" id="enviar" value="Register"/>
  <button type="clear" class="btn btn-danger">Clear</button>
  </form>
  </div>
		
		
		
			
			
			
				
				
			
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
				
				$motivo="REGISTRO: ".$dni."";
				
				
				$eurodeuda= 30;
				$sql2="INSERT INTO deudas VALUES ('','$motivo','$eurodeuda','$dni')";
				
				
				
				$ejecutar=mysqli_query($conexion, $sql);
				
				$ejecutar2=mysqli_query($conexion, $sql2);
				
				if(!$ejecutar || !$ejecutar2){
				echo '<script type="text/javascript">alert("Something was wrong");</script>';      
				}else{ 
				echo"The Register was complete succesfully";
				
				}
				
				}
				}
				?>
				
				</div>
				</body>
				</html>
				
				
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
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
				
				
				
				$("#registro").submit(function(){
				
				
				
				if($("#password").val()!=$("#passwordrep").val()){
				
				alert("The passwords must match");
				return false;
				}
				
				
				})
				
				
				
				
				
				
				
				
				</script>
				
								