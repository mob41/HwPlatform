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
	$respJson->code = -1;
	$respJson->desc = "No username or password specified.";
	die(json_encode($respJson));
}

$result = $conn->query("SELECT user, pass FROM " + $GLOBALS['DB_TABLE_USERS']);

if ($users->num_row == 0){
	$respJson->code = -2;
	$respJson->desc = "No users in the database.";
	die(json_encode($respJson));
}

$validated = false;
$pwdHash = hash('sha512', $pass);
while ($usrRow = $users->fetch_assoc()){
	if ($usrRow["user"] === $user){
		validated = $usrRow["pass"] === $pwdHash;
		break;
	}
}

if (!validated){
	$respJson->code = -3;
	$respJson->desc = "Username or password incorrect";
	die(json_encode($respJson));
}


?>