<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
 <link rel="stylesheet" href="lib/css/bootstrap.min.css">

<style type="text/css">
  #error{   
    color: #FF0000;   
  }
</style>

</head>


<body>


<div class="container">
  <h1 class="display-4">Login</h1>
 

  <form id="login" name="login" method="POST" enctype="multipart/form-data" action="login.php">

<form>
  <div class="form-group">
   Email: <input class="form-control" type="email" name="email" required>
   Password: <input class="form-control" type="password" id="password" name="password" minlength="6" required>
   </div>
  <button type="submit" class="btn btn-primary" id="enviar" onsubmit="ComprobarDatos()">Login</button>
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
echo '<html><br><div id=error class="error">The data is not correct.</div></hmtl>';

}

}


  ?>

</div>
</body>
</html>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
 
