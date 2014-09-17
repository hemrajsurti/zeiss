<?php
	error_reporting(E_ALL - (E_NOTICE + E_WARNING));
	session_start();
	
	// include db connect class
    require_once('./db_connect.php');
	
	// connecting to db
	$db = new DB_CONNECT();
						
	if (isset($_SESSION['user'])){
		// echo "Welcome,".$_SESSION['user']."<br /> [ <a href=\"ops_logout.php\">Logout</a> ]";
		// header("Location:ops_home.php");
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700|Archivo+Narrow:400,700" rel="stylesheet" type="text/css">
<link href="style.css" rel="stylesheet" type="text/css" media="all" />
<title>Login</title>

</head>

<body>
<h1>Welcome</h1>
<button type="button" value="Create Event" onclick="location.href = 'create_event.php';" > Create Event
</button>
<br/><br/>
<input type="button" value="View Events" />
<br/><br/>
<input type="button" value="Settings" />
<br/><br/>
</body>
</html>
