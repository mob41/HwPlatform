<?php
//Includes the configuration
include 'config.php';

$conn = new mysqli($GLOBALS['DB_HOST'] . ":" .  $GLOBAL['DB_PORT'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASS']);

if ($conn->connect_error){
	die("Error! Connection to database failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die("The HwPlatform API must be accessed using POST!");
}

$user = $_POST['user'];
$pass = $_POST['pass'];

$respJson->platformName = $GLOBALS['PLATFORM_NAME'];

if (is_null($user) || is_null($pass)){
	$respJson->error = -1;
	$respJson->errorDesc = "No username or password specified.";
	die(json_encode($respJson));
}
?>