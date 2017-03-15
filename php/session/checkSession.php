<?php

$timeout = 60 * 30; // In seconds, i.e. 30 minutes.

$fingerprint = md5($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

session_regenerate_id();
$_SESSION['last_active'] = time();
$_SESSION['fingerprint'] = $fingerprint;

if (!isset($_SESSION['last_active']) || $_SESSION['last_active'] < (time() - $timeout) ||
    !isset($_SESSION['fingerprint']) || $_SESSION['fingerprint'] != $fingerprint ||
    !isset($_SESSION['userLogined']) || $_SESSION['userLogined'] == false)
{
    setcookie(session_name(), '', time() - 3600, '/');
    $_SESSION = array();
    session_regenerate_id();
    session_destroy();

    $logined = false;
}
else {
	$logined = true;  
}
?>