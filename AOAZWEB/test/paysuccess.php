<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'lib/PHPMailer/Exception.php';
require 'lib/PHPMailer/PHPMailer.php';
require 'lib/PHPMailer/SMTP.php';

  ?>
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
  
  
</body>
</html>

<?php 

if(isset($_POST['email'])){
include ("conexion.php");
$conexion=connectDataBase();

$emailsesion=$_SESSION['email'];

$resultado=mysqli_query($conexion,"SELECT * FROM usuario where email='$emailsesion'");

$fila= mysqli_num_rows($resultado);
// si el email existe
if($fila>0){

	//email destinatario
	$emailpara= $emailsesion;

	$asunto= "Restore Password Erlete.";

	$codigo= rand(10000,99999);


	//variables de sesion
	session_start();
	




	//Instantiation and passing `true` enables exceptions
	$mail = new PHPMailer(true);

	try {
	    //Server settings
	    $mail->SMTPDebug =0;                      //Enable verbose debug output
	    $mail->isSMTP();                                            //Send using SMTP
	    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
	    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
	    $mail->Username   = 'aoazdevelopers@gmail.com';                     //SMTP username
	    $mail->Password   = 'Aoazdam1';                               //SMTP password
	    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
	    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

	    //Recipients
	    $mail->setFrom('aoazdevelopers@gmail.com', 'Erlete');
	    $mail->addAddress($emailingresado);     //Add a recipient

	    //Content
	    $mail->isHTML(true);                                  //Set email format to HTML
	    $mail->Subject = 'Password Restore';
	    $mail->Body    = " <html>To restore your password, click in the code and add it to the form <br>  <a href='".$enlace."/AOAZ/AOAZWEB/test/recuperarpasscode.php?mail=".$emailingresado."'><h1>".$codigo."</h1> </html>";;

	    $mail->send();
		echo "<p style='color:green'>The email has been sent correctly, you will recibe a verification code, check your email please.";
	} catch (Exception $e) {
	    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}

}else{
	echo "<p style='color:red'> The introduced email doesn't exist.</p>";
	}
}
	
 ?>