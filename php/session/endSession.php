<?php

setcookie(session_name(), '', time() - 3600, '/');

if (session_status() != PHP_SESSION_NONE)
	session_destroy();
?>