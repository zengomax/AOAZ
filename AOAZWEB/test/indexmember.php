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
		<link rel="shortcut icon" href="img/ico.png">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

	footer {
  				text-align: center;
 				padding: 3px;
  				background-color: #828282;
  				color: white;
			}
			.fa {
			  padding: 10px;
			  font-size: 30px;
			  margin: auto;
			  text-decoration: none;
			  margin: 5px 2px;
			  border-radius: 80%;
			}

			.fa:hover{
			    opacity: 0.7;
			}

			.fa-facebook {
			  background: #3B5998;
			  color: white;
			}
			.fa-twitter {
			  background: #55ACEE;
			  color: white;
			}

			.fa-youtube {
			  background: #bb0000;
			  color: white;
			}

			.fa-instagram {
			  background: #125688;
			  color: white;
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

<div style="background-color: #ffd966;" >
	
	<h1><b>Honey Bee Society Structure and Organization</b></h1>

</div>
<div style="background-color: #ffd966;">
		<p>The bee society is consisted of the queen (which is the only sexually developed female), the worker bees and the drones. Each colony has only one queen. The primary purpose of queen is to reproduce. The queen mates only once or twice in her life (but with multiple drones), and the mating takes place during her first days. After mating in the air with the drones, she stores the drones’ sperm in a special area of her body and can lay eggs for the rest of her life (3-5 years). The queen’s second purpose is to organize and motivate (through pheromones) workers to complete the workload of the hive. Workers (sexually underdeveloped females) are responsible for nearly all the required heavy work of the hive. This means guarding the hive, comb building, caring for the queen, cleaning, polishing, feeding the brood, storing, collecting nectar, pollen and water, chewing the nectar and transform it to honey through enzymes, adjusting the temperature inside the hive by fanning with their wings and many more. The sole purpose of drones is to fertilize virgin queens. Drones do not have a sting, thus they cannot even guard the hive against intruders. They do not participate in any other operation of the colony other than mating with virgin queens.</p>
		<br>
		<iframe width="560" height="315" src="https://www.youtube.com/embed/xE2V8etxOeg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		<br>
		<br>
		<p>The queen is larger in size than the drone and double in size than the workers. A beekeeper can easily spot the queen: Apart from its different size, shape and color, the other worker bees often surround the queen at a small distance, showing respect and allowing her the proper space to walk without problems. They can also feed her in the mouth with royal jelly during brood rearing (mainly in the spring). During the rest of the year, they offer pollen and honey mixture to the queen. The average queen lives 3-5 years, but can lay eggs at good rate (200.000 eggs per year) during the first 2-3 years of its life. It is very important to have a young and thriving queen in our hive (preferably up to 2 years old). A queen can lay fertile or unfertile eggs. Unfertile eggs become drones, while fertile eggs become workers or new queens.</p>

	</div>
	<div style="background-color: #ffd966;" >
	
	<h1><b>How do bees produce Honey?</b></h1>

	</div>
	<div style="background-color: #ffd966;" >
	
	<p>Worker bees (who account for at least 98% of the beehive population) are the ones that produce honey under a complicated procedure. A great number of worker bees are necessary; no single honeybee can produce honey without the other members of the team. In a few words, “transport bees” suck the nectar out of flowers and they store it in their second special stomach (designed especially for storing honey) while they fly back to the hive. Once they arrive at the hive, they deliver the nectar to the “chewing” bees. The chewing bees collect the nectar and they chew it for about 30 minutes. During the chewing, enzymes are transforming nectar into a substance that contains honey along with water. After chewing, the worker bees diffuse the substance into honeycombs, so that the water can evaporate, making the honey less watery. Water evaporation is accelerated as other bees fan it with their wings. When the honey production has finished, other bees are responsible for sealing the cells of honeycombs with wax, so that the product is protected.</p>
<p>
Bees produce and store their products (honey, royal jelly, propolis, etc.) for their own use. They can survive eating honey during winter and other periods when pollen is not available. Beekeepers actually “steal” a portion of this emergency stock, when they harvest honey. But if harvesting is done rationally, bees will counter produce and deputize the honey quantity taken from humans, and they will continue their lifecycle without further problems.</p>

	</div>




</div>


</div>
<!--Footer-->
<div style="width: 100%">
	<footer>
		Email:aoazdevelopers@gmail.com<br>
		Telf:654389234
		<br>
		<a href="#" class="fa fa-facebook"></a>
		<a href="#" class="fa fa-twitter"></a>
		<a href="#" class="fa fa-youtube"></a>
		<a href="#" class="fa fa-instagram"></a>
		<p>&copy; 2021 Erlete.com</p>
	</footer>	

</div>









<!--ends text-->

	

    		


</body>
</html>





<script>
	
$("#close").click(function() {
		alert("Session Closed");
		$(location).attr('href', 'logout.php');
	});
	

</script>
