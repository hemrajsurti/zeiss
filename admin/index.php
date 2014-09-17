<?php
include_once("../includes/config.php");
connectDB();
$error=$_REQUEST['er'];
session_start();
	
if(isset($_SESSION['ADMIN_ID']) || (trim($_SESSION['ADMIN_ID']) != '')) {
	header("location: dashboard.php");
	exit();
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Zeiss :: Admin</title>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<!-- -->
<script>var __links = document.querySelectorAll('a');function __linkClick(e) { parent.window.postMessage(this.href, '*');} ;for (var i = 0, l = __links.length; i < l; i++) {if ( __links[i].getAttribute('data-t') == '_blank' ) { __links[i].addEventListener('click', __linkClick, false);}}</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>$(document).ready(function(c) {
	$('.alert-close').on('click', function(c){
		$('.message').fadeOut('slow', function(c){
	  		$('.message').remove();
		});
	});	
});
</script>
</head>
<body>

<div class="message warning">
<div class="contact-form"">
	<div class="logo">
		<h1>Sign In</h1>
	</div>	
<form class="form" action="login-exec.php" method="post" name="contact_form">
	<ul>
	<li>
	
<?php 
if($error == 1) { echo "<div class='red'>You are not registered.</div>";}
else if($error == 2) { echo "<div class='red'>Please check your username and password.</div>";}
?>
	</li>
		<li>
			 <label><img src="images/contact.png" alt=""></label>
			 <input type="text" class="text"  name="uname" />		            
		 </li>
		 <li>
			 <label><img src="images/lock.png" alt=""></label>
			 <input type="Password" name="password" />		         
		 </li>
		 <p><a href="#">Forgot Username or Password?</a></p>
		 <li class="style">
		     <input type="Submit" value="Submit">
		 </li>
	</ul>	
	<div class="clear"></div>	   	
</form>
</div>
<div class="alert-close"></div>
</div>
<div class="clear"></div>
<!--- footer - -->
<div class="footer">
	
</div>
</body>
</html>