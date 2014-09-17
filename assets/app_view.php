<?php
error_reporting(E_ALL & ~E_NOTICE);
error_reporting(E_ERROR | E_PARSE);
include_once('../includes/config.php');
include_once('../includes/sqlfunctions.php');
connectDB();
$code = $_REQUEST['code'];
$app_reload_url = 'https://www.facebook.com/OpenNirvana/app_1615223755370942';
session_start();
require_once('../header.php');
$user_id = $facebook->getUser();
$level = 1;
if($user_id){
		$_SESSION['facebook_id'] = $user_id;
		$user_count = countRow($user_id,'facebook','user');
		if($user_count > 0){
			$user_exist_data = getDataRowsInArray('level','user','facebook',$user_id,'id');
			if($user_exist_data[0][0]){
				$level = $user_exist_data[0][0] + 1;
			}
		}
}



?>
<!DOCTYPE html>
<html>
<head>
    <title>Zeiss Puzzle</title>
    <link href="css/main.css" type="text/css" rel="stylesheet">
    <link href="css/animate.css" type="text/css" rel="stylesheet">
    
    <link href="css/font-awesome.min.css" type="text/css" rel="stylesheet"> 
    <script src="js/jquery-1.8.3.js"></script>
    <script src="js/jquery-ui-1.9.2.min.js"></script>
    
    <script src="js/wow.min.js"></script>
<?php
if ($level==1){
	?>
	<link href="css/puzzle1.css" type="text/css" rel="stylesheet">
	<script src="js/new_main1.js"></script>
	<?php }
	elseif($level==2) {
		?>	 
	 <link href="css/puzzle2.css" type="text/css" rel="stylesheet">
	 <script src="js/main2.js"></script>
	<?php }
	elseif($level==3) {
		?>	 
	 <link href="css/puzzle2.css" type="text/css" rel="stylesheet">
	 <script src="js/main2.js"></script>
	<?php }
	elseif($level==4) {
		?>	 
	 <link href="css/puzzle3.css" type="text/css" rel="stylesheet">
	 <script src="js/main3.js"></script>
	<?php }
	elseif($level==5) {
		?>	 
	 <link href="css/puzzle3.css" type="text/css" rel="stylesheet">
	 <script src="js/main3.js"></script>
	 <?php }?>
	 
</head>
<body>
<?php include_once('share_invite.php'); ?>
<div class="container">
	<a href="javascript:void(0)" onclick="show_share_box();">Share Score</a>
	<a href="javascript:void(0)" onclick="invite_ppl();">Invite Friends</a>
<?php
if($user_id){
	/*	$_SESSION['facebook_id'] = $user_id;
		$user_count = countRow($user_id,'facebook','user');
		if($user_count > 0){
			$user_exist_data = getDataRowsInArray('level','user','facebook',$user_id,'id');
			if($user_exist_data[0][0]){
				$level = $user_exist_data[0][0] + 1;
				echo $level;
			}
		}*/
		switch ($level) {
			case 1:
				include_once('level1.php');
			break;
			case 2:
				include_once('level2.php');
			break;
			case 3:
				include_once('level3.php');
			break;
			case 4:
				include_once('level4.php');
			break;
			case 5:
				include_once('level5.php');
			break;
			default:
				include_once('level1.php');
		}
}
else{
	include_once('level1.php');
}
?>
</div>
</body>
 

</html>