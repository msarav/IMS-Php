<?
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$UserID = $_SESSION['UserID'];

require_once("../Model/UploadDetails_PDO.php");
require_once("Lookup_Controller.php");

$Upload_StuPreIntern_Details_obj = new Student_PreIntern_details();


if(isset($_POST['Upload_StuPreIntern_form']))
{

// echo "inside submit";
$Student_id = $_POST['Student_id'];

$Student_chk_from_Stu_details = Check_Student_id_StuDetails($Student_id);
$Student_chk_from_Edu_details = Check_Student_id_EduDetails($Student_id);
$Student_chk_from_Cert_details = Check_Student_id_CertDetails($Student_id);
$Student_chk_from_WrkExp_details = Check_Student_id_WrkexpDetails($Student_id);
$Student_chk_from_Skill_details = Check_Student_id_SkillDetails($Student_id);

if((isset($_POST['Tech_skills']))){
	$TechSkill_set_arr = retrieve_EntireSkillset($_POST['Tech_skills']);
}
else {
	echo "Else part";
	$TechSkill_set_arr = NULL;
}

if((isset($_POST['CMS_skills']))){
	$CMSSkill_set_arr = retrieve_EntireSkillset($_POST['CMS_skills']);
}
else {
	$CMSSkill_set_arr = NULL;
}

if((isset($_POST['OS_skills']))){
	$OSSkill_set_arr = retrieve_EntireSkillset($_POST['OS_skills']);
}
else {
	$OSSkill_set_arr = NULL;
}

if((isset($_POST['Tech_skills_other'])) && strlen($_POST['Tech_skills_other']) >0 ){
	$Other_Techskills = explode(",", $_POST['Tech_skills_other']);
	$Other_Techskills = add_OtherSkillset($Other_Techskills,"Technical");
}
else {
	# code...
	$Other_Techskills = NULL;
}

if((isset($_POST['CMS_skills_other']))  && strlen($_POST['CMS_skills_other']) >0  ){
	$Other_CMSskills = explode(",", $_POST['CMS_skills_other']);
	$Other_CMSskills = add_OtherSkillset($Other_CMSskills,"CMS");
}
else {
	# code...
	$Other_CMSskills = NULL;
}

if((isset($_POST['OS_skills_other']))  && strlen($_POST['OS_skills_other']) >0  ){
	$Other_OSskills = explode(",", $_POST['OS_skills_other']);
	$Other_OSskills = add_OtherSkillset($Other_OSskills,"OS");

}
else {
	# code...
	$Other_OSskills = NULL;
}


if( (isset($Other_Techskills)) && (isset($Other_CMSskills)) && (isset($Other_OSskills)) ){
	$Other_Skill_list = array_merge($Other_Techskills, $Other_CMSskills, $Other_OSskills);
  asort($Other_Skill_list);
}
elseif( (isset($Other_Techskills)) && (isset($Other_CMSskills))){
	$Other_Skill_list = array_merge($Other_Techskills, $Other_CMSskills);
  asort($Other_Skill_list);
}
elseif( (isset($Other_CMSskills)) && (isset($Other_OSskills))){
	$Other_Skill_list = array_merge($Other_CMSskills, $Other_OSskills);
  asort($Other_Skill_list);
}
elseif( (isset($Other_Techskills)) && (isset($Other_OSskills))){
	$Other_Skill_list = array_merge($Other_Techskills, $Other_OSskills);
  asort($Other_Skill_list);
}
elseif( (isset($Other_Techskills))){
	$Other_Skill_list = array_merge($Other_Techskills);
  asort($Other_Skill_list);
}
elseif( (isset($Other_CMSskills))){
	$Other_Skill_list = array_merge($Other_CMSskills);
  asort($Other_Skill_list);
}
elseif((isset($Other_OSskills))){
	$Other_Skill_list = array_merge($Other_OSskills);
  asort($Other_Skill_list);
}
else {
	# code...
	$Other_Skill_list = NULL;
}


if( (isset($TechSkill_set_arr))){
	$Entire_Skill_list = array_merge($TechSkill_set_arr);
  asort($Entire_Skill_list);
}
if( (isset($CMSSkill_set_arr))){
	$Entire_Skill_list = array_merge(	$Entire_Skill_list,$CMSSkill_set_arr);
  asort($Entire_Skill_list);
}
if((isset($OSSkill_set_arr))){
	$Entire_Skill_list = array_merge(	$Entire_Skill_list, $OSSkill_set_arr);
  asort($Entire_Skill_list);
}

if((isset($Other_Skill_list))){
	$Entire_Skill_list = array_merge($Entire_Skill_list,$Other_Skill_list);
  asort($Entire_Skill_list);

	$Skill_list_str="";
	foreach($Entire_Skill_list as $skill)
	{
		$Skill_list_str = $Skill_list_str.",".$skill;
	}

}

if((isset($Other_Skill_list)) || (isset($OSSkill_set_arr)) || (isset($CMSSkill_set_arr)) || (isset($TechSkill_set_arr))){
	$Entire_Skill_list = array_merge($Entire_Skill_list);
  asort($Entire_Skill_list);

	$Skill_list_str="";
	$first = true;
	foreach($Entire_Skill_list as $skill)
	{
		if($first)
		{
			$first=false;
			$Skill_list_str = $skill;
	  }
		else {
			$Skill_list_str = $Skill_list_str.",".$skill;
	  }
	}
}
else {
	# code...
	$Skill_list_str="";
}

	$sql_qry = "";

	$Personalinfo_sql_qry = "";
	$Educ_sql_qry = "";
	$Cert_sql_qry = "";
	$Wrkexp_sql_qry = "";
	$Skills_sql_qry = "";
  $idStudent_EducationEntry="";

	$Personalinfo_sql_qry = $Personalinfo_sql_qry." `Student_FName` = '".$_POST['Student_fname']."',";
	$Personalinfo_sql_qry = $Personalinfo_sql_qry." `Student_LName` = '".$_POST['Student_lname']."',";
	$Personalinfo_sql_qry = $Personalinfo_sql_qry." `Student_Email` = '".$_POST['Student_email']."',";
	$Personalinfo_sql_qry = $Personalinfo_sql_qry." `Student_RegisteredSemester` = '".$_POST['Sem_Regtd']."',";
	$Personalinfo_sql_qry = $Personalinfo_sql_qry." `Student_RegisteredYear` = '".$_POST['Year_Regtd']."',";
	$Personalinfo_sql_qry = $Personalinfo_sql_qry." `Student_Degree` = '".$_POST['Student_program']."',";
	$Personalinfo_sql_qry = $Personalinfo_sql_qry." `Student_Phonenum` = '".$_POST['Student_phnum']."',";
	$Personalinfo_sql_qry = $Personalinfo_sql_qry." `Student_Gender` = '".$_POST['Gender']."',";
	$Personalinfo_sql_qry = $Personalinfo_sql_qry." `Student_Status` = '".$_POST['Status']."'";

	$Educ_sql_qry = $Educ_sql_qry." `EduDetails_UnderGradMajor` = '".$_POST['UG_major']."',";
	$Educ_sql_qry = $Educ_sql_qry." `EduDetails_UnderGradDegree` = 'UnderGraduate',";
	if(isset($_POST['UG_gpa']) && $_POST['UG_gpa'] > 0)
		$grade=$_POST['UG_gpa'];
	else {
		# code...
		$grade=0;
	}
	$Educ_sql_qry = $Educ_sql_qry." `EduDetails_UnderGradGPA` = ".$grade.",";
	$Educ_sql_qry = $Educ_sql_qry." `EduDetails_UnderGradUniversity` = '".$_POST['UG_univ']."',";
	$Educ_sql_qry = $Educ_sql_qry." `EduDetails_UnderGradCountry` = '".$_POST['UG_country']."',";

	if((isset($_POST['UG_yyyy']) && strlen(trim($_POST['UG_yyyy'])) > 0) && (isset($_POST['UG_mm']) && strlen(trim($_POST['UG_mm'])) > 0))
	{
				$date="'".$_POST['UG_yyyy']."-".$_POST['UG_mm']."-01'";
	}
  else {
	  	# code...
				$date="NULL";
  }

	$Educ_sql_qry = $Educ_sql_qry." `EduDetails_UnderGradDate` = ".$date.",";

	$Educ_sql_qry = $Educ_sql_qry." `EduDetails_GradMajor` = '".$_POST['PG_major']."',";
	$Educ_sql_qry = $Educ_sql_qry." `EduDetails_GradDegree` = 'Graduate',";
	if(isset($_POST['PG_gpa']) && $_POST['PG_gpa'] > 0)
		$grade=$_POST['PG_gpa'];
	else {
		# code...
		$grade=0;
	}
	$Educ_sql_qry = $Educ_sql_qry." `EduDetails_GradGPA` = ".$grade.",";
	$Educ_sql_qry = $Educ_sql_qry." `EduDetails_GradUniversity` = '".$_POST['PG_univ']."',";
	$Educ_sql_qry = $Educ_sql_qry." `EduDetails_GradCountry` = '".$_POST['PG_country']."',";
	if((isset($_POST['PG_yyyy']) && strlen(trim($_POST['PG_yyyy'])) > 0) && (isset($_POST['PG_mm']) && strlen(trim($_POST['PG_mm'])) > 0))
	{
				$date="'".$_POST['UG_yyyy']."-".$_POST['UG_mm']."-01'";
	}
  else {
	  	# code...
				$date="NULL";
  }
	$Educ_sql_qry = $Educ_sql_qry." `EduDetails_GradDate` = ".$date.",";

	$Educ_sql_qry = $Educ_sql_qry." `EduDetails_Other1Name` = '".$_POST['Other1_name']."',";
	$Educ_sql_qry = $Educ_sql_qry." `EduDetails_Other1Major` = '".$_POST['Other1_major']."',";
	if(isset($_POST['Other1_gpa']) && $_POST['Other1_gpa'] > 0)
		$grade=$_POST['Other1_gpa'];
	else {
		# code...
		$grade=0;
	}
	$Educ_sql_qry = $Educ_sql_qry." `EduDetails_Other1GPA` = ".$grade.",";
	$Educ_sql_qry = $Educ_sql_qry." `EduDetails_Other1University` = '".$_POST['Other1_univ']."',";
	$Educ_sql_qry = $Educ_sql_qry." `EduDetails_Other1Country` = '".$_POST['Other1_country']."',";
  if((isset($_POST['Other1_yyyy']) && strlen(trim($_POST['Other1_yyyy'])) > 0) && (isset($_POST['Other1_mm']) && strlen(trim($_POST['Other1_mm'])) > 0))
	{
				$date="'".$_POST['Other1_yyyy']."-".$_POST['Other1_mm']."-01'";
	}
  else {
	  	# code...
				$date="NULL";
  }

	$Educ_sql_qry = $Educ_sql_qry." `EduDetails_Other1Date` = ".$date.",";

	$Educ_sql_qry = $Educ_sql_qry." `EduDetails_Other2Name` = '".$_POST['Other2_name']."',";
	$Educ_sql_qry = $Educ_sql_qry." `EduDetails_Other2Major` = '".$_POST['Other2_major']."',";
	if(isset($_POST['Other2_gpa']) && $_POST['Other2_gpa'] > 0)
		$grade=$_POST['Other2_gpa'];
	else {
		# code...
		$grade=0;
	}
	$Educ_sql_qry = $Educ_sql_qry." `EduDetails_Other2GPA` = ".$grade.",";
	$Educ_sql_qry = $Educ_sql_qry." `EduDetails_Other2University` = '".$_POST['Other2_univ']."',";
	$Educ_sql_qry = $Educ_sql_qry." `EduDetails_Other2Country` = '".$_POST['Other2_country']."',";
	if((isset($_POST['Other2_yyyy']) && strlen(trim($_POST['Other2_yyyy'])) > 0) && (isset($_POST['Other2_mm']) && strlen(trim($_POST['Other2_mm'])) > 0))
	{
				$date="'".$_POST['Other2_yyyy']."-".$_POST['Other2_mm']."-01'";
	}
	else {
			# code...
				$date="NULL";
	}
	$Educ_sql_qry = $Educ_sql_qry." `EduDetails_Other2Date` = ".$date."";

//--------------------- Certification qry structure -------------------------//
	$Cert_sql_qry = $Cert_sql_qry." `EduDetails_Cert1Title` = '".$_POST['Cert1_title']."',";
	$Cert_sql_qry = $Cert_sql_qry." `EduDetails_Cert1Body` = '".$_POST['Cert1_body']."',";
	if((isset($_POST['Cert1_issuedyear']) && strlen(trim($_POST['Cert1_issuedyear'])) > 0))
	{
				$year="'".$_POST['Cert1_issuedyear']."'";
	}
	else {
			# code...
				$year="NULL";
	}
	$Cert_sql_qry = $Cert_sql_qry." `EduDetails_Cert1IssuedDate` = ".$year.",";
	if((isset($_POST['Cert1_validyear']) && strlen(trim($_POST['Cert1_validyear'])) > 0))
	{
				$year="'".$_POST['Cert1_validyear']."'";
	}
	else {
			# code...
				$year="NULL";
	}
	$Cert_sql_qry = $Cert_sql_qry." `EduDetails_Cert1ValidityDate` = ".$year.",";

	$Cert_sql_qry = $Cert_sql_qry." `EduDetails_Cert2Title` = '".$_POST['Cert2_title']."',";
	$Cert_sql_qry = $Cert_sql_qry." `EduDetails_Cert2Body` = '".$_POST['Cert2_body']."',";
	if((isset($_POST['Cert2_issuedyear']) && strlen(trim($_POST['Cert2_issuedyear'])) > 0))
	{
				$year="'".$_POST['Cert2_issuedyear']."'";
	}
	else {
			# code...
				$year="NULL";
	}
	$Cert_sql_qry = $Cert_sql_qry." `EduDetails_Cert2IssuedDate` = ".$year.",";
	if((isset($_POST['Cert2_validyear']) && strlen(trim($_POST['Cert2_validyear'])) > 0))
	{
				$year="'".$_POST['Cert2_validyear']."'";
	}
	else {
			# code...
				$year="NULL";
	}
	$Cert_sql_qry = $Cert_sql_qry." `EduDetails_Cert2ValidityDate` = ".$year.",";

	$Cert_sql_qry = $Cert_sql_qry." `EduDetails_Cert3Title` = '".$_POST['Cert3_title']."',";
	$Cert_sql_qry = $Cert_sql_qry." `EduDetails_Cert3Body` = '".$_POST['Cert3_body']."',";
	if((isset($_POST['Cert3_issuedyear']) && strlen(trim($_POST['Cert3_issuedyear'])) > 0))
	{
				$year="'".$_POST['Cert3_issuedyear']."'";
	}
	else {
			# code...
				$year="NULL";
	}
	$Cert_sql_qry = $Cert_sql_qry." `EduDetails_Cert3IssuedDate` = ".$year.",";
	if((isset($_POST['Cert3_validyear']) && strlen(trim($_POST['Cert3_validyear'])) > 0))
	{
				$year="'".$_POST['Cert3_validyear']."'";
	}
	else {
			# code...
				$year="NULL";
	}
	$Cert_sql_qry = $Cert_sql_qry." `EduDetails_Cert3ValidityDate` = ".$year."";

//----------------------------- Work Exp Data Structure -------------------------------------//

	if((isset($_POST['Wrkexp1_from_year']) && strlen(trim($_POST['Wrkexp1_from_year'])) > 0) && (isset($_POST['Wrkexp1_from_month']) && strlen(trim($_POST['Wrkexp1_from_month'])) > 0))
	{
				$date="'".$_POST['Wrkexp1_from_year']."-".$_POST['Wrkexp1_from_month']."-01'";
	}
	else {
			# code...
				$date="NULL";
	}
	$Wrkexp1_from_date =$date;


	if((isset($_POST['Wrkexp1_till_year']) && strlen(trim($_POST['Wrkexp1_till_year'])) > 0) && (isset($_POST['Wrkexp1_till_month']) && strlen(trim($_POST['Wrkexp1_till_month'])) > 0))
	{
				$date="'".$_POST['Wrkexp1_till_year']."-".$_POST['Wrkexp1_till_month']."-01'";
	}
	else {
			# code...
				$date="NULL";
	}
	$Wrkexp1_till_date = $date;

	if((isset($_POST['Wrkexp2_from_year']) && strlen(trim($_POST['Wrkexp2_from_year'])) > 0) && (isset($_POST['Wrkexp2_from_month']) && strlen(trim($_POST['Wrkexp2_from_month'])) > 0))
	{
				$date="'".$_POST['Wrkexp2_from_year']."-".$_POST['Wrkexp2_from_month']."-01'";
	}
	else {
			# code...
				$date="NULL";
	}
	$Wrkexp2_from_date = $date;

	if((isset($_POST['Wrkexp2_till_year']) && strlen(trim($_POST['Wrkexp2_till_year'])) > 0) && (isset($_POST['Wrkexp2_till_month']) && strlen(trim($_POST['Wrkexp2_till_month'])) > 0))
	{
				$date="'".$_POST['Wrkexp2_till_year']."-".$_POST['Wrkexp2_till_month']."-01'";
	}
	else {
			# code...
				$date="NULL";
	}
	$Wrkexp2_till_date = $date;

	if((isset($_POST['Wrkexp3_from_year']) && strlen(trim($_POST['Wrkexp3_from_year'])) > 0) && (isset($_POST['Wrkexp3_from_month']) && strlen(trim($_POST['Wrkexp3_from_month'])) > 0))
	{
				$date="'".$_POST['Wrkexp3_from_year']."-".$_POST['Wrkexp3_from_month']."-01'";
	}
	else {
			# code...
				$date="NULL";
	}
	$Wrkexp3_from_date = $date;

	if((isset($_POST['Wrkexp3_till_year']) && strlen(trim($_POST['Wrkexp3_till_year'])) > 0) && (isset($_POST['Wrkexp3_till_month']) && strlen(trim($_POST['Wrkexp3_till_month'])) > 0))
	{
				$date="'".$_POST['Wrkexp3_till_year']."-".$_POST['Wrkexp3_till_month']."-01'";
	}
	else {
			# code...
				$date="NULL";
	}
	$Wrkexp3_till_date = $date;

	if((isset($_POST['Wrkexp4_from_year']) && strlen(trim($_POST['Wrkexp4_from_year'])) > 0) && (isset($_POST['Wrkexp4_from_month']) && strlen(trim($_POST['Wrkexp4_from_month'])) > 0))
	{
				$date="'".$_POST['Wrkexp4_from_year']."-".$_POST['Wrkexp4_from_month']."-01'";
	}
	else {
			# code...
				$date="NULL";
	}
	$Wrkexp4_from_date = 	$date;

	if((isset($_POST['Wrkexp4_till_year']) && strlen(trim($_POST['Wrkexp4_till_year'])) > 0) && (isset($_POST['Wrkexp4_till_month']) && strlen(trim($_POST['Wrkexp4_till_month'])) > 0))
	{
				$date="'".$_POST['Wrkexp4_till_year']."-".$_POST['Wrkexp4_till_month']."-01'";
	}
	else {
			# code...
				$date="NULL";
	}
	$Wrkexp4_till_date = $date;

	$Wrkexp_sql_qry = $Wrkexp_sql_qry." `WrkExp1_Company` = '".$_POST['Wrkexp1_company']."',";
	$Wrkexp_sql_qry = $Wrkexp_sql_qry." `WrkExp1_FromDate` = ".$Wrkexp1_from_date.",";
	$Wrkexp_sql_qry = $Wrkexp_sql_qry." `WrkExp1_TillDate` = ".$Wrkexp1_till_date.",";
	$Wrkexp_sql_qry = $Wrkexp_sql_qry." `WrkExp1_Title` = '".$_POST['Wrkexp1_title']."',";
	$Wrkexp_sql_qry = $Wrkexp_sql_qry." `WrkExp1_Duties` = '".$_POST['Wrkexp1_duties']."',";
	$Wrkexp_sql_qry = $Wrkexp_sql_qry." `WrkExp1_Duration` = '".round((abs(strtotime($Wrkexp1_till_date) - strtotime($Wrkexp1_from_date)) / (365*60*60*24)),1)."',";

	$Wrkexp_sql_qry = $Wrkexp_sql_qry." `WrkExp2_Company` = '".$_POST['Wrkexp2_company']."',";
	$Wrkexp_sql_qry = $Wrkexp_sql_qry." `WrkExp2_FromDate` = ".$Wrkexp2_from_date.",";
	$Wrkexp_sql_qry = $Wrkexp_sql_qry." `WrkExp2_TillDate` = ".$Wrkexp2_till_date.",";
	$Wrkexp_sql_qry = $Wrkexp_sql_qry." `WrkExp2_Title` = '".$_POST['Wrkexp2_title']."',";
	$Wrkexp_sql_qry = $Wrkexp_sql_qry." `WrkExp2_Duties` = '".$_POST['Wrkexp2_duties']."',";
	$Wrkexp_sql_qry = $Wrkexp_sql_qry." `WrkExp2_Duration` = '".round((abs(strtotime($Wrkexp2_till_date) - strtotime($Wrkexp2_from_date)) / (365*60*60*24)),1)."',";

	$Wrkexp_sql_qry = $Wrkexp_sql_qry." `WrkExp3_Company` = '".$_POST['Wrkexp3_company']."',";
	$Wrkexp_sql_qry = $Wrkexp_sql_qry." `WrkExp3_FromDate` = ".$Wrkexp3_from_date.",";
	$Wrkexp_sql_qry = $Wrkexp_sql_qry." `WrkExp3_TillDate` = ".$Wrkexp3_till_date.",";
	$Wrkexp_sql_qry = $Wrkexp_sql_qry." `WrkExp3_Title` = '".$_POST['Wrkexp3_title']."',";
	$Wrkexp_sql_qry = $Wrkexp_sql_qry." `WrkExp3_Duties` = '".$_POST['Wrkexp3_duties']."',";
	$Wrkexp_sql_qry = $Wrkexp_sql_qry." `WrkExp3_Duration` = '".round((abs(strtotime($Wrkexp3_till_date) - strtotime($Wrkexp3_from_date)) / (365*60*60*24)),1)."',";

	$Wrkexp_sql_qry = $Wrkexp_sql_qry." `WrkExp4_Company` = '".$_POST['Wrkexp4_company']."',";
	$Wrkexp_sql_qry = $Wrkexp_sql_qry." `WrkExp4_FromDate` = ".$Wrkexp4_from_date .",";
	$Wrkexp_sql_qry = $Wrkexp_sql_qry." `WrkExp4_TillDate` = ".$Wrkexp4_till_date.",";
	$Wrkexp_sql_qry = $Wrkexp_sql_qry." `WrkExp4_Title` = '".$_POST['Wrkexp4_title']."',";
	$Wrkexp_sql_qry = $Wrkexp_sql_qry." `WrkExp4_Duties` = '".$_POST['Wrkexp4_duties']."',";
	$Wrkexp_sql_qry = $Wrkexp_sql_qry." `WrkExp4_Duration` = '".round((abs(strtotime($Wrkexp4_till_date) - strtotime($Wrkexp4_from_date)) / (365*60*60*24)),1)."'";

	$Skills_sql_qry = $Skills_sql_qry." `skillset_linked` = '$Skill_list_str'";


//-------------- Education Check ---------------//

if($Student_chk_from_Edu_details !== 0)
{
		$idStudent_EducationEntry = $Upload_StuPreIntern_Details_obj->updateStudent_PreIntern_Details_EduInfo($Student_id,$Educ_sql_qry);
}
else {
	$Educ_sql_qry = $Educ_sql_qry." ,`idStudent` = '".$Student_id."'";

	$idStudent_EducationEntry = $Upload_StuPreIntern_Details_obj->setStudent_PreIntern_Details_EduInfo($Student_id,$Educ_sql_qry);
}


//-------------- Certification Check ---------------//

if($Student_chk_from_Cert_details !== 0)
{
		$idStudent_CertificationEntry = $Upload_StuPreIntern_Details_obj->updateStudent_PreIntern_Details_CertInfo($Student_id,$Cert_sql_qry);
}
else {
	$Cert_sql_qry = $Cert_sql_qry." ,`idStudent` = '".$Student_id."'";

	$idStudent_CertificationEntry = $Upload_StuPreIntern_Details_obj->setStudent_PreIntern_Details_CertInfo($Student_id,$Cert_sql_qry);
}

//---------------Work Experience Check------------------//

if($Student_chk_from_WrkExp_details !== 0)
{
		$idStudent_WrkExpEntry = $Upload_StuPreIntern_Details_obj->updateStudent_PreIntern_Details_WrkExpInfo($Student_id,$Wrkexp_sql_qry);
}
else {

	$Wrkexp_sql_qry = $Wrkexp_sql_qry." ,`idStudent` = '".$Student_id."'";

	$idStudent_WrkExpEntry = $Upload_StuPreIntern_Details_obj->setStudent_PreIntern_Details_WrkExpInfo($Student_id,$Wrkexp_sql_qry);

}

//--------------- Skillset Check------------------//

if($Student_chk_from_Skill_details !== 0)
{
		$idStudent_SkillSetEntry = $Upload_StuPreIntern_Details_obj->updateStudent_PreIntern_Details_SkillSetInfo($Student_id,$Skills_sql_qry);
}
else {

	$Skills_sql_qry = $Skills_sql_qry." ,`idStudent` = '".$Student_id."'";

	$idStudent_SkillSetEntry = $Upload_StuPreIntern_Details_obj->setStudent_PreIntern_Details_SkillSetInfo($Student_id,$Skills_sql_qry);

}


//------------------------ Personal Info Check --------------------------//

if($Student_chk_from_Stu_details !== 0)
{
	  $idStudent_SkillSetEntry = $Upload_StuPreIntern_Details_obj->retrieve_SkillSetId($Student_id);
	  $idStudent_CertificationEntry=	$Upload_StuPreIntern_Details_obj->retrieve_CertId($Student_id);
		$idStudent_WrkExpEntry = $Upload_StuPreIntern_Details_obj->retrieve_WrkExpId($Student_id);
	  $idStudent_EducationEntry =	$Upload_StuPreIntern_Details_obj->retrieve_EduId($Student_id);

		$Personalinfo_sql_qry = $Personalinfo_sql_qry." ,`idStudent_EducationEntry` = '".$idStudent_EducationEntry."'";
		$Personalinfo_sql_qry = $Personalinfo_sql_qry." ,`idStudent_CertificationEntry` = '".$idStudent_CertificationEntry."'";
		$Personalinfo_sql_qry = $Personalinfo_sql_qry." ,`idStudent_WrkExperience` = '".$idStudent_WrkExpEntry."'";
		$Personalinfo_sql_qry = $Personalinfo_sql_qry." ,`idStudent_Skillset` = '".$idStudent_SkillSetEntry."'";

		$Upload_StuPreIntern_Details_Val = $Upload_StuPreIntern_Details_obj->updateStudent_PreIntern_Details($Student_id,$Personalinfo_sql_qry);

		header('Location: ../View/Upload_form.php?info=updated');
}
else {

	$idStudent_SkillSetEntry = $Upload_StuPreIntern_Details_obj->retrieve_SkillSetId($Student_id);
	$idStudent_CertificationEntry=	$Upload_StuPreIntern_Details_obj->retrieve_CertId($Student_id);
	$idStudent_WrkExpEntry = $Upload_StuPreIntern_Details_obj->retrieve_WrkExpId($Student_id);
	$idStudent_EducationEntry =	$Upload_StuPreIntern_Details_obj->retrieve_EduId($Student_id);

	$Personalinfo_sql_qry = $Personalinfo_sql_qry." ,`idStudent` = '".$Student_id."'";
  $Personalinfo_sql_qry = $Personalinfo_sql_qry." ,`idStudent_EducationEntry` = '".$idStudent_EducationEntry."'";
	$Personalinfo_sql_qry = $Personalinfo_sql_qry." ,`idStudent_CertificationEntry` = '".$idStudent_CertificationEntry."'";
	$Personalinfo_sql_qry = $Personalinfo_sql_qry." ,`idStudent_WrkExperience` = '".$idStudent_WrkExpEntry."'";
	$Personalinfo_sql_qry = $Personalinfo_sql_qry." ,`idStudent_Skillset` = '".$idStudent_SkillSetEntry."'";

	$Upload_StuPreIntern_Details_Val = $Upload_StuPreIntern_Details_obj->setStudent_PreIntern_Details($Student_id,$Personalinfo_sql_qry,$idStudent_EducationEntry,$idStudent_CertificationEntry,$idStudent_WrkExpEntry,$idStudent_SkillSetEntry);

	header('Location: ../View/Upload_form.php?info=updated');

}

}

?>
