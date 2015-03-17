<?php
	
	session_start();
    
	session_destroy();
	echo "<br>";

	header('Location: login.php');
	exit;

?>