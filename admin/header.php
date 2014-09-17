<?php
error_reporting(E_ALL & ~E_NOTICE);
error_reporting(E_ERROR | E_PARSE);
?>
<?php
include_once('auth.php');
include_once("../includes/sqlfunctions.php");
include_once("../includes/config.php");
connectDB();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Zeiss :: Admin</title>
<link href='http://fonts.googleapis.com/css?family=Maven+Pro:400,900,700,500' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href="css/style_inner.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<link rel="stylesheet" href="css/graph.css">
<link rel="stylesheet" href="css/fluid_grid.css"> 
</head>
<body>
<div class="wrap">
<div class="content">
<a href="dashboard.php">home</a> <span> | </span> <a href="logout.php">logout</a>
<div style="height: 30px;"></div>
