<?php
if($_SESSION['facebook_id']) {

      try {
        $ret_obj = $facebook->api('/'.$_SESSION['facebook_id'],'GET');
        $user_name = $ret_obj['name'];
        $user_email = $ret_obj['email'];

      } catch(FacebookApiException $e) {
        print_r($e);
      }  
 }
?>
        <div class="header">
            <div class="col-1">
                <p class="wow fadeInLeftBig">
                    <span>Welcome <?php echo $user_name; ?></span>! The movement you enjoy your the quality of life.
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
                <span class="forbutton forbutton2 wow fadeInRight" data-wow-delay="0.7s"onclick="hint()">Hint</span>
            </div>
        </div>

        <div class="puzzle-body">
            <div class="puzzle">
                <!--<img src="img/img_1017.png">-->
                <div id="container">
                    <div class="dropbox"></div>
                    <button class="try-again" onclick="tryagain()">Try Again</button>
                    <button class="nextlevel" onclick="location.href = 'level5.php';">Next Level</button>
                    <div id="gamebody">
                        <div class="dropbox">
                            <img src="img/img_1016.png" />
                        </div>
                        <div class="drags">
                       		 <img src="images/image_a/1.png" class="drag drag5 wow zoomIn" data-wow-delay="0.1s" />
                            <img src="images/image_a/2.png" class="drag drag6 wow zoomIn" data-wow-delay="0.2s" />
                            <img src="images/image_a/3.png" class="drag drag1 wow zoomIn" data-wow-delay="0.3s" />
                            <img src="images/image_a/4.png" class="drag drag3 wow zoomIn" data-wow-delay="0.5s"/>
                            <img src="images/image_a/5.png" class="drag drag16 wow zoomIn" data-wow-delay="0.6s"/>
                            <img src="images/image_a/6.png" class="drag drag15 wow zoomIn" data-wow-delay="0.7s"/>
                            <img src="images/image_a/7.png" class="drag drag4 wow zoomIn" data-wow-delay="0.9s"/>
                            <img src="images/image_a/8.png" class="drag drag7 wow zoomIn" data-wow-delay="1s"/>
                            <img src="images/image_a/9.png" class="drag drag8 wow zoomIn" data-wow-delay="1.1s"/>
                            <img src="images/image_a/10.png" class="drag drag10 wow zoomIn" data-wow-delay="1.3s"/>
                            <img src="images/image_a/11.png" class="drag drag13 wow zoomIn" data-wow-delay="1.4s"/>
                            <img src="images/image_a/12.png" class="drag drag9 wow zoomIn" data-wow-delay="1.5s"/>
                            <img src="images/image_a/13.png" class="drag drag2 wow zoomIn" data-wow-delay="1.3s"/>
                            <img src="images/image_a/14.png" class="drag drag11 wow zoomIn" data-wow-delay="1.4s"/>
                            <img src="images/image_a/15.png" class="drag drag12 wow zoomIn" data-wow-delay="1.5s"/>
									 <img src="images/image_a/16.png" class="drag drag18 wow zoomIn" data-wow-delay="1.3s"/>
                            <img src="images/image_a/17.png" class="drag drag14 wow zoomIn" data-wow-delay="1.4s"/>
                            <img src="images/image_a/18.png" class="drag drag17 wow zoomIn" data-wow-delay="1.5s"/>

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
                        <div class="drops drop13">
                        </div>
                        <div class="drops drop14">
                        </div>
                        <div class="drops drop15">
                        </div>
                        <div class="drops drop16">
                        </div>
                        <div class="drops drop17">
                        </div>
                        <div class="drops drop18">
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
                    <strong id="level">4</strong>
                </p>
            </div>
            <div class="col col2">
                <img src="img/img_1016.png" id="ac_img" style="display:none;"style="display:none;" class="puzzle new wow zoomInDown" data-wow-delay="1.4s" data-wow-duration="2s">
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
                 <p class="wow fadeInRight " data-wow-delay="1.8s">Points:
                    <br>
                    <strong id="points">0</strong>
                </p>
            </div>
           
            <div class="lenses">
                <img src="img/lense.png" class="wow flipInY" data-wow-delay="1.2s" >
            </div>
            <div class="logo">
                <img src="img/logo.png" class="wow fadeInRight" data-wow-delay="1.4s">
            </div>
        </div>
