<?php
include_once("../includes/config.php");
	session_start();

	unset($_SESSION['ADMIN_ID']);
	unset($_SESSION['ADMIN_NAME']);

closeDB();
?>
<?php
header('Location: index.php');
?>
