<?php
error_reporting(E_ALL - (E_NOTICE + E_WARNING));

$username = $_POST['username']; //Set UserName
$password = $_POST['password']; //Set Password

if(isset($_POST['username'])) {
	require_once('./db_connect.php');
	
	// connecting to db
	$db = new DB_CONNECT();
	
	// get a product from reviews table
    $result = mysql_query("SELECT * FROM tbl_users WHERE username = '$username' AND password = '$password'");
	try {
		if (!empty($result) && mysql_num_rows($result) > 0) {
			// Successfully Logged in
			$row = mysql_fetch_row($result);
			session_start();
			$_SESSION['user']=$username;
			$_SESSION['user_id']=$row[0];
			header("Location:home.php");
		} else {
			// -1 for login failed
			header("Location:./login.php?success=-1");
		}
	} catch(Exception $exception){
		// to handle error
		echo "Error: " . $exception->getMessage();
	}
} else {
	// -100 for field missing
	header("Location:./login.php?success=-100");
}
?>