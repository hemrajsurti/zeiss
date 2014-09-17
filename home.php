<?php
include_once('includes/config.php');
include_once('includes/sqlfunctions.php');
connectDB();

$id = $_REQUEST['event_id'];
$q=mysql_fetch_array(mysql_query("select * from event where id=$id"));
	$title=$q[1];
?>
<html>
<head>
<title>Social Connect</title>
	<style type="text/css">
.wrapper{
	margin:0 auto;
	width: 980px;
}    

.body{background: #ffde00 url('images/bg_email.png');

	</style>
<script>
$(document).ready(function(){
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1615223755370942',                        		
      channelUrl : '//capsicumtechnologies.co.in/beta/zeiss/channel.php', 	
      status     : true,                                 		
      xfbml      : true                                  		
    });
  };

  (function(){

     if (document.getElementById('facebook-jssdk')) {return;}
     var firstScriptElement = document.getElementsByTagName('script')[0];
     var facebookJS = document.createElement('script');
     facebookJS.id = 'facebook-jssdk';
     facebookJS.src = '//connect.facebook.net/en_US/all.js';
     firstScriptElement.parentNode.insertBefore(facebookJS, firstScriptElement);
   }());
});
function friend_dialog_box()
	{
	        FB.ui({method: 'apprequests',
	  				message: 'My Great Request'}
					,function(response) {
					console.log(response);
					var request_id =response.request;
					var username=$('#fbUser').val();
					var user_id=$('#fbUserId').val();
                                         $.ajax({
							type:"POST",
							data:"user_id="+user_id+"&request_id="+request_id+"&username="+username,
							url:"storeRequest.php",
							success:function(msg){
							alert(msg);							
								}
						
						});
					}	
			);
	}
</script>
	<!--[if gte mso 9]>
	<style type="text/css">
     .body{background: #ffde00 url('images/bg_email.png');	     
	 .case { background:none;}
     </style>
	   <![endif]-->  
</head>
<body style="margin: 0; padding: 0;" class="body">
<div id="fb-root"></div>
<div class="wrapper">
<?php

	require_once('header.php');
     $user_id = $facebook->getUser();

?>
  <?php
    if($user_id) {

      try {
        $fql = 'SELECT name from user where uid = ' . $user_id;
        $ret_obj = $facebook->api(array(
                                   'method' => 'fql.query',
                                   'query' => $fql,
                                 ));

        echo '<br><br><center><h1>Thank You ' . $ret_obj[0]['name'] . '</h1> for event '.$title.' </center><br>';
        $user_name = $ret_obj[0]['name'];
         $p=mysql_fetch_array(mysql_query('SELECT a_fb_id from attendee where a_fb_id = ' . $user_id));
    		if ($p=="") {
        		executeQuery("insert into attendee (`a_fb_id`,`name`) values ('$user_id','$user_name')");
        	}
        echo "<center><img src=\"https://graph.facebook.com/".$user_id."/picture?type=large\"></center>";

      } catch(FacebookApiException $e) {
        
      }   
    } else {

    }

  ?>
<?php
    $friendsLists = $facebook->api('/me/friends');

    $q=mysql_fetch_array(mysql_query('SELECT a_fb_id from friends_list where a_fb_id = ' . $user_id));
    if ($q=="") {
    foreach ($friendsLists as $friends) {
      foreach ($friends as $friend) {
         $fri_id = $friend['id'];
         $fri_name = $friend['name'];
         $fri_name = htmlentities($fri_name, ENT_QUOTES);
         executeQuery("insert into friends_list (`a_fb_id`,`f_fb_id`,`name`) values ('$user_id','$fri_id','$fri_name')");
      }
   }
   }
?>

</div>
</body>
</html>