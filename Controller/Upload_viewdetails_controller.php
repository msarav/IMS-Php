<?
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$UserID = $_SESSION['UserID'];

require_once("../Model/UploadDetails_PDO.php");
require_once("Lookup_Controller.php");

$sql_qry = "";

if(isset($_POST['interntype'))
{
	
	$sql_qry = $sql_qry." `test_val` like '".$_POST['interntype')."'";
}


if(isset($_POST['joblocation'))
{
	
	$sql_qry = $sql_qry." and `job_loc_val` like '".$_POST['joblocation')."'";
}


if(isset($_POST['country'))
{
	
	$sql_qry = $sql_qry." and `student_details.Student_Country` like '".$_POST['country')."'";
}


if(isset($_POST['batch'))
{
	
	$sql_qry = $sql_qry." and `student_details.Student_RegisteredSemester, student_details.Student_RegisteredYear ` like '".$_POST['batch')."'";
}

if(isset($_POST['gpa'))
{
	
	$sql_qry = $sql_qry." and `student_details.Student_Country` like '".$_POST['gpa')."'"; // check this
}

if(isset($_POST['skills'))
{
	
	$sql_qry = $sql_qry." and `student_skillset.skill_name` like '".$_POST['skills')."'";
}

if(isset($_POST['certification'))
{
	
	$sql_qry = $sql_qry." and `student_cerdetails.EduDetails_Cert1Title , student_cerdetails.EduDetails_Cert2Title , student_cerdetails.EduDetails_Cert3Title` like '".$_POST['certification')."'";
}

if(isset($_POST['experience'))
{
	
	$sql_qry = $sql_qry." and `preinternship_wrkexperience.WrkExp1_Duration+preinternship_wrkexperience.WrkExp2_Duration+preinternship_wrkexperience.WrkExp3_Duration+preinternship_wrkexperience.WrkExp4_Duration` like '".$_POST['experience')."'";
}

if(isset($_POST['gender'))
{
	
	$sql_qry = $sql_qry." and `student_details.Student_Gender` like '".$_POST['gender')."'";
}

if(isset($_POST['jobgroups'))
{
	
	$sql_qry = $sql_qry." and `available_interndetails.intern_jobgroup` like '".$_POST['jobgroups')."'";
}

$result_arr = obj_name-> function_test_fn($sql_qry);


// Inside model
function_test_fn($sql_qry);
{
	
	
	$Retrieved_result = Retrieve_qry("Select  * from table where $sql_qry;");

		$i =0;

		foreach ($Retrieved_result as $Rowlist)
		{
			$Student_details[$i]['Student_id'] = $Rowlist['Student_id'];
			$Student_details[$i]['Student_name'] = $Rowlist['Student_name'];
			$i++;
			
		}
		
		return $Student_details;
}


// $get_intern = $_POST['interntype'];
// $get_joblocation = $_POST['joblocation'];
// $get_country = $_POST['country'];
// $get_batch = $_POST['batch'];
// $get_gpa = $_POST['gpa'];
// $get_gpafrom = $_POST['gpafrom'];
// $get_gpato = $_POST['gpato'];
// $get_skills = $_POST['skills'];
// $get_certification = $_POST['certification'];
// $get_experience = $_POST['experience'];
// $get_gender = $_POST['gender'];
// $get_jobgroups = $_POST['jobgroups'];

// echo $get_intern.$get_joblocation.$get_country.$get_batch.$get_gpa.$get_gpafrom.$get_gpato.$get_skills.$get_certification.$get_experience.$get_gender.$get_jobgroups ;





?>