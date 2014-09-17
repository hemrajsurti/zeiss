<?php
session_start();
require_once('src/facebook.php');

  
  $config = array();
  $APP_ID = '1615223755370942';
  $APP_SECRET = '4d2bd3e5041697a6f249b0b7d7f683de';

  $config = array();
  $config["appId"] = $APP_ID;
  $config["secret"] = $APP_SECRET;
  $config["fileUpload"] = false;
  $config["cookie"] = true;
  $config["domain"]= 'capsicumtechnologies.co.in';

  $facebook = new Facebook($config);

?>