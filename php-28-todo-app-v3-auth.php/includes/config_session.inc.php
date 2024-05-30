<?php

// 2 mandatory session security statements
ini_set('session.use_only_cookies',1);
ini_set('session.use_strict_mode',1);

// setting some session cookie params
session_set_cookie_params([
  'lifetime' => 1800,
  'domain' => 'localhost',
  'path' => '/',
  'secure' => true,
  'httponly' => true,
]);

session_start();

// re-generating session_id after every 30mins
if(!isset($_SESSION['user_id'])) {
  if(!isset($_SESSION['last_regenration'])) {
    regenrate_session_id();
  } else {
    $interval = 60 * 30;
  
    if($_SESSION['last_regenration'] - time() >= $interval) {
      regenrate_session_id();
    }
  }
} else {
  if(!isset($_SESSION['last_regenration'])) {
    regenrate_session_id_loggedin();
  } else {
    $interval = 60 * 30;
  
    if($_SESSION['last_regenration'] - time() >= $interval) {
      regenrate_session_id_loggedin();
    }
  }
}

function regenrate_session_id_loggedin()
{
  session_regenerate_id(true);
  // re-creating session_id after role in website changed
  $newSessionId = session_create_id();
  $sessionId = $newSessionId . "_" . $user['id'];
  session_id($sessionId);
  $_SESSION['last_regenration'] = time();
}

function regenrate_session_id()
{
  session_regenerate_id(true);
  $_SESSION['last_regenration'] = time();
}