<?
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$UserID = $_SESSION['UserID'];
$ProfileType = 	$_SESSION['User Type'];
$StudentID = $_SESSION['StudentId'];

require_once("../Model/UploadDetails_PDO.php");
require_once("Lookup_Controller.php");

$Available_Intern_Position_details_obj = new Available_Intern_Position_details();

$Available_interndetails_Val=0;
$Delete_Available_interndetails_Val = 0;

if(isset($_POST['Update_Position_interest_form']))
{
  $Available_Interndetails_arr = array();

  $Insert_Interested_positions_qry = "";
  $Insert_Interested_positions_val = 0;

  $Delete_Interested_Positions_sql_qry="`student_id` like $StudentID and `availability_tag` like 'available'";

  $Delete_Available_interndetails_Val = $Available_Intern_Position_details_obj->deleteInterested_Positions($Delete_Interested_Positions_sql_qry);
  $Insert_Interested_positions_val++;

  $Available_Interndetails_arr = $Available_Intern_Position_details_obj->retrieveAvailable_intern_Details();

  if(isset($Available_Interndetails_arr) && (count($Available_Interndetails_arr) > 0) ){

    $arr_keys = array_keys($Available_Interndetails_arr);
    $Chk_flag=true;

    foreach($arr_keys as $key ){

      if(isset($_POST['chkbox_interested_'.$key])){

          $Insert_Interested_positions_qry="'$StudentID',$key,'available'";

          $Insert_Interested_positions_val += $Available_Intern_Position_details_obj->insertInterested_Positions($Insert_Interested_positions_qry);
      }
    }
  }

    $_GET['Interest_update']="updated";
}

if(isset($_POST['Update_hire_status']))
{

  $Position_id = $_POST['Position_id'];

  $Available_Studentdetails_arr = array();
  $Confirm_students_qry="";

  $Available_Studentdetails_arr = $Available_Intern_Position_details_obj->Retrieve_available_students($Position_id);

  if(isset($Available_Studentdetails_arr) && (count($Available_Studentdetails_arr) > 0) ){

    $Chk_flag=true;

    foreach($Available_Studentdetails_arr as $Available_Studentdetails_id ){

      if(isset($_POST['confirm_hire_'.$Available_Studentdetails_id])){

        if($Chk_flag)
        {
          $Confirm_students_qry = $Confirm_students_qry." `id_intern_interested_students` = '". $Available_Studentdetails_id ."'";
          $Chk_flag=false;
        }
        else {
          # code...
          $Confirm_students_qry = $Confirm_students_qry." and `id_intern_interested_students` = '".$Available_Studentdetails_id ."'";
        }

      }

    }

          $Update_Available_Students_status = $Available_Intern_Position_details_obj->updateAvailable_student_Details($Confirm_students_qry);

  }

      header("../Controller/Upload_interndetails_Controller.php");
}

if(isset($_POST['Delete_Available_Positions_form']))
{
  $Available_Interndetails_arr = array();
  $Delete_Available_interndetails_sql_qry="";

  $Available_Interndetails_arr = $Available_Intern_Position_details_obj->retrieveAvailable_intern_Details();

  if(isset($Available_Interndetails_arr) && (count($Available_Interndetails_arr) > 0) ){

    $arr_keys = array_keys($Available_Interndetails_arr);
    $Chk_flag=true;

    foreach($arr_keys as $key ){

      if(isset($_POST['chkbox_select_'.$key])){

        if($Chk_flag)
        {
          $Delete_Available_interndetails_sql_qry = $Delete_Available_interndetails_sql_qry." `id_availableinterndetails` = '". $key."'";
          $Chk_flag=false;
        }
        else {
          # code...
          $Delete_Available_interndetails_sql_qry = $Delete_Available_interndetails_sql_qry." and `id_availableinterndetails` = '".$key."'";
        }

      }

    }

          $Delete_Available_interndetails_Val = $Available_Intern_Position_details_obj->deleteAvailable_intern_Details($Delete_Available_interndetails_sql_qry);

  }

}


if(isset($_POST['Upload_InternPosition_form']))
{

  $Available_interndetails_sql_qry="";

  $Available_interndetails_sql_qry = $Available_interndetails_sql_qry." '".$_POST['Company_name']."',";
  $Available_interndetails_sql_qry = $Available_interndetails_sql_qry." '".$_POST['Company_addr']."',";
  $Available_interndetails_sql_qry = $Available_interndetails_sql_qry." '".$_POST['Company_city']."',";
  $Available_interndetails_sql_qry = $Available_interndetails_sql_qry." '".$_POST['Company_PostalCode']."',";
  $Available_interndetails_sql_qry = $Available_interndetails_sql_qry." '".$_POST['Company_Phonenum']."',";
  $Available_interndetails_sql_qry = $Available_interndetails_sql_qry." '".$_POST['Company_OrgWebsite']."',";
  $Available_interndetails_sql_qry = $Available_interndetails_sql_qry." '".$_POST['Company_POC_Fname']."',";
  $Available_interndetails_sql_qry = $Available_interndetails_sql_qry." '".$_POST['Company_POC_Lname']."',";
  $Available_interndetails_sql_qry = $Available_interndetails_sql_qry." '".$_POST['Company_POCEmail']."',";
  $Available_interndetails_sql_qry = $Available_interndetails_sql_qry." '".$_POST['Company_POC_Position']."',";
  $Available_interndetails_sql_qry = $Available_interndetails_sql_qry." '".$_POST['Job_Position']."',";
  $Available_interndetails_sql_qry = $Available_interndetails_sql_qry." '".$_POST['Job_Desc']."',";
  $Available_interndetails_sql_qry = $Available_interndetails_sql_qry." '".$_POST['Job_Responsibility']."',";
  $Available_interndetails_sql_qry = $Available_interndetails_sql_qry." '".$_POST['Job_Reqmnts']."',";
  $Available_interndetails_sql_qry = $Available_interndetails_sql_qry." '".$_POST['Intern_PositionNotes']."',";

  $Available_interndetails_sql_qry = $Available_interndetails_sql_qry." '".Map_InternType($_POST['Intern_type'])."',";
  $Available_interndetails_sql_qry = $Available_interndetails_sql_qry." '".Map_JobGroup($_POST['Job_group'])."',";
  $Available_interndetails_sql_qry = $Available_interndetails_sql_qry." '".date('Y-m-d')."',";
  $Available_interndetails_sql_qry = $Available_interndetails_sql_qry." '".$_POST['Intern_payment']."'";


  $Available_interndetails_Val = $Available_Intern_Position_details_obj->setAvailable_intern_Details($Available_interndetails_sql_qry);

  //echo "Updated val ->".$Available_interndetails_Val;

}
      $Available_Interndetails_arr = array();
      $Intersted_students_arr = array();
      $Hired_students_arr = array();

      $Available_Interndetails_arr = $Available_Intern_Position_details_obj->retrieveAvailable_intern_Details();

      if(isset($Available_Interndetails_arr) && (count($Available_Interndetails_arr) > 0) ){

        $arr_keys = array_keys($Available_Interndetails_arr);

        foreach($arr_keys as $key ){
          $i = 0;

          $Available_Interndetails_arr[$key]['intern_type_name']= ReverseMap_InternType($Available_Interndetails_arr[$key]['intern_type_id']);
          $Available_Interndetails_arr[$key]['intern_jobgroup_name'] = ReverseMap_JobGroup($Available_Interndetails_arr[$key]['intern_jobgroup_id']);
          $Available_Interndetails_arr[$key]['intern_updated_date']=date('Y',strtotime($Available_Interndetails_arr[$key]['intern_updated_date']));

          /*$Intersted_students_count = $Available_Intern_Position_details_obj->Interested_Student_count($key);

          if($Intersted_students_count > 0)
          {

            $Intersted_students_arr_from_model = $Available_Intern_Position_details_obj->Interested_Students_val($key);
            // Get Unique Array Keys
            $Interested_keys = array_keys($Intersted_students_arr_from_model);

            foreach($Interested_keys as $Interested_key )
            {
              $Intersted_students_arr[$key][$Interested_key]['student_id'] =$Intersted_students_arr_from_model[$Interested_key]['student_id'];
              $Intersted_students_arr[$key][$Interested_key]['student_name'] =$Intersted_students_arr_from_model[$Interested_key]['student_name'];
              $i++;
            }

          }  */

        }
      }

      if($Available_interndetails_Val >= 1)
      {
        $_GET['info']="info=updated";
        include("../View/Positions.php");
      }
      else if($Delete_Available_interndetails_Val >=1){
        $_GET['info']="info=deleted";
        include("../View/Positions.php");

      }
      else{
        # code...
        include("../View/Positions.php");
      }


?>
