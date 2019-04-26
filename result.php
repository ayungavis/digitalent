<?php
	require_once("include/functions.php");
	if(!isset($_SESSION["auth"])) header("Location: ./login");

	if(isset($_GET['get'])) {
		$action = $_GET['get'];

		switch ($action) {
			case 'text':
				include "result-text.php";
				break;
			case 'image':
				include "result-image.php";
				break;
			default:
				header("Location: ./dashboard");
				break;
		}
	}
?>