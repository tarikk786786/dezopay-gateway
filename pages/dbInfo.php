<?php
error_reporting(0);
date_default_timezone_set('Asia/Kolkata');

require_once __DIR__ . '/../env_loader.php';

function connect_database() {
	$fetchType = "array";
	$dbHost = getenv('DB_HOST') ?: 'localhost';
	$dbLogin = getenv('DB_USERNAME');
	$dbPwd = getenv('DB_PASSWORD');
	$dbName = getenv('DB_NAME');
	$con = mysqli_connect($dbHost, $dbLogin, $dbPwd, $dbName);
	if (!$con) {
		die("Database Connection failed: " . mysqli_connect_errno());
	}
	return ($con);
}

// Database configuration
define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
define('DB_USERNAME', getenv('DB_USERNAME'));
define('DB_PASSWORD', getenv('DB_PASSWORD'));
define('DB_NAME', getenv('DB_NAME'));
?>