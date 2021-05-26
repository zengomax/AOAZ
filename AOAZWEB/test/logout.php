<?php

	session_start();
	session_destroy();	
    echo "<script language=Javascript> location.href=\"index.php\"; </script>";

    //destruye las sesiones y vamos a index
?>