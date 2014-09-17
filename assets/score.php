<?php
include_once('../includes/config.php');
include_once('../includes/sqlfunctions.php');
connectDB();
session_start();
	
if(isset($_SESSION['facebook_id']) || (trim($_SESSION['facebook_id']) != '')) {
	//header("location: dashboard.php");
	$user_id = $_SESSION['facebook_id'];
	}
	
$points = $_POST['postpoints'];
$level = $_POST['postlevel'];
echo $level;
executeQuery("update user set `points`='$points',`level`='$level' where facebook=$user_id");
?>


<?php
/*
$points = $_POST['postpoints'];

executeQuery("update user set `level`='$level',`score`='$score' where facebook=$user_id");

//executeQuery("update user set `level`='$level',`score`='$score' where facebook=$user_id");
*/
?>