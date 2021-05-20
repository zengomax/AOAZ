<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
  <link rel="shortcut icon" href="img/ico.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    
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
   <a href="recuperarpass.php">Password Forgotten? Click here</a>
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
$estado= $imprimir['estado'];

if(password_verify($password,$imprimir['password'])==true && $estado=="ACTIVO"){
  
  session_start();

    $nombre= $imprimir['nombre'];
    $_SESSION["nombre"]=$nombre;
    $_SESSION["rol"]= $imprimir['rol'];
    $_SESSION["imagen"]= $imprimir['imagen'];
    $_SESSION["dni"]= $imprimir['dni'];
    $_SESSION["email"]= $imprimir['email'];
    $_SESSION["apellido"]=$imprimir['apellido'];

   

        echo "<script>alert('Welcome to the system ".$nombre."');</script>";

             
           
         
        if($_SESSION["rol"]== 'admin'){
          echo "<script language=Javascript> location.href=\"managebookingadmin.php \"; </script>";
          
          
        }else{

         echo "<script language=Javascript> location.href=\"indexmember.php \"; </script>";

              
        }



    
      
    



    }else{
      if($estado=="BLOQUEADO"){
        echo "<script>alertify.alert('This user is blocked');</script>";

      }else{

              echo "<script>alertify.alert('The data is not correct.');</script>";

      }

    }

}


  ?>


</body>
</html>

