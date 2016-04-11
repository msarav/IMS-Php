<?
include_once("db_connection.php");

Class FormLookup_Details
{

	var $Year_val;

	function  FormLookup_Details()
	{
		$Year_val = null;

	}

	// Function to Retrieve Other Users Details based on the supplied User ID

  function Hired_chk_by_Company($Company_name)
	{

			 $hired_count = array();

			 $Retrieved_result = Retrieve_qry(" select
																					count(available_intern_details.`company_name`) as `hired_count`

																					from available_interndetails available_intern_details LEFT JOIN
																					intern_interested_students interested_students

																					on available_intern_details.id_availableinterndetails = interested_students.id_available_interndetails

																					where available_intern_details.company_name like '$Company_name' and interested_students.availability_tag like 'hired'
																				");

				$i=0;

				foreach ($Retrieved_result as $Rowlist)
				{
					$hired_count[$i] = $Rowlist['hired_count'];
					$i++;
				}

				return $hired_count[0];

	}

	function Hired_chk_by_JobGroup($Job_Group)
	{

			 $hired_count = array();

			 $Retrieved_result = Retrieve_qry(" select
																					count(available_intern_details.`intern_jobgroup`) as `hired_count`

																					from  available_interndetails available_intern_details

																				LEFT JOIN
																			   intern_interested_students interested_students

																			   on available_intern_details.id_availableinterndetails = interested_students.id_available_interndetails

																			   LEFT JOIN
																			   internjobgroup_lookup jobgroup_lookup

																			   on available_intern_details.intern_jobgroup = jobgroup_lookup.idInternPositions_Lookup

																		where jobgroup_lookup.JobGroup_Name like '$Job_Group' and interested_students.availability_tag like 'hired'");

				$i=0;

				foreach ($Retrieved_result as $Rowlist)
				{
					$hired_count[$i] = $Rowlist['hired_count'];
					$i++;
				}

				return $hired_count[0];

	}



	function Retrieve_Yearlist()
	{

		$Year_list_arr = array();

	 $Retrieved_result = Retrieve_qry("Select `Year_val` from year_lookup order by Year_val desc");

		$i=0;

		foreach ($Retrieved_result as $Rowlist)
		{
			$Year_list_arr[$i] = $Rowlist['Year_val'];
			$i++;
		}

		return $Year_list_arr;
	}

	function Retrieve_Companylist()
	{

		$Company_list_arr = array();

	 $Retrieved_result = Retrieve_qry("Select distinct(`company_name`) as company_name from available_interndetails order by company_name;");

		$i=0;

		foreach ($Retrieved_result as $Rowlist)
		{
			$Company_list_arr[$i] = $Rowlist['company_name'];
			$i++;
		}

		return $Company_list_arr;
	}

	function Retrieve_Countrylist()
	{

	 $Country_list_arr = array();

	 $Retrieved_result = Retrieve_qry("Select `Country_val` from country_lookup order by Country_val");

		$i=0;

		foreach ($Retrieved_result as $Rowlist)
		{
			$Country_list_arr[$i] = $Rowlist['Country_val'];
			$i++;
		}

		return $Country_list_arr;
	}

	function Retrieve_TechSkill_list()
	{

		$Year_list_arr = array();

	 $Retrieved_result = Retrieve_qry("select `skill_name` from ims.skillset_lookup where ims.skillset_lookup.skill_category = 'Technical' order by `skill_name`");

		$i=0;

		foreach ($Retrieved_result as $Rowlist)
		{
			$Techskill_list_arr[$i] = $Rowlist['skill_name'];
			$i++;
		}

		return $Techskill_list_arr;
	}

	function Retrieve_CMSSkill_list()
	{

		$CMSskill_list_arr = array();

	 $Retrieved_result = Retrieve_qry("select `skill_name` from ims.skillset_lookup where ims.skillset_lookup.skill_category = 'CMS' order by `skill_name`");

		$i=0;

		foreach ($Retrieved_result as $Rowlist)
		{
			$CMSskill_list_arr[$i] = $Rowlist['skill_name'];
			$i++;
		}

		return $CMSskill_list_arr;
	}

	function Retrieve_OSSkill_list()
	{

		$OSskill_list_arr = array();

	  $Retrieved_result = Retrieve_qry("select `skill_name` from ims.skillset_lookup where ims.skillset_lookup.skill_category = 'OS' order by `skill_name`");

		$i=0;

		foreach ($Retrieved_result as $Rowlist)
		{
			$OSskill_list_arr[$i] = $Rowlist['skill_name'];
			$i++;
		}

		return $OSskill_list_arr;
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

	function Map_Skill_val($skill_str)
	{

		 $Retrieved_result = Retrieve_qry("select `id_skill` from skillset_lookup where skill_name like '$skill_str';");

			$i=0;

			foreach ($Retrieved_result as $Rowlist)
			{
				$skill_val = $Rowlist['id_skill'];
				$i++;
			}

				return $skill_val;
	}

		function Add_Map_Skill_list($skill_arr,$Skill_category)
		{

		 $skill_list_arr = array();

		 foreach($skill_arr as $skill){

			 if(RowCount_qry("select `id_skill` from skillset_lookup where skill_name = '$skill';") == 0 )
			 {

				  $Updated_rows = Execute_qry("INSERT INTO `skillset_lookup` (`skill_name`,`skill_category`) VALUES ('$skill','$Skill_category');");

			 }


				$Retrieved_result = Retrieve_qry("select `id_skill` from skillset_lookup where skill_name like '$skill';");

				foreach ($Retrieved_result as $Rowlist)
				{
					$skill_list_arr[$skill] = $Rowlist['id_skill'];

				}
			}

		return $skill_list_arr;
	}

	function Retrieve_InternType_list()
	{

		$InternType_list_arr = array();

		$Retrieved_result = Retrieve_qry("select `Intern_type` from interntype_lookup order by Intern_Type");

		$i=0;

		foreach ($Retrieved_result as $Rowlist)
		{
			$InternType_list_arr[$i] = $Rowlist['Intern_type'];
			$i++;
		}

		return $InternType_list_arr;
	}

	function Retrieve_JobGroup_list()
	{

		$JobGroup_list_arr = array();

		$Retrieved_result = Retrieve_qry("select `JobGroup_Name` from internjobgroup_lookup order by JobGroup_Name");

		$i=0;

		foreach ($Retrieved_result as $Rowlist)
		{
			$JobGroup_list_arr[$i] = $Rowlist['JobGroup_Name'];
			$i++;
		}

		return $JobGroup_list_arr;
	}

	function Map_InternType($Intern_type)
	{

	   $Intern_type_id_arr = array();

		 $Retrieved_result = Retrieve_qry("select `id_interntype` from interntype_lookup where Intern_Type like '$Intern_type';");

			$i=0;

			foreach ($Retrieved_result as $Rowlist)
			{
				$Intern_type_id_arr[$i] = $Rowlist['id_interntype'];
				$i++;
			}

				return $Intern_type_id_arr[0];
	}

	function Map_JobGroup($Job_Group)
	{

	   $Job_group_id_arr = array();

		 $Retrieved_result = Retrieve_qry("select `idInternPositions_Lookup` from internjobgroup_lookup where JobGroup_Name like '$Job_Group';");

			$i=0;

			foreach ($Retrieved_result as $Rowlist)
			{
				$Job_group_id_arr[$i] = $Rowlist['idInternPositions_Lookup'];
				$i++;
			}

				return $Job_group_id_arr[0];
	}

	function ReverseMap_InternType($Intern_type_id)
	{

	   $Intern_type_name_arr = array();

		 $Retrieved_result = Retrieve_qry("select `Intern_Type` from interntype_lookup where id_interntype=  '$Intern_type_id';");

			$i=0;

			foreach ($Retrieved_result as $Rowlist)
			{
				$Intern_type_name_arr[$i] = $Rowlist['Intern_Type'];
				$i++;
			}

				return $Intern_type_name_arr[0];
	}

	function ReverseMap_JobGroup($Job_Group_id)
	{

	   $Job_group_name_arr = array();

		 $Retrieved_result = Retrieve_qry("select `JobGroup_Name` from internjobgroup_lookup where `idInternPositions_Lookup` like '$Job_Group_id';");

			$i=0;

			foreach ($Retrieved_result as $Rowlist)
			{
				$Job_group_name_arr[$i] = $Rowlist['JobGroup_Name'];
				$i++;
			}

				return $Job_group_name_arr[0];
	}


	function Interested_chk($Student_id,$Position_key)
	{

		 $Interested_chk_val = "";

		 $Interested_chk_val = RowCount_qry("select * from intern_interested_students where student_id like '$Student_id' and id_available_interndetails=$Position_key and availability_tag like 'available'");

			return $Interested_chk_val;
	}


	function Hired_chk($Student_id,$Position_key)
	{

		$Hired_chk_val = "";

 	  $Hired_chk_val = RowCount_qry("select *  from intern_interested_students where student_id like '$Student_id' and id_available_interndetails=$Position_key and availability_tag like 'hired'");

 		return $Hired_chk_val;
	}
}
?>
