<?
include("../Model/ViewDetails_PDO.php");

$View_Details = new View_Details();

$View_Details_Joblocation=array();
$View_Details_Joblocation=$View_Details->Retrieve_Joblocation();

$View_Details_Country=array();
$View_Details_Country=$View_Details->Retrieve_Country();

$View_Details_Batch=array();
$View_Details_Batch=$View_Details->Retrieve_Batch();

$View_Details_Skills=array();
$View_Details_Skills=$View_Details->Retrieve_Skills();

$View_Details_Certification=array();
$View_Details_Certification=$View_Details->Retrieve_Certification();

function retrieve_EntireSkillset($Skill_list){

	$FormLookup_Details = new FormLookup_Details();
	$FormLookup_Details_Allskills=array();
	$FormLookup_Details_Allskills = $FormLookup_Details->Map_Skill_list($Skill_list);
	return $FormLookup_Details_Allskills;
}


// var_dump($View_Details_Certification);
// exit(0);

?>