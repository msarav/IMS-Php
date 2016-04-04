<?
include("../Model/Form_lookup_PDO.php");

$FormLookup_Details = new FormLookup_Details();

$FormLookup_Details_years=array();
$FormLookup_Details_years = $FormLookup_Details->Retrieve_Yearlist();

$FormLookup_Details_TECHskills=array();
$FormLookup_Details_TECHskills = $FormLookup_Details->Retrieve_TechSkill_list();

$FormLookup_Details_CMSskills=array();
$FormLookup_Details_CMSskills = $FormLookup_Details->Retrieve_CMSSkill_list();

$FormLookup_Details_OSskills=array();
$FormLookup_Details_OSskills = $FormLookup_Details->Retrieve_OSSkill_list();



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

?>
