<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
 <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&family=Nunito:ital,wght@1,300&display=swap" rel="stylesheet">
		
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
		
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		
		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style type="text/css">
  #error{   
    color: #FF0000;   
  }
  
  .box input[type = "email"]{
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
.box input[type = "email"]:focus{
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
<link rel="stylesheet" href="Login.css" />
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
 

  <form id="login"  class="box" name="login" method="POST" enctype="multipart/form-data" action="login.php">
 <h1 class="display-4">Login</h1>

  <div class="form-group">
   <input type="email" name="email"  placeholder="Email" required>
   <input type="password" id="password" placeholder="Password" name="password" minlength="6" required>
   </div>
  <input type="submit" class="btn" id="enviar" value="Login"/>
  </form>
  </div>
<?php 
include ("conexion.php");
    $conexion=connectDataBase();


  if (isset($_POST['email'])){
        $email= $_POST["email"];                
        $password= $_POST["password"];  
                     
    $consulta= "SELECT * FROM usuario WHERE email='$email'";
    $resultado=mysqli_query($conexion,$consulta);


$imprimir= mysqli_fetch_array($resultado);

if(password_verify($password,$imprimir['password'])==true){
  
  session_start();

    $nombre= $imprimir['nombre'];
    $_SESSION["nombre"]=$nombre;
    $_SESSION["rol"]= $imprimir['rol'];
    $_SESSION["imagen"]= $imprimir['imagen'];;


      echo "<script>alert('Welcome to the system ".$nombre."');</script>";

    echo "<script language=Javascript> location.href=\"index2.php \"; </script>";

}else{
	echo "<script>alert('The data is not correct.');</script>";

}

}


  ?>

</div>
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>