<?php
	require_once("include/functions.php");
	if(!isset($_SESSION["auth"])) header("Location: ./login");

	if(isset($_GET['action'])) {
		$action = $_GET['action'];

		switch ($action) {
			case 'text':
				include "add-text.php";
				break;
			case 'image':
				include "add-image.php";
				break;
			default:
				header("Location: ./dashboard");
				break;
		}
	}
?>