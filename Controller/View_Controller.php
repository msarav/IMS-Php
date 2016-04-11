<?
include("../Model/ViewDetails_PDO.php");

include("../Model/UploadDetails_PDO.php");
include("Lookup_Controller.php");


$View_Details = new View_Details();
$Student_details_obj = new Student_PreIntern_details();


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

$View_Details_JobGroup=array();
$View_Details_JobGroup= $FormLookup_Details_JobGroup;

function Hired_details($Student_id)
{
  $View_Details = new View_Details();
  $Hired_details = $View_Details->Retrieve_HiredCompany($Student_id);

  return $Hired_details;
}

if(isset($_POST['Delete_Student_details']))
{


  $Student_ids_arr = array();

  $Student_ids_checked_arr = array();

  $Delete_Students_sql_qry="";

  $Student_ids_arr = $View_Details->Retrieve_StudentIDs();

  if(isset($Student_ids_arr) && (count($Student_ids_arr) > 0) ){

    $Chk_flag=true;
    $i = 0;

    foreach($Student_ids_arr as $Student_id ){

      if(isset($_POST['chkbox_delete_'.$Student_id])){

        $Student_ids_checked_arr[$i] = $Student_id;

        $i++;

      }

    }

      if(count($Student_ids_checked_arr) > 0)
      {
            $Delete_Students_Val = $Student_details_obj->deleteStudent_details($Student_ids_checked_arr);
            $_GET['Deleted_val'] = $Delete_Students_Val;
       }

  }

}


if(isset($_POST['View_details_form']))
{
  $Retrieve_StudentDetails_obj =  new View_Details();

  $Retrieve_sql_qry = " where stu_details.`idStudent` is not null ";
  $Internship_condition=0;

  if(isset($_POST['intern_type']))
  {
     $Internship_condition=1;
     $Intern_type_str_arr = $_POST['intern_type'];   //array

     $Intern_payment_type="";

     $chk_flag= true;

     foreach ($Intern_type_str_arr as $Intern_type_str_val)
     {
       $Intern_exploded_val = explode("-",$Intern_type_str_val);

       if(count($Intern_exploded_val) > 1)
       {
          $Intern_type_id = Map_InternType(trim($Intern_exploded_val[0]));

          if(trim($Intern_exploded_val[1]) == "Paid job")
          {
            $Intern_payment_type=" AND available_intern_details.`intern_payment` like 'Paid' ";
          }
          else {
            # code...
            $Intern_payment_type=" AND available_intern_details.`intern_payment` like 'Unpaid' ";
          }
       }

       else {
         # code...
         $Intern_type_id = Map_InternType($Intern_exploded_val[0]);
       }


       if( $chk_flag)
       {
             $Retrieve_sql_qry = $Retrieve_sql_qry." AND ( (available_intern_details.`intern_type` like '".$Intern_type_id."'";
             $Retrieve_sql_qry = $Retrieve_sql_qry.$Intern_payment_type;
             $Retrieve_sql_qry = $Retrieve_sql_qry." )  ";

             $chk_flag=false;

        }
        else
        {
            $Retrieve_sql_qry = $Retrieve_sql_qry." OR (available_intern_details.`intern_type` like '".$Intern_type_id."'";
            $Retrieve_sql_qry = $Retrieve_sql_qry.$Intern_payment_type;
            $Retrieve_sql_qry = $Retrieve_sql_qry." )  ";
        }
     }


          $Retrieve_sql_qry = $Retrieve_sql_qry." )  ";
  }

  if(isset($_POST['joblocation']) && strlen(trim($_POST['joblocation'])) > 0)
  {
    $Internship_condition=1;

    $Job_location = $_POST['joblocation'];   //val

    $Retrieve_sql_qry = $Retrieve_sql_qry." AND available_intern_details.`company_addr_city` like '".$_POST['joblocation']."'";

  }

  if(isset($_POST['country']) && strlen(trim($_POST['country'])) > 0)
  {
    $Country = $_POST['country'];  //val

    $Retrieve_sql_qry = $Retrieve_sql_qry." AND stu_details.`Student_Country` like '".$Country ."'";

  }

  if(isset($_POST['batch']) && strlen(trim($_POST['batch'])) > 0)
  {
    $Batch_str = $_POST['batch'] ;  //val

    $Batch_str_arr = explode(" ",$Batch_str);

    $chk_flag=true;

    foreach($Batch_str_arr as $Batch_str_val)
    {
        if( $chk_flag)
        {
          $Retrieve_sql_qry = $Retrieve_sql_qry." AND stu_details.`Student_RegisteredSemester` like '".trim($Batch_str_val)."'";
          $chk_flag = false;
        }
        else {
          $Retrieve_sql_qry = $Retrieve_sql_qry." AND stu_details.`Student_RegisteredYear` like '".trim($Batch_str_val)."'";

        }
    }

  }

  if(isset($_POST['degree']) && strlen(trim($_POST['degree'])) > 0)
  {
      $Degree = $_POST['degree'];   //val

      if(isset($_POST['gpa_from']) && strlen(trim($_POST['gpa_from'])) > 0)
      {
        $gpa_from =  $_POST['gpa_from'];   //val
      }
      else {
        # code...
          $gpa_from =  0;
      }
      if(isset($_POST['gpa_to']) && strlen(trim($_POST['gpa_to'])) > 0)
      {
        $gpa_to =  $_POST['gpa_to'] ;  //val
      }
      else {
        # code...
          $gpa_to =  0;
      }

      if($Degree = "Under Graduate")
      {
          $Retrieve_sql_qry = $Retrieve_sql_qry." AND stu_edu.`EduDetails_UnderGradGPA` between $gpa_from and $gpa_to";
      }
      else {
        # code...
          $Retrieve_sql_qry = $Retrieve_sql_qry." AND stu_edu.`EduDetails_GradGPA` between $gpa_from and $gpa_to";
      }
  }

  if(isset($_POST['skills']))
  {
    $skills_arr = $_POST['skills'];   //array
    $chk_flag = true;

    foreach($skills_arr as $skills_str_val)
    {
        $skills_val =  Map_Skill_val($skills_str_val);

        if( $chk_flag)
        {
          $Retrieve_sql_qry = $Retrieve_sql_qry." AND (stu_skill.`skillset_linked` like '%".$skills_val."%'";
          $chk_flag = false;
        }
        else {
          $Retrieve_sql_qry = $Retrieve_sql_qry." OR stu_skill.`skillset_linked` like '%".$skills_val."%'";
        }
    }

    $Retrieve_sql_qry = $Retrieve_sql_qry.")";

  }


  if(isset($_POST['certification']) && strlen(trim($_POST['certification'])) > 0)
  {
     $certification =  $_POST['certification'] ;  //array

     $Retrieve_sql_qry = $Retrieve_sql_qry." AND (stu_cert.`EduDetails_Cert1Title` like '".$certification ."'";
     $Retrieve_sql_qry = $Retrieve_sql_qry." OR stu_cert.`EduDetails_Cert2Title` like '".$certification ."'";
     $Retrieve_sql_qry = $Retrieve_sql_qry." OR stu_cert.`EduDetails_Cert3Title` like '".$certification ."'";

     $Retrieve_sql_qry = $Retrieve_sql_qry.")";

  }


  if(isset($_POST['experience'])  && strlen(trim($_POST['experience'])) > 0)
  {
    $exp_years_str = $_POST['experience'] ;  //array

    $exp_years_qry_val = "";

    switch (trim($exp_years_str)) {

      case "<1 year":
          $exp_years_qry_val = $exp_years_qry_val." between 1 and 11";
          break;
      case "1-3 years":
          $exp_years_qry_val = $exp_years_qry_val." between 12 and 36";
          break;
      case "> 3 years":
          $exp_years_qry_val = $exp_years_qry_val." > 36";
          break;
      default:
            $exp_years_qry_val = $exp_years_qry_val." = 0";
      }


    $Retrieve_sql_qry = $Retrieve_sql_qry." AND (stu_wrkexp.`WrkExp1_Duration`+stu_wrkexp.`WrkExp2_Duration`+
                                             stu_wrkexp.`WrkExp3_Duration`+stu_wrkexp.`WrkExp4_Duration`
                                              ".$exp_years_qry_val.")";

  }


  if(isset($_POST['gender'])  && strlen(trim($_POST['gender'])) > 0)
  {
    $gender = $_POST['gender'];   //array

    if($gender !== "All")
    {
      $Retrieve_sql_qry = $Retrieve_sql_qry." AND stu_details.`Student_Gender` like '".$gender."'";
     }

   }


   if(isset($_POST['job_group'])  && strlen(trim($_POST['job_group'])) > 0)
   {
     $Internship_condition =1;

     $job_group_str = $_POST['job_group'];   //array

     $job_group_id = Map_JobGroup($job_group_str);

     $Retrieve_sql_qry = $Retrieve_sql_qry." AND available_intern_details.`intern_jobgroup` = '".$job_group_id."'";

   }

  if($Internship_condition)
  {
      $Retrieve_sql_qry = $Retrieve_sql_qry. " AND intern_interested_stu.availability_tag like 'hired'";
  }


  $Student_details_val = $Retrieve_StudentDetails_obj->retrieveStudent_details($Retrieve_sql_qry,$Internship_condition);

  $_GET['count_qry']=count($Student_details_val);
  $_GET['count']=count($Student_details_val);
  include("../View/viewdetails.php");


}
else {

  if(isset($_POST['Without_any_job']))
	{
	  $Retrieve_StudentDetails_obj =  new View_Details();

	  $Retrieve_sql_qry = " where stu_details.`idstudent` not in (select intern_interested_students.`student_id` from intern_interested_students where intern_interested_students.availability_tag like 'hired') order by idstudent asc ";
	  $Internship_condition=0;

	  $Student_details_val = $Retrieve_StudentDetails_obj->retrieveStudent_details($Retrieve_sql_qry,$Internship_condition);

	   $_GET['count_qry']=count($Student_details_val);



	}
  else{

	  $Retrieve_StudentDetails_obj =  new View_Details();

	  $Retrieve_sql_qry = " where stu_details.`idStudent` is not null ";
	  $Internship_condition=0;


	  $Student_details_val = $Retrieve_StudentDetails_obj->retrieveStudent_details($Retrieve_sql_qry,$Internship_condition);

  }

  $_GET['count']=count($Student_details_val);

  include("../View/viewdetails.php");
}


?>
