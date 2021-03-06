<?php
error_reporting(E_ALL & ~E_NOTICE);
error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Zeiss Puzzle</title>
    <link href="css/main.css" type="text/css" rel="stylesheet">
    <link href="css/animate.css" type="text/css" rel="stylesheet">
    <link href="css/puzzle.css" type="text/css" rel="stylesheet">
    <link href="css/font-awesome.min.css" type="text/css" rel="stylesheet">

    <script src="js/jquery-1.8.3.js"></script>
    <script src="js/jquery-ui-1.9.2.min.js"></script>
    <script src="js/main1.js"></script>
    <script src="js/wow.min.js"></script>
    <script>
     showImg() =  function  {
            document.getElementById("ac_img").style.display = "";
        }
</script>

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

</head>
<?php

	require_once('../header.php');
     $user_id = $facebook->getUser();

?>
<body>
    <div class="container">
        <div class="header">
            <div class="col-1">
                <p class="wow fadeInLeftBig">
                    The movement you enjoy your the quality of life.
                </p>
                <p class="wow fadeInLeftBig" data-wow-delay="0.2s"><strong>
                ZEISS single vision lenses.
            </strong>
                </p>
            </div>
            <div class="col-2">
                <a class="button wow fadeInRightBig" data-wow-delay="0.4s"><i class="fa fa-trophy"></i></a>
                
                <a class="button wow fadeInRightBig" data-wow-delay="0.5s"><i class="fa fa-info"></i></a>
                <span class="forbutton wow fadeInRight" data-wow-delay="0.7s">Leaderboard</span>
                <span class="forbutton forbutton2 wow fadeInRight" data-wow-delay="0.7s" onclick="showImg()">Hint</span>
            </div>
        </div>

        <div class="puzzle-body">
            <div class="puzzle">
                <!--<img src="img/puzzle.png">-->
                <div id="container">
                    <div class="dropbox"></div>
                    <button class="try-again" onclick="tryagain()">// Try Again</button>
                    <button class="nextlevel" onclick="nextlevel()">// Next Level</button>
                    <div id="gamebody">
                        <div class="dropbox">
                            <img src="img/imagec/imgc.png" />
                        </div>
                        <div class="drags">
                            <img src="images/imagec/1.png" class="drag drag5 wow zoomIn" data-wow-delay="0.1s" />
                            <img src="images/imagec/2.png" class="drag drag6 wow zoomIn" data-wow-delay="0.2s" />
                            <img src="images/imagec/3.png" class="drag drag1 wow zoomIn" data-wow-delay="0.3s" />
                            <img src="images/imagec/4.png" class="drag drag3 wow zoomIn" data-wow-delay="0.5s"/>
                            <img src="images/imagec/5.png" class="drag drag16 wow zoomIn" data-wow-delay="0.6s"/>
                            <img src="images/imagec/6.png" class="drag drag15 wow zoomIn" data-wow-delay="0.7s"/>
                            <img src="images/imagec/7.png" class="drag drag4 wow zoomIn" data-wow-delay="0.9s"/>
                            <img src="images/imagec/8.png" class="drag drag7 wow zoomIn" data-wow-delay="1s"/>
                            <img src="images/imagec/9.png" class="drag drag8 wow zoomIn" data-wow-delay="1.1s"/>
                           

                        </div>
                        <div class="drops drop1 wow fadeIn" data-wow-delay="1.1s">
                        </div>
                        <div class="drops drop2">
                        </div>
                        <div class="drops drop3">
                        </div>
                        <div class="drops drop4 wow fadeIn" data-wow-delay="1.1s">
                        </div>
                        <div class="drops drop5">
                        </div>
                        <div class="drops drop6">
                        </div>
                        <div class="drops drop7">
                        </div>
                        <div class="drops drop8">
                        </div>
                        <div class="drops drop9">
                        </div>
                        <div class="drops drop10">
                        </div>
                        <div class="drops drop11">
                        </div>
                        <div class="drops drop12">
                        </div>
                        <div class="drops drop13 wow fadeIn" data-wow-delay="1.1s" >
                        </div>
                        <div class="drops drop14">
                        </div>
                        <div class="drops drop15">
                        </div>
                        <div class="drops drop16 wow fadeIn" data-wow-delay="1.1s">
                        </div>
                    </div>
                </div>

            </div>
            <div class="play-btn" style="display:none;">
                <p>play again
                    <br>next level</p>
            </div>
        </div>

        <div class="footer">
            <div class="col col1">
                <p class="wow fadeInLeft " data-wow-delay="1.2s">Level:
                    <br>
                    <strong id="level">1</strong>
                </p>
            </div>
            <div class="col col2">
                <img id="ac_img" src="img/puzzle.png" class="puzzle new wow zoomInDown" data-wow-delay="1.4s" data-wow-duration="2s">
                <p  class="wow fadeInLeft " data-wow-delay="1.4s">The actual image
                    <br>
                    <strong>with ZEISS lens.</strong>
                </p>
            </div>
            <div class="col col3"  >
                <p class="wow fadeInRight " data-wow-delay="1.8s">Timer:
                    <br>
                    <strong id="clock">0</strong>
                </p>
            </div>
            <div class="lenses">
                <img src="img/lense.png" class="wow flipInY" data-wow-delay="1.2s" >
            </div>
            <div class="logo">
                <img src="img/logo.png" class="wow fadeInRight" data-wow-delay="1.4s">
            </div>
        </div>
    </div>
 



</body>

</html>