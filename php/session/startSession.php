<?php

$fingerprint = md5($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);

session_start();
$_SESSION['last_active'] = time();
$_SESSION['fingerprint'] = $fingerprint;
$_SESSION['userLogined'] = true;

$_SESSION['username'] = $source['real_name'];
?>