<?php
//con esto generamos un json con los datos de las reservas para mostrarlas en el calendario
include ("conexion.php");
$conexion=connectDataBase();

   header('Content-Type: aplication/json');

$pdo=new PDO("mysql:dbname=erlete;host=localhost","root","");


$sql= $pdo-> prepare("SELECT * FROM calendario");

$sql->execute();

$resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($resultado);



?>     
     