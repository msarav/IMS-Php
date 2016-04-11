<?
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$UserID = $_SESSION['UserID'];
$ProfileType = 	$_SESSION['User Type'];
$StudentID = $_SESSION['StudentId'];

require_once("../Model/UploadDetails_PDO.php");
require_once("Lookup_Controller.php");

$Upload_StuPreIntern_Details_obj = new Student_PreIntern_details();



?>
