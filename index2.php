<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if(!isset($_SESSION["rol"])||$_SESSION["rol"]== null){
	echo "<html> <h1>You don't have permission to load this page<h1><html>";
	die();
}
 ?>



<!DOCTYPE html>
<html>
<head>
	<title>INDEX</title>
	 <link rel="stylesheet" href="lib/css/bootstrap.min.css">

</head>
<body>
<div id="logUser">
    		<?php
    			echo "Nombre: ".$_SESSION['nombre'];
    			echo "<br>".$_SESSION['rol']."";
    			echo "&nbsp;&nbsp;<img class='rounded-circle' width=50px height=50px; src=".$_SESSION['imagen'].">"
				

    		  ?>
    		  <button id="logout">Logout</button><br><br>


</body>
</html>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script>
	
$("#logout").click(function() {
		alert("Session Closed");
		$(location).attr('href', 'logout.php');
	});
	

</script>
