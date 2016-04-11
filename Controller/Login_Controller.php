<?
session_start();

include("../Model/Users_PDO.php");

if(isset($_POST['login_submit']) || isset($_SESSION['Logged in']))
{
	if(!isset($_SESSION['Logged in']))
	{
		$Useremail =  trim($_POST['inputEmail']);
		$Password =  trim($_POST['inputPassword']);

		$Login_result = Login_Check($Useremail,$Password);

		if($Login_result == "Matched")
		{
			$User_ID = Retrieve_UserID($Useremail,$Password);
			$Profile_type = Profile_Check($User_ID);
      $Student_id = Retrieve_StudentId($User_ID);
      $User_Email = Retrieve_EmailAddr($User_ID);
			$User_Fname = Retrieve_FirstName($User_ID);
			$User_Lname = Retrieve_lastName($User_ID);

			$_SESSION['UserID'] = $User_ID;
			$_SESSION['User Name'] = Retrieve_UserFullName($User_ID);
			$_SESSION['User email'] = $User_Email;
			$_SESSION['User Type'] = $Profile_type;
			$_SESSION['StudentId'] = $Student_id;
			$_SESSION['User_Fname'] = $User_Fname;
			$_SESSION['User_Lname'] = $User_Lname;

			//$_SESSION['ProfileImg'] = Retrieve_UserProfileImg($User_ID);

			$_SESSION['Logged in'] = true;

			include("../View/Dashboard.php");


		}
		elseif($Login_result == "Multiple")
		{
			$User_ID = Retrieve_UserID($Useremail,$Password);

		}
		else
		{
			$_SESSION["validation_alert"] = "Wrong Credentials";

			header('Location: ../index.php');
		}
	}
	else
	{
		include("../View/Dashboard.php");

	}
}
else
{
	// echo "inside Logout page";

	$_SESSION["validation_alert"] = "Kindly login..";

	// session_destroy();

	header('Location: ../index.php');

}

?>
