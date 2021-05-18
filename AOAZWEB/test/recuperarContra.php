

<!DOCTYPE html>
<html>
<head>
  <title>Reset Password</title>

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
  
  <div class="container" id="reservadv">
    <h1>Restore Password</h1>
    <form id="restore" name="restore" method="POST" enctype="multipart/form-data" action="recuperarContra.php">
    	<br><br><br>
	<p>Please introduce your email to restore your password, you will recive an email with instructions</p>
    <label>Email:  <input type="email" name="email" placeholder="Please enter your email"></label>


   <br><br><br>

  <button type="submit" class="btn btn-primary" id="restoreButton">Restore Password</button>
  </form><br><br>
</body>
</html>

<?php 

if(isset($_POST['email'])){
include ("conexion.php");
$conexion=connectDataBase();

$emailingresado=$_POST['email'];

$resultado=mysqli_query($conexion,"SELECT * FROM usuario where email='$emailingresado'");

$fila= mysqli_num_rows($resultado);
// si el email existe
if($fila>0){

//email destinatario
$emailpara= $emailingresado;

$asunto= "Restore Password Erlete.";

$codigo= rand(10000,99999);


//variables de sesion
session_start();
$_SESSION['codigo']=$codigo;
$_SESSION['email']=$emailingresado;

echo "<script>alert('$codigo');</script>"; //Borrar al subir a la nube



$mensaje=" <html>To restore your passworod, click in the code and add it to the form <br>  <a href='".$enlace."/AOAZ/AOAZWEB/test/recuperarContraCode.php?mail=".$emailingresado."'>
<h1>".$codigo."</h1>
 </html>";



// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales
$cabeceras .= 'To: Usuario <'.$emailpara.'>' . "\r\n";
$cabeceras .= 'From: Restore password erlete <aoazdevelopers@gmail.com>' . "\r\n";
$cabeceras .= 'Cc: aoazdevelopers@gmail.com' . "\r\n";
$cabeceras .= 'Bcc: aoazdevelopers@gmail.com' . "\r\n";



//ENVIAMOS EL EMAIL
mail($emailpara, $asunto, $mensaje, $cabeceras);


echo "<p style='color:green'>The email has been sent correctly, you will recibe a verification code";
echo "<a href='".$enlace."/AOAZ/AOAZWEB/test/recuperarContraCode.php?mail=".$emailingresado."'>Click aqui</a>"; //esto solamente en local cuando no hay mail

}else{
echo "<p style='color:red'> The introduced email doesn't exist.</p>";
}


}

 ?>