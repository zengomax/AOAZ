<?php
sleep(2);

include ("conexion.php");
$conexion=connectDataBase();

$dni=$_POST['dni'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$email=$_POST['email'];
$password=$_POST['password'];


        $sql="UPDATE usuario SET nombre='$nombre', apellido= '$apellido', email='$email',password= '$password' WHERE dni = '$dni'";

        $ejecutar=mysqli_query($conexion, $sql);

        if($ejecutar) {


        	echo "funciona";
        } else{

        	"no";
        }



 ?>
