<?php
	error_reporting(E_ALL - (E_NOTICE + E_WARNING));
	session_start();
	session_destroy();
	$_SESSION['user'] = NULL;
	$_SESSION['user_id'] = NULL;
	unset($_SESSION['user']);
	unset($_SESSION['restaurant_id']);
	header("Location: ops_login.php");
?>