<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="Login.css"/>

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
            <li class="nav-item"><a href="registrarse.php" class="nav-link">Register</a></li>
          </ul>
          
          
        </div>
      </nav>




 

  <form id="login" class="box mt-4 mb-4" name="login" method="POST" enctype="multipart/form-data" action="login.php">
 <h1 class="display-4">Login</h1>

  <div class="form-group">
   <input type="email" name="email"  placeholder="Email" required>
   <input type="password" id="password" placeholder="Password" name="password" minlength="6" required>
   </div>
  <input type="submit" class="btn" id="enviar" value="Login"/>
  </form>
  
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
    $_SESSION["imagen"]= $imprimir['imagen'];
    $_SESSION["dni"]= $imprimir['dni'];;


      echo "<script>alert('Welcome to the system ".$nombre."');</script>";

    echo "<script language=Javascript> location.href=\"indexmember.php \"; </script>";

}else{
	echo "<script>alert('The data is not correct.');</script>";

}

}


  ?>


</body>
</html>