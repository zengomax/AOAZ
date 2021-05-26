<?php

//Para editar datos del resto de usuarios siendo admin 
sleep(2);

include ("conexion.php");
$conexion=connectDataBase();

$dni=$_POST['dni'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$email=$_POST['email'];
$password=$_POST['password'];

		$passwordEncriptada= password_hash($password, PASSWORD_DEFAULT); //encriptamos la contraseña

        $sql="UPDATE usuario SET nombre='$nombre', apellido='$apellido', email='$email',password='$passwordEncriptada' WHERE dni='$dni'";

        $ejecutar=mysqli_query($conexion, $sql); //insertamos los datos en la base de datos

        if($ejecutar) {


        	echo "Data changed succesfully";
        } else{

        	"Something was wrong";
        }



 ?>
