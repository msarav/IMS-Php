<?
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$UserID = $_SESSION['UserID'];
$ProfileType = 	$_SESSION['User Type'];
$StudentID = $_SESSION['StudentId'];

require_once("../Model/UploadDetails_PDO.php");
require_once("Lookup_Controller.php");


if(isset($_GET['InterestedPosition_id']))
{
    $Position_id = $_GET['InterestedPosition_id'];

    $Available_Intern_Position_details_obj = new Available_Intern_Position_details();

    $Intersted_students_arr =$Available_Intern_Position_details_obj->Interested_Students_val($Position_id);
    ?>
    <form class="form-horizontal" name="Confirm_hiring" action="../Controller/Upload_interndetails_Controller.php" method="post" >

    <input type="hidden"  name="Position_id" value="<?echo $Position_id;?>" />

    <table class="table table-striped table-bordered bootstrap-datatable datatable">
        <thead>
          <tr>
            <th>Student ID</th>
            <th>Student Name</th>
            <th style="text-align:center">Confirm to Hire</th>
          </tr>
        </thead>
        <tbody>
        <?
        $arr_keys = array_keys($Intersted_students_arr);

        foreach($arr_keys as $key ){
        ?>
        <tr>
          <td>  <? echo  $Intersted_students_arr[$key]['student_id'];  ?> </td>
          <td>  <? echo   $Intersted_students_arr[$key]['student_name'];   ?> </td>
          <td class="center" style="text-align:center">
            <input type="checkbox" name="confirm_hire_<?echo $key;?>" id="confirm_hire_<?echo $key;?>" value="<?echo $key;?>_selected">
          </td>
        </tr>
        <? } ?>

        </tbody>
      </table>

      <div class="form-actions">
        <button type="submit" name="Update_hire_status" class="btn btn-primary">Confirm changes</button>
      </div>
      </fieldset>
    </form>

<?

}

if(isset($_GET['HiredPosition_id']))
{
    $Position_id = $_GET['HiredPosition_id'];

    $Available_Intern_Position_details_obj = new Available_Intern_Position_details();

    $Intersted_students_arr =$Available_Intern_Position_details_obj->Hired_Students_val($Position_id);
    ?>

    <table class="table table-striped table-bordered bootstrap-datatable datatable">
        <thead>
          <tr>
            <th>Student ID</th>
            <th>Student Name</th>
          </tr>
        </thead>
        <tbody>
        <?
      //  var_dump($Intersted_students_arr);
      //  exit();

        foreach($Intersted_students_arr as $Intersted_students ){
        ?>
        <tr>
          <td>  <? echo  $Intersted_students['student_id'];  ?> </td>
          <td>  <? echo   $Intersted_students['student_name'];   ?> </td>
        </tr>
        <? } ?>

        </tbody>
      </table>

<?

}

if(isset($_GET['Available_Position_id']))
{
    $Position_id = $_GET['Available_Position_id'];

    $Available_Intern_Position_details_obj = new Available_Intern_Position_details();

    $Available_position_arr =$Available_Intern_Position_details_obj->retrieveAvailable_Position_Details($Position_id);

    //var_dump($Available_position_arr);

    ?>

    <form class="form-horizontal" name="Upload_Intern_Positions_form" action="../Controller/Upload_interndetails_Controller.php" method="post" onsubmit="return check_upload_form()">
      <fieldset>

        <div class="control-group">
          <label class="control-label" for="Intern_type">Internship Type</label>
          <div class="controls">
            <div class="input">

              <select id="Intern_type" name="Intern_type" disabled>
                <option value="<?echo ReverseMap_InternType($Available_position_arr['intern_type']); ?>"> <?echo ReverseMap_InternType($Available_position_arr['intern_type']); ?> </option>
              </select>

            </div>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="Intern_payment_type">Payment Type</label>
          <div class="controls">
            <div class="input">

                <? echo $Available_position_arr['intern_payment']; ?>

            </div>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="Company_name">Company name</label>
          <div class="controls">
            <div class="input">
               <input id="Company_name" name="Company_name" size="16" type="text" value="<? echo $Available_position_arr['company_name']; ?>" disabled/>
            </div>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="Company_addr">Company Address</label>
          <div class="controls ">
            <div class="input">
               <input  id="Company_addr" name="Company_addr" size="30" type="text" placeholder="Address" value="<? echo $Available_position_arr['company_addr_doorno']; ?>" disabled/>
            </div>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="Company_addr">Company City</label>
          <div class="controls ">
            <div class="input">
               <input class="span2" id="Company_city" name="Company_city" size="30" type="text" placeholder="City" value="<? echo $Available_position_arr['company_addr_city']; ?>" disabled>
            </div>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="Company_addr">Postal Code</label>
          <div class="controls ">
            <div class="input">
              <input class="span2" id="Company_PostalCode" name="Company_PostalCode" size="30" type="text" placeholder="Postal Code" value="<? echo $Available_position_arr['company_addr_postalcode']; ?>" disabled>
            </div>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="Company_Phonenum">Org - Contact Info</label>
          <div class="controls">
            <div class="input">
               <input class="span2" id="Company_Phonenum" name="Company_Phonenum" size="30" type="text" placeholder="Org Phone num" value="<? echo $Available_position_arr['org_phonenum']; ?>" disabled />
               </a>
            </div>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="Company_Phonenum">Org - Website</label>
          <div class="controls">
            <div class="input">
               <a href="<? echo "http://".$Available_position_arr['org_website']; ?>">
                  <? echo $Available_position_arr['org_website']; ?>
               </a>
            </div>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="Company_POC_Fname">POC - First Name</label>
          <div class="controls">
            <div class="input">
               <input class="span3" id="Company_POC_Fname" name="Company_POC_Fname" size="30" type="text" placeholder="First Name" value="<? echo $Available_position_arr['poc_fname']; ?>" disabled/>
            </div>
          </div>
        </div>


        <div class="control-group">
          <label class="control-label" for="Company_POC_Fname">POC - Last Name</label>
          <div class="controls">
            <div class="input">
               <input class="span3" id="Company_POC_Lname" name="Company_POC_Lname" size="30" type="text" placeholder="Last Name" value="<? echo $Available_position_arr['poc_lname']; ?>" disabled/>
            </div>
          </div>
        </div>


        <div class="control-group">
          <label class="control-label" for="Company_POC_Fname">POC - Email</label>
          <div class="controls">
            <div class="input">
               <input class="span4" id="Company_POCEmail" name="Company_POCEmail" size="30" type="text" placeholder="POC E-mail" value="<? echo $Available_position_arr['poc_email']; ?>" disabled/>
            </div>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="Company_POC_Position">POC - Position</label>
          <div class="controls">
            <div class="input">
               <input id="Company_POC_Position" name="Company_POC_Position" size="30" type="text" value="<? echo $Available_position_arr['poc_position']; ?>" disabled />
            </div>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="Job_Position">Job - Position</label>
          <div class="controls">
            <div class="input">
               <input class="span3" id="Job_Position" name="Job_Position" size="30" type="text" placeholder="Position" value="<? echo $Available_position_arr['poc_position']; ?>" disabled/>
            </div>
          </div>
        </div>


        <div class="control-group">
          <label class="control-label" for="Job_Position">Job Group</label>
          <div class="controls">
            <div class="input">
                <select id="Job_group" name="Job_group" disabled>
                  <option value="<?echo ReverseMap_JobGroup($Available_position_arr['intern_jobgroup']); ?>"> <?echo ReverseMap_JobGroup($Available_position_arr['intern_jobgroup']); ?> </option>
                </select>
            </div>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="Intern_PositionNotes">Job Description</label>
          <div class="controls">
            <div class="input">
              <textarea id="Job_Desc" name="Job_Desc" rows="8" style="width:22em;" value="<? echo $Available_position_arr['job_desc']; ?>" disabled></textarea>
            </div>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="Intern_PositionNotes">Job Responsibilities</label>
          <div class="controls">
            <div class="input">
              <textarea id="Job_Responsibility"  name="Job_Responsibility" rows="8" style="width:22em;"  value="<? echo $Available_position_arr['job_responsibility']; ?>" disabled></textarea>
            </div>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="Intern_PositionNotes">Requirements</label>
          <div class="controls">
            <div class="input">
              <textarea id="Job_Reqmnts" name="Job_Reqmnts" rows="8" style="width:22em;" value="<? echo $Available_position_arr['intern_reqmnts']; ?>" disabled></textarea>
            </div>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="Intern_PositionNotes">Notes</label>
          <div class="controls">
            <div class="input">
              <textarea id="Intern_PositionNotes" name="Intern_PositionNotes" rows="8" style="width:22em;" value="<? echo $Available_position_arr['intern_notes']; ?>" disabled></textarea>
            </div>
          </div>
        </div>

      </fieldset>

    </form>

<?

}

?>
