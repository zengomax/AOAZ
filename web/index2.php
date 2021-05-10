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
	<link rel="stylesheet" href="lib/css/bootstrap.min.css">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
		
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		
		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="Register.css" />
</head>
<body>
	
	<div class="bs-example">
			<nav class="navbar navbar-expand-md navbar-customclass bg-dark">
				
				<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div id="navbarCollapse" class="collapse navbar-collapse">
					<ul class="nav navbar-nav ">
						<li class="nav-item">
							<a href="#" class="nav-link">Home</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">Profile</a>
						</li>
						<li class="nav-item dropdown">
							<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Messages</a>
							<div class="dropdown-menu">
								<a href="#" class="dropdown-item">Inbox</a>
								<a href="#" class="dropdown-item">Drafts</a>
								<a href="#" class="dropdown-item">Sent Items</a>
								<div class="dropdown-divider"></div>
								<a href="#"class="dropdown-item">Trash</a>
							</div>
						</li>
					</ul>
					
					<ul class="navbar-nav ml-auto">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?php echo "&nbsp;&nbsp;<img class='rounded-circle' width=50px height=50px; src=".$_SESSION['imagen'].">"?>
							</a>
							<div class="dropdown-menu dropdown-menu-right" >
								
								<a class="dropdown-item" href="#">Edit Profile</a>
								<a class="dropdown-item" href="#">Debts</a>
								<a class="dropdown-item" href="#">Reservations</a>
								<div style="border-color:#999691" class="dropdown-divider"></div>
								<a class="dropdown-item" href="logout.php">Log Out</a>
							</div>
						</li>   
					</ul>
					
					
				</div>
			</nav>
		</div>
	

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
