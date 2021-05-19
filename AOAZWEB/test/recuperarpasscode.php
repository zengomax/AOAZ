<!DOCTYPE html>
<html>
<head>
  <title>Restore Password</title>

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
							<a href="index.php" class="nav-link">Home</a>
						</li>
						
					</ul>
					
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
						<li class="nav-item"><a href="registrarse.php" class="nav-link">Register</a></li>
						
					</ul>
					
					
				</div>
			</nav>
		</div>


<!-- Ends nav bar-->

<?php 
error_reporting(0);

session_start();
$email = $_GET['mail']; ?>
  
  <div class="container" id="reservadv">
    <h1>Restore Password</h1>

    <div class="form-group">
    <form id="restore" name="restore" method="POST" enctype="multipart/form-data" action="recuperarpasscode.php">
    	<br><br><br>
	<p>Enter the requested data to restore your password.</p><br>
    <label>Email*         :  <input class="form-control" type="email" name="email" id="email" value="<?php echo $email ?>"></label><br>
    <label>Code*          :  <input class="form-control" type="number" name="codigo" id="codigo" placeholder="Please enter the code"></label><br>
    <label>Password*      :  <input class="form-control" type="password" name="password" id="password" placeholder="Please enter your password"></label><br>
    <label>Repeat Password*:  <input class="form-control" type="password" name="repassword" id="passwordrep" placeholder="Please enter your password again"></label><br>
  
    


   <br><br><br>

  <button type="submit" class="btn btn-primary" id="restoreButton">Restore Password</button>
  </form><br><br>
</div>

</body>
</html>

<script >
		// validación de registro
    $("#restore").submit(function(){

    if($("#password").val()!=$("#passwordrep").val()){

    alert("The passwords must match");
    return false;
    }
    });

</script>


<?php
if (isset($_POST['email'])){
include ("conexion.php");
$conexion=connectDataBase();
	
	//recuperar las variables
	$email=$_POST['email'];
	$password=$_POST['password'];
	$codigo=$_POST['codigo'];


if($_SESSION['email']==$email && $_SESSION['codigo']==$codigo ){



$passwordEncriptada= password_hash($password, PASSWORD_DEFAULT);
	
	$sql="UPDATE usuario SET password='$passwordEncriptada' WHERE email='$email'";


	 $ejecutar=mysqli_query($conexion, $sql);
	
	 //verificacion de la ejecucioon

	 if(!$ejecutar){

	echo '<script type="text/javascript">alert("Something was wrong, maybe the data is not correct");</script>';

	 }else{ 
	 echo"Password changed succesfully <br><a href='login.php'>¿Do you want to login? </a>";


	 } 
	 
	 }
else{ 
	echo "The code or the mail are not correct";
	} 

}

?>

<br><br><br>