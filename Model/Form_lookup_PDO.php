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

}
?>
