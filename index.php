<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
	include_once("/var/www/html/LFS/controller/Controller.php");

	$controller = new Controller();
	$controller->invoke();

?>
