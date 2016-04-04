<?
	session_start();

	$_SESSION["validation_alert"] = "Logged out successfully";

	header('Location: ../index.php');


?>
