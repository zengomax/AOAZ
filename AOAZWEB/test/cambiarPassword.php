<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if(!isset($_SESSION["rol"])||$_SESSION["rol"]== null){
	echo "<html> <marquee><h1>You don't have permission to load this page.<h1></marquee><html>";
	die();
}

sleep(0.5);
 ?>
<br>
<form>
<label>Old Password:<input type="password" name="passwordvieja" id="password" placeholder="Please insert your old password" ></label><br>
<label>Password:<input type="password" name="password" id="password" placeholder="Please insert your new password"></label><br>
<label>Repeat Password:<input type="password" name="passwordrep" id="password" placeholder="Please insert again your new password"></label><br><br>
 <input type="button" class="btn btn-info" id="buton" value="Change Password"/>

</form>
<?php 

if(isset($_POST['password'])){

$passwordvieja=$_POST['passwordvieja'];
$password=$_POST['password'];
$passwordreps=$_POST['passwordrep'];


echo $passwordvieja;
echo $passwordvieja;
echo $passwordvieja;


}


 ?>