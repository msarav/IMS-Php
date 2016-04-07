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
	
	function Retrieve_Batch()
	{
		$batch = array();
		
		$Retrieved_result = Retrieve_qry("select `Student_RegisteredSemester`, `Student_RegisteredYear` from student_details order by `Student_RegisteredYear` asc");
		
		$i=0;
		
		foreach($Retrieved_result as $Rowlist)
		{
			$batch[$i] = $Rowlist['Student_RegisteredSemester']." ".$Rowlist['Student_RegisteredYear'];
			$i++;
		}
		return $batch;
		
	}
	
	function Retrieve_Skills()
	{
		$skill = array();
		$Retrieved_result = Retrieve_qry("select `skill_name` from skillset_lookup order by `skill_name` asc;");
		$i=0;
		
		foreach($Retrieved_result as $Rowlist)
		{
			$skill[$i] = $Rowlist['skill_name'];
			$i++;
		}
		return $skill;
		
		
		
	}
	
	
	function Retrieve_Certification()
	{
		$certification = array();
		$Retrieved_result = Retrieve_qry("select `EduDetails_Cert1Title`, `EduDetails_Cert2Title`, `EduDetails_Cert3Title` from student_certdetails");
		$i=0;
		
		foreach($Retrieved_result as $Rowlist)
		{
			$certification[$i] = $Rowlist['EduDetails_Cert1Title'];
			$i++;
			$certification[$i] = $Rowlist['EduDetails_Cert2Title'];
			$i++;
			$certification[$i] = $Rowlist['EduDetails_Cert3Title'];
			$i++;
		}
		return $certification;
		
		
		
	}
	
	
	
	function Map_Skill_list($skill_arr)
	{

	 $skill_list_arr = array();

	 foreach($skill_arr as $skill){

		 $Retrieved_result = Retrieve_qry("select `id_skill` from skillset_lookup where skill_name like '$skill';");

			$i=0;

			foreach ($Retrieved_result as $Rowlist)
			{
				$skill_list_arr[$skill] = $Rowlist['id_skill'];
				$i++;
			}
		}
				return $skill_list_arr;
	}
	

	
	
	
	
	
	
}


?>