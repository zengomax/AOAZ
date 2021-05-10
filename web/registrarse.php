<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
 <link rel="stylesheet" href="lib/css/bootstrap.min.css">

</head>
<body>


<div class="container">
  <h1 class="display-4">Registro</h1>
 

  <form id="registro" name="registro" method="POST" enctype="multipart/form-data" action="registrarse.php">

<form>
  <div class="form-group">
   Name: <input class="form-control" type="text" id="nombre" name="nombre" required="">
   Surname: <input class="form-control" type="text" id="apellido" name="apellido" required="">
   Dni: <input class="form-control" type="text" id="dni" name="dni" required pattern="^[0-9]{8,8}[A-Za-z]$">
   Email: <input class="form-control" type="email" name="email" required>
   Password: <input class="form-control" type="password" id="password" name="password" minlength="6" required>
   Repeat Password: <input class="form-control" type="password" id="passwordrep" name="password" minlength="6" required>
   Register code: <input class="form-control" type="password" id="code" name="code" placeholder="Enter register code" required>
   Birth date: <input class="form-control" type="Date" name="fecha" value required >
   Profile photo: &nbsp;&nbsp; <input id="imagen" type="file" name="imagen" onchange="mostrarImagen()"><br> <br>
  <center><img id="argazki" name="imagen"width="150"></center> <br><br><br>
   </div>
  <button type="submit" class="btn btn-primary" id="enviar">Register</button>
  <button type="clear" class="btn btn-danger">Delete</button>
  </form>
  </div>
<?php 
include ("conexion.php");
    $conexion=connectDataBase();


  if (isset($_POST['email'])){
        $nombre = $_POST["nombre"];
        $apellido= $_POST["password"];                
        $dni= $_POST["dni"];                
        $email= $_POST["email"];                
        $password= $_POST["password"];  
        $fecha=$_POST["fecha"];              
        $dir="img";
        $imagen=$_FILES['imagen']['name'];
        $archivo= $_FILES['imagen']['tmp_name'];
        $dir=$dir."/".$imagen;
        move_uploaded_file($archivo, $dir);
        $email=$_POST['email'];
        $code=$_POST['code'];
        $passwordEncriptada= password_hash($password, PASSWORD_DEFAULT);



  if($code!="erlete"){

    echo '<script type="text/javascript">alert("The register code is not valid");</script>';      



   }else{

        if($dir=="img/"){  // Si no hay foto añade una foto por defecto

            $sql="INSERT INTO usuario VALUES ('$dni','$nombre','$apellido','$fecha','$email','$passwordEncriptada','usuario','img/fotoperfil.png','ACTIVO')";

         } 
       else{
             $sql="INSERT INTO usuario VALUES ('$dni','$nombre','$apellido','$fecha','$email','$passwordEncriptada','usuario','$dir','ACTIVO')";

          }

          $motivo="REGISTRO: ".$dni."";

          
          $eurodeuda= 30;
          $sql2="INSERT INTO deudas VALUES ('','$motivo','$eurodeuda','$dni')";


      
     $ejecutar=mysqli_query($conexion, $sql);

     $ejecutar2=mysqli_query($conexion, $sql2);
    
    if(!$ejecutar || !$ejecutar2){
        echo '<script type="text/javascript">alert("Something was wrong");</script>';      
    }else{ 
        echo"The Register was complete succesfully";

    }

  }
}
  ?>

</div>
</body>
</html>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
 <script>
    
function mostrarImagen(){   //Script para mostrar la previsualización de la imagen


        
   var preview=$("#argazki")[0];
   var archivo = $("#imagen")[0].files[0];

   var leer = new FileReader();

   if(archivo){
    leer.readAsDataURL(archivo);
    leer.onloadend=function(){
      preview.src=leer.result;

    };   }
} 



$("#registro").submit(function(){



  if($("#password").val()!=$("#passwordrep").val()){
        
        alert("The passwords must match");
        return false;
      }


})








  </script>

