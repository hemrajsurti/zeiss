<?php
require_once('header.php');

$id = $_REQUEST['event_id'];

  $params = array(
        'scope' => 'public_profile,user_friends,email',
        'redirect_uri' => 'https://in10.hostgator.in/~capsicum/beta/zeiss/assets/app_view.php',
  );

header("Location:{$facebook->getLoginUrl($params)}");



?>