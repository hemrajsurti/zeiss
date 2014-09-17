<?php
//include_once("../includes/config.php");
	
	session_start();
	
	if(!isset($_SESSION['ADMIN_ID']) || (trim($_SESSION['ADMIN_ID']) == '')) {
		header("location: index.php?er=1");
		exit();
	}
?>