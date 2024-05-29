<?php

// 2 mandatory statements for secure session usage
ini_set('session.use_only_cookies', 1); // restricted session_id access to only cookies
ini_set('session.use_strict_mode', 1); // more secure

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
  if(!isset($_SESSION["last_regeneration"])) {
    regerate_session_id();
  } 
  else {
    $interval = 60 * 30;
    if((time() - $_SESSION["last_regeneration"]) >= $interval) { // 30mins have passed
      regerate_session_id();
    }
  }
} else {
  if(!isset($_SESSION["last_regeneration"])) {
    regerate_session_id_loggedin();
  } 
  else {
    $interval = 60 * 30;
    if((time() - $_SESSION["last_regeneration"]) >= $interval) { // 30mins have passed
      regerate_session_id_loggedin();
    }
  }
}

function regerate_session_id_loggedin() {
  session_regenerate_id(); // it is much more secure session_id then the original one
  $newSessionId = session_create_id();
  $sessionId = $newSessionId . "_" . $_SESSION['user_id'];
  session_id($sessionId);
  $_SESSION["last_regeneration"] = time();
}

function regerate_session_id() {
  session_regenerate_id(); // it is much more secure session_id then the original one
  $_SESSION["last_regeneration"] = time();
}