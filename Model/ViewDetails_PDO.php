<?
include_once("db_connection.php");

class View_Details
{
	function Retrieve_Joblocation()
	{
		$job_location = array();
		
		$Retrieved_result = Retrieve_qry("Select `InternDetails_City` from internship_details order by `InternDetails_City` asc ");
		
		$i=0;
		
		foreach($Retrieved_result as $Rowlist)
		{
			$job_location[$i] = $Rowlist['InternDetails_City'];
			$i++;
		}
		return $job_location;
		
	}
	
	
	function Retrieve_Country()
	{
		$country = array();
		
		$Retrieved_result = Retrieve_qry("Select `Student_Country` from student_details order by `Student_Country` asc ");
		
		$i=0;
		
		foreach($Retrieved_result as $Rowlist)
		{
			$country[$i] = $Rowlist['Student_Country'];
			$i++;
		}
		return $country;
		
	}
	
	
}






?>