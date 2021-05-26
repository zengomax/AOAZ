<?php 
//formulario para cambiar la contraseña

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if(!isset($_SESSION["rol"])||$_SESSION["rol"]== null){
	echo "<html> <marquee><h1>You don't have permission to load this page.<h1></marquee><html>";
	die();
}
sleep(1); //Tiempo de espera para cargar la pagina
 ?>
<br>
<form>
<label>Old Password:<input type="password" name="passwordvieja" id="passwordvieja" placeholder="Please insert your old password" ></label><br>
<label>Password:<input type="password" name="password" id="passwordintroducida" placeholder="Please insert your new password"></label><br>
<label>Repeat Password:<input type="password" name="passwordrep" id="passwordrep" placeholder="Please insert again your new password"></label><br><br>
 <input type="button" class="btn btn-info" id="buton" value="Change Password"/>

</form>
<?php 

if(isset($_POST['passwordvieja'])){

$passwordvieja=$_POST['passwordvieja'];
$password=$_POST['password'];
$passwordrep=$_POST['passwordrep'];
$dni=$_SESSION['dni'];
include ("conexion.php");
$conexion=connectDataBase();

$passwordEncriptada= password_hash($password, PASSWORD_DEFAULT); //comprueba si la contraseña introducida es igual a la cifrada



$resultado=mysqli_query($conexion,"SELECT * FROM usuario WHERE dni='$dni'");


$imprimir= mysqli_fetch_array($resultado);


if(password_verify($passwordvieja,$imprimir['password'])==true){ //si la contraseña coincide realiza el update de la password

$update=mysqli_query($conexion,"UPDATE usuario SET password='$passwordEncriptada'WHERE dni='$dni'");

if(!$update){

	echo "Something was wrong";
} else{

	echo "Password changed succesfully";
}
	
	}else{

		echo "<br><br>The introduced password is not correct";
	}
}


 ?>