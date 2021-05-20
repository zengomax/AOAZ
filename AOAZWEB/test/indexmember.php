<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//esto copiarlo en todas las de usuario.
if(!isset($_SESSION["rol"])||$_SESSION["rol"]== null||$_SESSION["rol"]!= 'usuario'){
	echo "<html> <marquee><h1>You don't have permission to load this page.<h1></marquee><html>";
	die();
}
 ?>




<!DOCTYPE html>
<html>
<head>
	<title>INDEX</title>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
		
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		
		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

		<style type="text/css" media="screen">

			 body{
				  margin: auto;
				  padding: 0;
				  font-family: sans-serif;
				  background: #FFB133;
				}
				.navbar-customclass .navbar-nav .nav-link{
					  color:#ff8c00;
					}

			#close:hover{

				background-color: #DE2424;
				border-radius:5px;
			}

			#profile:hover{
				background-color: #1A9516;
			}


			.slide {
				position: relative;
				box-shadow: 0px 1px 6px rgba(0, 0, 0, 0.64);
				margin-top: 26px;
			}

			.slide-inner {
				position: relative;
				overflow: hidden;
				width: 100%;
				height: calc( 450px + 3em);
			}

			.slide-open:checked + .slide-item {
				position: static;
				opacity: 100;
			}

			.slide-item {
				position: absolute;
				opacity: 0;
				-webkit-transition: opacity 0.6s ease-out;
				transition: opacity 0.6s ease-out;
			}

			.slide-item img {
				display: block;
				height: auto;
				max-width: 100%;
			}

			.slide-control {
				background: rgba(0, 0, 0, 0.28);
				border-radius: 50%;
				color: #fff;
				cursor: pointer;
				display: none;
				font-size: 40px;
				height: 40px;
				line-height: 35px;
				position: absolute;
				top: 50%;
				-webkit-transform: translate(0, -50%);
				cursor: pointer;
				-ms-transform: translate(0, -50%);
				transform: translate(0, -50%);
				text-align: center;
				width: 40px;
				z-index: 10;
			}

			.slide-control.prev {
				left: 2%;
			}

			.slide-control.next {
				right: 2%;
			}

			.slide-control:hover {
				background: rgba(0, 0, 0, 0.8);
				color: #aaaaaa;
			}

			#slide-1:checked ~ .control-1,
			#slide-2:checked ~ .control-2,
			#slide-3:checked ~ .control-3 {
				display: block;
			}

			.slide-indicador {
				list-style: none;
				margin: 0;
				padding: 0;
				position: absolute;
				bottom: 2%;
				left: 0;
				right: 0;
				text-align: center;
				z-index: 10;
			}

			.slide-indicador li {
				display: inline-block;
				margin: 0 5px;
			}

			.slide-circulo {
				color: #828282;
				cursor: pointer;
				display: block;
				font-size: 35px;
			}

			.slide-circulo:hover {
				color: #aaaaaa;
			}

			#slide-1:checked ~ .control-1 ~ .slide-indicador li:nth-child(1) .slide-circulo,
			#slide-2:checked ~ .control-2 ~ .slide-indicador li:nth-child(2) .slide-circulo,
			#slide-3:checked ~ .control-3 ~ .slide-indicador li:nth-child(3) .slide-circulo {
				color: #428bca;
			}

			#titulo {
				width: 100%;
				position: absolute;
				padding: 0px;
				margin: 0px auto;
				text-align: center;
				font-size: 27px;
				color: rgba(255, 255, 255, 1);
				font-family: 'Open Sans', sans-serif;
				z-index: 9999;
				text-shadow: 0px 1px 2px rgba(0, 0, 0, 0.33), -1px 0px 2px rgba(255, 255, 255, 0);
			}
		</style>
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
							<a href="indexmember.php" class="nav-link">Home</a>
						</li>
						<li class="nav-item">
							<a href="reserva.php" class="nav-link">Make a booking</a>
						</li>
						
					</ul>
					
					<ul class="navbar-nav ml-auto">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?php echo "&nbsp;&nbsp;<img class='rounded-circle' width=50px height=50px; src=".$_SESSION['imagen'].">"?>
							</a>
							<div class="dropdown-menu dropdown-menu-right" >
								
								<a class="dropdown-item" id="profile" href="profile.php">Edit Profile</a>
								<a class="dropdown-item" href="debts.php">Debts</a>
								<a class="dropdown-item" href="managebooking.php">Reservations</a>
								<div style="border-color:#999691" class="dropdown-divider"></div>
								<a class="dropdown-item" id="close" href="logout.php">Log Out &nbsp; <img src="img/exit.png" style="width:20px;height: 17px" /></a>
							</div>
						</li>   
					</ul>
					
					
				</div>
			</nav>
		</div>


<!-- Ends nav bar-->

<!-- Starts carrousel-->
<div class="container">
<div class="slide">
			<div class="slide-inner">
				<input class="slide-open" type="radio" id="slide-1" name="slide" aria-hidden="true" hidden="" checked="checked">
				<div class="slide-item">
					<img src="img/c2.jpg">
				</div>
				<input class="slide-open" type="radio" id="slide-2" name="slide" aria-hidden="true" hidden="">
				<div class="slide-item">
					<img src="img/c1.jpg">
				</div>
				<input class="slide-open" type="radio" id="slide-3" name="slide" aria-hidden="true" hidden="">
				<div class="slide-item">
					<img src="img/c3.jpg">
				</div>
				<label for="slide-3" class="slide-control prev control-1">‹</label>
				<label for="slide-2" class="slide-control next control-1">›</label>
				<label for="slide-1" class="slide-control prev control-2">‹</label>
				<label for="slide-3" class="slide-control next control-2">›</label>
				<label for="slide-2" class="slide-control prev control-3">‹</label>
				<label for="slide-1" class="slide-control next control-3">›</label>
				<ol class="slide-indicador">
					<li>
						<label for="slide-1" class="slide-circulo">•</label>
					</li>
					<li>
						<label for="slide-2" class="slide-circulo">•</label>
					</li>
					<li>
						<label for="slide-3" class="slide-circulo">•</label>
					</li>
				</ol>
			</div>
		</div>





<!-- Ends carrousel-->


<!--starts text--><br>
<div style="background-color: #ffd966;" >
	
	<h1><b>The thick gold</b></h1>

</div>
<div style="background-color: #ffd966;">
		dbfbsbfbh<br>
		dokfopsjkf<br>
		dfkdfk<br>
		dfkodkfpjk

	</div>








<!--ends text-->

	

    		
</div>

</body>
</html>





<script>
	
$("#close").click(function() {
		alert("Session Closed");
		$(location).attr('href', 'logout.php');
	});
	

</script>
