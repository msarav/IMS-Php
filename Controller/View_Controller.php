<?
include("../Model/ViewDetails_PDO.php");

$View_Details = new View_Details();

$View_Details_Joblocation=array();
$View_Details_Joblocation=$View_Details->Retrieve_Joblocation();

$View_Details_Country=array();
$View_Details_Country=$View_Details->Retrieve_Country();



?>