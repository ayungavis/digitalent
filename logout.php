<?php
	require_once "include/functions.php";
	unset(
		$_SESSION['auth'],
		$_SESSION['user_id']
	);
	$_SESSION['logout'] = "You have been logged out.";
	header('location: ./login');
	die();
?>