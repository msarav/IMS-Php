<?
include("../Model/Form_lookup_PDO.php");

$FormLookup_Details = new FormLookup_Details();

$FormLookup_Details_years=array();
$FormLookup_Details_years = $FormLookup_Details->Retrieve_Yearlist();

$FormLookup_Details_countries = array();
$FormLookup_Details_countries = $FormLookup_Details->Retrieve_Countrylist();

$FormLookup_Details_TECHskills=array();
$FormLookup_Details_TECHskills = $FormLookup_Details->Retrieve_TechSkill_list();

$FormLookup_Details_CMSskills=array();
$FormLookup_Details_CMSskills = $FormLookup_Details->Retrieve_CMSSkill_list();

$FormLookup_Details_OSskills=array();
$FormLookup_Details_OSskills = $FormLookup_Details->Retrieve_OSSkill_list();

$FormLookup_Details_JobGroup=array();
$FormLookup_Details_JobGroup = $FormLookup_Details->Retrieve_JobGroup_list();

$FormLookup_Details_InternType=array();
$FormLookup_Details_InternType = $FormLookup_Details->Retrieve_InternType_list();

$FormLookup_Details_Company=array();
$FormLookup_Details_Company = $FormLookup_Details->Retrieve_Companylist();



function Hired_chk_by_Company($Company_name){

	$FormLookup_Details = new FormLookup_Details();
	$Hired_val = $FormLookup_Details->Hired_chk_by_Company($Company_name);
	return $Hired_val;

}

function 	Hired_chk_by_JobGroup($Job_Group)
{
	$FormLookup_Details = new FormLookup_Details();
	$Hired_val = $FormLookup_Details->Hired_chk_by_JobGroup($Job_Group);
	return $Hired_val;
}

function retrieve_EntireSkillset($Skill_list){

	$FormLookup_Details = new FormLookup_Details();
	$FormLookup_Details_Allskills=array();
	$FormLookup_Details_Allskills = $FormLookup_Details->Map_Skill_list($Skill_list);
	return $FormLookup_Details_Allskills;
}

function add_OtherSkillset($Skill_list,$Skill_Catrgory){

	$FormLookup_Details = new FormLookup_Details();
	$FormLookup_Details_Allskills=array();
	$FormLookup_Details_Allskills = $FormLookup_Details->Add_Map_Skill_list($Skill_list,$Skill_Catrgory);

	return $FormLookup_Details_Allskills;
}


function Map_Skill_val($skills_str_val){

	$FormLookup_Details = new FormLookup_Details();
	$FormLookup_Details_Skill_ID = $FormLookup_Details->Map_Skill_val($skills_str_val);

	return $FormLookup_Details_Skill_ID;
}

function Map_JobGroup($JobGroup){

	$FormLookup_Details = new FormLookup_Details();
	$FormLookup_Details_JobGroup_ID = $FormLookup_Details->Map_JobGroup($JobGroup);

	return $FormLookup_Details_JobGroup_ID;
}


function Map_InternType($Intern_type){

	$FormLookup_Details = new FormLookup_Details();
	$FormLookup_Details_InternType_ID = $FormLookup_Details->Map_InternType($Intern_type);

	return $FormLookup_Details_InternType_ID;
}

function ReverseMap_InternType($InternType_id){

	$FormLookup_Details = new FormLookup_Details();
	$FormLookup_Details_InternType_name = $FormLookup_Details->ReverseMap_InternType($InternType_id);

	return $FormLookup_Details_InternType_name;
}

function ReverseMap_JobGroup($JobGroup_id){

	$FormLookup_Details = new FormLookup_Details();
	$FormLookup_Details_JobGroup_name = $FormLookup_Details->ReverseMap_JobGroup($JobGroup_id);

	return $FormLookup_Details_JobGroup_name;
}

function Interested_chk($Student_id,$Position_key){

	$FormLookup_Details = new FormLookup_Details();
	$Interested_val = $FormLookup_Details->Interested_chk($Student_id,$Position_key);

	return $Interested_val;
}

function Hired_chk($Student_id,$Position_key){

	$FormLookup_Details = new FormLookup_Details();
	$Hired_val = $FormLookup_Details->Hired_chk($Student_id,$Position_key);

	return $Hired_val;
}
?>
