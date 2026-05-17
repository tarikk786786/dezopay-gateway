
<?php
error_reporting(0);
date_default_timezone_set('Asia/Kolkata');

function connect_database() {
	$fetchType = "array";
	$dbHost = "localhost";
	$dbLogin = "u740980038_SQL";
	$dbPwd = "Raushan7x@@@";
	$dbName = "u740980038_SQL";
	$con = mysqli_connect($dbHost, $dbLogin, $dbPwd, $dbName);
	if (!$con) {
		die("Database Connection failed: " . mysqli_connect_errno());
	}
	return ($con);
}

// Database configuration
define('ADMIN_TOKEN', '4f4f2d5860edb2ee76ba899d3b63bd02');
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'u740980038_SQL');
define('DB_PASSWORD', 'Raushan7x@@@');
define('DB_NAME', 'u740980038_SQL');
?>