<?php 


include ("conexion.php");
    $conexion=connectDataBase();

$dni="11111111J";

 $motivo="REGISTRO: ".$dni."";
          $eurodeuda= '300';
          echo $motivo;
         $sql="INSERT INTO deudas VALUES('1','$motivo','$eurodeuda','$dni')";
       //   $sql="INSERT INTO bolsa VALUES('$eurodeuda')";


     //$ejecutar=mysqli_query($conexion, $sql) or die (mysqli_error($conexion));
     $ejecutar=mysqli_query($conexion, $sql) or die (mysqli_error($conexion));

       if(!$ejecutar){
        echo '<script type="text/javascript">alert("Something was wrong");</script>';      
    }else{ 
        echo"Registro realizado con exito";

    }

 ?>