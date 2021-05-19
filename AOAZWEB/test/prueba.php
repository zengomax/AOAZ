<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<h2>Erlete System| Restore your password</h2>
Dear user, to restore your password click in the link bellow and add the recived code to the form.<br>
<br>
YOUR RESTORE CODE:<h2 style="color: blue">1233</h2>
<br>
<a href='".$enlace."/AOAZ/AOAZWEB/test/recuperarpasscode.php?mail=".$emailingresado."'>RESTORE YOUR PASSWORD CLICKING HERE!</a>
<br><br><br><br>

Erlete Association | aoazdevelopers
</body>
</html>


<?php 

$mensaje="<h2>Erlete System| Restore your password</h2>
Dear user, to restore your password click in the link bellow and add the recived code to the form.<br>
<br>
YOUR RESTORE CODE:<h2 style='color: blue'>".$codigo."</h2>
<br>
<a href='".$enlace."/AOAZ/AOAZWEB/test/recuperarpasscode.php?mail=".$emailingresado."'>RESTORE YOUR PASSWORD CLICKING HERE!</a>
<br><br><br><br>

Erlete Association | aoazdevelopers";
 ?>



 	    $mail->Body    = " <html>To restore your password, click in the code and add it to the form <br>  <a href='".$enlace."/AOAZ/AOAZWEB/test/recuperarpasscode.php?mail=".$emailingresado."'><h1>".$codigo."</h1> </html>";