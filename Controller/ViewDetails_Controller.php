<?
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$UserID = $_SESSION['UserID'];
$ProfileType = 	$_SESSION['User Type'];
$StudentID = $_SESSION['StudentId'];

require_once("Lookup_Controller.php");
require_once("../Model/UploadDetails_PDO.php");


if(isset($_GET['Student_id']))
{
  $Student_id = $_GET['Student_id'];

  $Student_PreIntern_details_obj = new Student_PreIntern_details();

  $StuPreIntern_Details = $Student_PreIntern_details_obj->retrieveStudent_PreIntern_details($Student_id);

  ?>
  <form class="form-horizontal" name="UpdateStuPreIntern_form" action="../Controller/Upload_Controller.php" method="post" onsubmit="return check_upload_form()">
    <fieldset>

      <div class="control-group">
        <label class="control-label">Semester Registered</label>
        <div class="controls">
          <label class="radio">

             <? if((isset($StuPreIntern_Details['Student_RegisteredSemester'])) && ($StuPreIntern_Details['Student_RegisteredSemester'] == 'Fall')) {?>
                      <input type="radio" name="Sem_Regtd" id="Sem_Regtd_fall" value="Fall" checked>
                <? }else {?>
                      <input type="radio" name="Sem_Regtd" id="Sem_Regtd_fall" value="Fall" >
                  <? } ?>
                      Fall

          </label>
          <div style="clear:both"></div>
          <label class="radio">

            <? if((isset($StuPreIntern_Details['Student_RegisteredSemester'])) && ($StuPreIntern_Details['Student_RegisteredSemester'] == 'Winter')) {?>
                     <input type="radio" name="Sem_Regtd" id="Sem_Regtd_winter" value="Winter" checked>
               <? }else {?>
                       <input type="radio" name="Sem_Regtd" id="Sem_Regtd_winter" value="Winter">
               <? } ?>
               Winter

          </label>
        </div>
      </div>

      <div class="control-group">
        <label class="control-label" for="Year">Year</label>
        <div class="controls">
          <select id="Year" name="Year_Regtd">
            <?
            foreach($FormLookup_Details_years as $years)
            {
                if((isset($StuPreIntern_Details['Student_RegisteredYear'])) && ($StuPreIntern_Details['Student_RegisteredYear'] == $years)) {?>
                      <option value="<?echo $years; ?>" selected> <?echo $years;?> </option>
                 <? }else {?>
                     <option value="<?echo $years; ?>"> <?echo $years;?> </option>
            <?      }
            }
            ?>
          </select>
        </div>
      </div>
    </fieldset>

    <fieldset>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Personal Information</h3>
        </div>
        <div class="panel-body">

          <div class="control-group">
            <label class="control-label" for="Stu_id">Student ID</label>
            <div class="controls">
              <div class="input">
                <input id="Student_id_disabled" name="Student_id_disabled" size="16" type="text" value="<?echo $Student_id;?>" disabled/>
                <input id="Student_id" name="Student_id" size="16" type="text" value="<?echo $Student_id;?>" style="display:none"/>
                <input id="Student_id_update" name="Student_id_update" size="16" type="hidden" value="<?echo $Student_id;?>" style="display:none"/>

              </div>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="Stu_fname">First Name</label>
            <div class="controls">
              <div class="input">
                <input id="Student_fname_disabled" name="Student_fname_disabled" size="16" type="text" value="<?echo $StuPreIntern_Details['Student_FName'];?>" disabled/>
                <input id="Student_fname" name="Student_fname" size="16" type="text" value="<?echo $StuPreIntern_Details['Student_FName'];?>" style="display:none"/>

              </div>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="Stu_id">Last Name</label>
            <div class="controls">
              <div class="input">
                <input id="Student_lname_disabled" name="Student_lname_disabled" size="16" type="text" value="<?echo $StuPreIntern_Details['Student_LName'];?>" disabled/>
                <input id="Student_lname" name="Student_lname" size="16" type="text" value="<?echo $StuPreIntern_Details['Student_LName'];?>" style="display:none"/>

              </div>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="Stu_email">E-mail</label>
            <div class="controls">
              <div class="input">
                <input id="Student_email_disabled" name="Student_email_disabled" size="16" type="text" value="<?echo $StuPreIntern_Details['Student_Email'];?>" disabled/>
                <input id="Student_email" name="Student_email" size="16" type="text" value="<?echo $StuPreIntern_Details['Student_Email'];?>" style="display:none"/>

              </div>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="Stu_phnum">Phone num</label>
            <div class="controls">
              <div class="input">
                 <? if((isset($StuPreIntern_Details['Student_Phonenum']))) {?>
                    <input id="Student_phnum" name="Student_phnum" size="16" type="text" value="<?echo $StuPreIntern_Details['Student_Phonenum'];?>"/>
                 <? }else {?>
                     <input id="Student_phnum" name="Student_phnum" size="16" type="text"/>
                  <? } ?>
              </div>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Gender</label>
            <div class="controls">
              <label class="radio">
                 <? if((isset($StuPreIntern_Details['Student_Gender'])) && ($StuPreIntern_Details['Student_Gender'] == "Male")) {?>
                       <input type="radio" name="Gender" id="Gender_male" value="Male" checked="">
                 <? }else {?>
                      <input type="radio" name="Gender" id="Gender_male" value="Male" >
                 <? } ?>
                  Male
              </label>

              <div style="clear:both"></div>
              <label class="radio">
                <? if((isset($StuPreIntern_Details['Student_Gender'])) && ($StuPreIntern_Details['Student_Gender'] == "Female")) {?>
                     <input type="radio" name="Gender" id="Gender_female" value="Female" checked="">
                <? }else {?>
                     <input type="radio" name="Gender" id="Gender_female" value="Female">
                <? } ?>
                 Female
              </label>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="Stu_program">Current Program</label>
            <div class="controls">
              <div class="input">
                <? if((isset($StuPreIntern_Details['Student_Degree']))) {?>
                   <input id="Student_program" name="Student_program" size="16" type="text" value="<?echo $StuPreIntern_Details['Student_Degree'];?>"/>
                <? }else {?>
                    <input id="Student_program" name="Student_program" size="16" type="text"/>
                 <? } ?>
              </div>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Status</label>
            <div class="controls">
              <label class="radio">
                <? if((isset($StuPreIntern_Details['Student_Status'])) && ($StuPreIntern_Details['Student_Status'] == "International_student")) {?>
                     <input type="radio" name="Status" id="Status_International_student" value="International_student" checked="">
                <? }else {?>
                     <input type="radio" name="Status" id="Status_International_student" value="International_student">
                <? } ?>
                International Student
              </label>
              <div style="clear:both"></div>
              <label class="radio">
                <? if((isset($StuPreIntern_Details['Student_Status'])) && ($StuPreIntern_Details['Student_Status'] == "pr_citizen")) {?>
                     <input type="radio" name="Status" id="Status_PR_citizen" value="pr_citizen" checked="">
                <? }else {?>
                     <input type="radio" name="Status" id="Status_PR_citizen" value="pr_citizen">
                <? } ?>
                PR/Citizen
              </label>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="Country">Country</label>
            <div class="controls">
              <select id="Student_Country" name="Student_Country">
                <?
                foreach($FormLookup_Details_countries as $country)
                {
                  if((isset($StuPreIntern_Details['Student_Country'])) && ($StuPreIntern_Details['Student_Country'] == $country)) {?>
                        <option value="<?echo $country; ?>" selected> <?echo $country;?> </option>
                  <? }else {?>
                        <option value="<?echo $country; ?>"> <?echo $country;?> </option>
                  <? }
                }
                ?>
              </select>
            </div>
          </div>

       </div>
      </div>

    <div class="col-xs-12" style="height:1.5em;"></div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Education and Training</h3>
      </div>
      <div class="panel-body">
        <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Category</th>
                <th>Major</th>
                <th>GPA</th>
                <th>Univ/Org</th>
                <th>Country</th>
                <th>MM</th>
                <th>YY</th>
              </tr>
            </thead>
            <tbody>
            <tr>
              <td>Undergraduate degrees</td>
              <td>
                <? if((isset($StuPreIntern_Details['EduDetails_UnderGradMajor']))) {?>
                  <input type="text" name="UG_major" style="width:6em;" value="<?echo $StuPreIntern_Details['EduDetails_UnderGradMajor'];?>"/>
                <? }else {?>
                    <input type="text" name="UG_major" style="width:6em;"/>
                 <? } ?>
              </td>
              <td class="center">
                <? if((isset($StuPreIntern_Details['EduDetails_UnderGradGPA'])) && $StuPreIntern_Details['EduDetails_UnderGradGPA'] > 0) {?>
                   <input type="text" name="UG_gpa" style="width:5em;" value="<?echo $StuPreIntern_Details['EduDetails_UnderGradGPA'];?>"/>
                <? }else {?>
                     <input type="text" name="UG_gpa" style="width:5em;"/>
                 <? } ?>
              </td>
              <td class="center">
                <? if((isset($StuPreIntern_Details['EduDetails_UnderGradUniversity']))) {?>
                   <input type="text" name="UG_univ" style="width:18em;" value="<?echo $StuPreIntern_Details['EduDetails_UnderGradUniversity'];?>"/>
                <? }else {?>
                     <input type="text" name="UG_univ" style="width:18em;"/>
                 <? } ?>
              </td>

              <td class="center">
                <? if((isset($StuPreIntern_Details['EduDetails_UnderGradCountry']))) {?>
                     <input type="text" name="UG_country" style="width:6em;" value="<?echo $StuPreIntern_Details['EduDetails_UnderGradCountry'];?>"/>
                <? }else {?>
                       <input type="text" name="UG_country" style="width:6em;"/>
                 <? } ?>
              </td>
              <td class="center">
                <? if((isset($StuPreIntern_Details['EduDetails_UnderGradDate'])) && $StuPreIntern_Details['EduDetails_UnderGradDate'] !== "null" && $StuPreIntern_Details['EduDetails_UnderGradDate'] !== "0000-00-00") {?>
                     <input type="text" name="UG_mm" style="width:5em;" value="<?echo date('m',strtotime($StuPreIntern_Details['EduDetails_UnderGradDate']));?>"/>
                <? }else {?>
                     <input type="text" name="UG_mm" style="width:5em;"/>
                 <? } ?>

              </td>
              <td class="center">
                <? if((isset($StuPreIntern_Details['EduDetails_UnderGradDate'])) && $StuPreIntern_Details['EduDetails_UnderGradDate'] !== "null" && $StuPreIntern_Details['EduDetails_UnderGradDate'] !== "0000-00-00") {?>
                     <input type="text" name="UG_yyyy" style="width:5em;" value="<?echo date('Y',strtotime($StuPreIntern_Details['EduDetails_UnderGradDate']));?>"/>
                <? }else {?>
                     <input type="text" name="UG_yyyy" style="width:5em;"/>
                 <? } ?>
                 </td>
            </tr>

            <tr>
              <td>Graduate degrees</td>
              <td>
                <? if((isset($StuPreIntern_Details['EduDetails_GradMajor']))) {?>
                     <input type="text" name="PG_major" style="width:6em;" value="<?echo $StuPreIntern_Details['EduDetails_GradMajor'];?>"/>
                <? }else {?>
                       <input type="text" name="PG_major" style="width:6em;"/>
                 <? } ?>
              </td>
              <td class="center">
                <? if((isset($StuPreIntern_Details['EduDetails_GradGPA'])) && $StuPreIntern_Details['EduDetails_GradGPA'] > 0 ) {?>
                     <input type="text" name="PG_gpa" style="width:5em;" value="<?echo $StuPreIntern_Details['EduDetails_GradGPA'];?>"/>
                <? }else {?>
                       <input type="text" name="PG_gpa" style="width:5em;"/>
                 <? } ?>
              </td>
              <td class="center">
                <? if((isset($StuPreIntern_Details['EduDetails_GradUniversity']))) {?>
                     <input type="text" name="PG_univ" style="width:18em;" value="<?echo $StuPreIntern_Details['EduDetails_GradUniversity'];?>"/>
                <? }else {?>
                     <input type="text" name="PG_univ" style="width:18em;"/>
                 <? } ?>

              </td>
              <td class="center">
                <? if((isset($StuPreIntern_Details['EduDetails_GradCountry']))) {?>
                     <input type="text" name="PG_country" style="width:6em;" value="<?echo $StuPreIntern_Details['EduDetails_GradCountry'];?>"/>
                <? }else {?>
                     <input type="text" name="PG_country" style="width:6em;"/>
                 <? } ?>

              </td>
              <td class="center">
                <? if((isset($StuPreIntern_Details['EduDetails_GradDate'])) && $StuPreIntern_Details['EduDetails_GradDate'] !== "null" && $StuPreIntern_Details['EduDetails_GradDate'] !== "0000-00-00" ) {?>
                     <input type="text" name="PG_mm" style="width:5em;" value="<?echo date('m',strtotime($StuPreIntern_Details['EduDetails_GradDate']));?>"/>
                <? }else {?>
                     <input type="text" name="PG_mm" style="width:5em;"/>
                 <? } ?>
              </td>
              <td class="center">
                <? if((isset($StuPreIntern_Details['EduDetails_GradDate'])) && $StuPreIntern_Details['EduDetails_GradDate'] !== "null" && $StuPreIntern_Details['EduDetails_GradDate'] !== "0000-00-00" ) {?>
                     <input type="text" name="PG_yyyy" style="width:5em;" value="<?echo date('Y',strtotime($StuPreIntern_Details['EduDetails_GradDate']));?>"/>
                <? }else {?>
                     <input type="text" name="PG_yyyy" style="width:5em;"/>
                 <? } ?>
            </td>
            </tr>

            <tr>
              <td colspan="7">Other - List any degrees/diplomas you have</td>
            </tr>

            <tr>
              <td><input type="text" name="Other1_name" style="width:6em;"/></td>
              <td>	<input type="text" name="Other1_major" style="width:6em;"/></td>
              <td class="center">  <input type="text" name="Other1_gpa" style="width:5em;"/>  </td>
              <td class="center">  <input type="text" name="Other1_univ" style="width:18em;"/> </td>
              <td class="center">  <input type="text" name="Other1_country" style="width:6em;"/> </td>
              <td class="center">  <input type="text" name="Other1_mm" style="width:5em;"/>  </td>
              <td class="center">  <input type="text" name="Other1_yyyy" style="width:5em;"/>  </td>
            </tr>

            <tr>
              <td><input type="text" name="Other2_name" style="width:6em;"/></td>
              <td>	<input type="text" name="Other2_major" style="width:6em;"/></td>
              <td class="center">  <input type="text" name="Other2_gpa" style="width:5em;"/>  </td>
              <td class="center">  <input type="text" name="Other2_univ" style="width:18em;"/> </td>
              <td class="center">  <input type="text" name="Other2_country" style="width:6em;"/> </td>
              <td class="center">  <input type="text" name="Other2_mm" style="width:5em;"/>  </td>
              <td class="center">  <input type="text" name="Other2_yyyy" style="width:5em;"/>  </td>
            </tr>

            <!--
            <tr>
              <td><input type="text" name="Other_name" style="width:6em;"/></td>
              <td>	<input type="text" name="Other_major" style="width:6em;"/></td>
              <td class="center">  <input type="text" name="Other3_gpa" style="width:5em;"/>  </td>
              <td class="center">  <input type="text" name="Other3_univ" style="width:18em;"/> </td>
              <td class="center">  <input type="text" name="Other3_country" style="width:6em;"/> </td>
              <td class="center">  <input type="text" name="Other3_mm" style="width:5em;"/>  </td>
              <td class="center">  <input type="text" name="Other3_yy" style="width:5em;"/>  </td>
            </tr>
          -->

            </tbody>
          </table>
      </div>
    </div>

    <div class="col-xs-12" style="height:1.5em;"></div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Certification Details</h3>
      </div>
      <div class="panel-body">
        <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Title</th>
                <th>Body</th>
                <th>Issued Year</th>
                <th>Valid Till Year</th>
              </tr>
            </thead>

            <tbody>
            <tr>
              <td>
                <? if((isset($StuPreIntern_Details['EduDetails_Cert1Title']))) {  ?>
                     <input type="text" name="Cert1_title" style="width:22em;" value="<?echo $StuPreIntern_Details['EduDetails_Cert1Title'];?>"/>
                <? }else {?>
                    <input type="text" name="Cert1_title" style="width:22em;"/>
                 <? } ?>
              </td>
              <td>
                <? if((isset($StuPreIntern_Details['EduDetails_Cert1Body']))) {?>
                     <input type="text" name="Cert1_body" style="width:22em;" value="<?echo $StuPreIntern_Details['EduDetails_Cert1Body'];?>"/>
                <? }else {?>
                      <input type="text" name="Cert1_body" style="width:22em;"/>
                 <? } ?>
              </td>
              <td class="center">
                <? if((isset($StuPreIntern_Details['EduDetails_Cert1IssuedDate'])) && $StuPreIntern_Details['EduDetails_Cert1IssuedDate'] !== "null" && $StuPreIntern_Details['EduDetails_Cert1IssuedDate'] !== "0000" ) {?>
                     <input type="text" name="Cert1_issuedyear" style="width:4em;" value="<?echo $StuPreIntern_Details['EduDetails_Cert1IssuedDate'];?>"/>
                <? }else {?>
                      <input type="text" name="Cert1_issuedyear" style="width:4em;"/>
                 <? } ?>
               </td>
              <td class="center">
                <? if((isset($StuPreIntern_Details['EduDetails_Cert1ValidityDate'])) && $StuPreIntern_Details['EduDetails_Cert1ValidityDate'] !== "null" && $StuPreIntern_Details['EduDetails_Cert1ValidityDate'] !== "0000" ) {?>
                       <input type="text" name="Cert1_validyear" style="width:4em;" value="<?echo $StuPreIntern_Details['EduDetails_Cert1ValidityDate'];?>"/>
                <? }else {?>
                        <input type="text" name="Cert1_validyear" style="width:4em;"/>
                 <? } ?>
              </td>
            </tr>

            <tr>
              <td>
                <? if((isset($StuPreIntern_Details['EduDetails_Cert2Title']))) {?>
                       <input type="text" name="Cert2_title" style="width:22em;" value"<?echo $StuPreIntern_Details['EduDetails_Cert2Title'];?>"/>
                <? }else {?>
                        <input type="text" name="Cert2_title" style="width:22em;"/>
                 <? } ?>
              </td>
              <td>
                <? if((isset($StuPreIntern_Details['EduDetails_Cert2Body']))) {?>
                       <input type="text" name="Cert2_body" style="width:22em;" value"<?echo $StuPreIntern_Details['EduDetails_Cert2Body'];?>"/>
                <? }else {?>
                        <input type="text" name="Cert2_body" style="width:22em;"/>
                 <? } ?>
              </td>
              <td class="center">
                <? if((isset($StuPreIntern_Details['EduDetails_Cert2IssuedDate'])) && $StuPreIntern_Details['EduDetails_Cert2IssuedDate'] !== "null" && $StuPreIntern_Details['EduDetails_Cert2IssuedDate'] !== "0000") {?>
                       <input type="text" name="Cert2_issuedyear" style="width:4em;" value"<?echo $StuPreIntern_Details['EduDetails_Cert2IssuedDate'];?>"/>
                <? }else {?>
                       <input type="text" name="Cert2_issuedyear" style="width:4em;"/>
                 <? } ?>
              </td>
              <td class="center">
                <? if((isset($StuPreIntern_Details['EduDetails_Cert2ValidityDate'])) && $StuPreIntern_Details['EduDetails_Cert2ValidityDate'] !== "null" && $StuPreIntern_Details['EduDetails_Cert2ValidityDate'] !== "0000") {?>
                          <input type="text" name="Cert2_validyear" style="width:4em;" value"<?echo $StuPreIntern_Details['EduDetails_Cert2ValidityDate'];?>"/>
                <? }else {?>
                         <input type="text" name="Cert2_validyear" style="width:4em;"/>
                 <? } ?>
              </td>
            </tr>

            <tr>
              <td>
                <? if((isset($StuPreIntern_Details['EduDetails_Cert3Title']))) {?>
                       <input type="text" name="Cert3_title" style="width:22em;" value"<?echo $StuPreIntern_Details['EduDetails_Cert3Title'];?>"/>
                <? }else {?>
                        <input type="text" name="Cert3_title" style="width:22em;"/>
                 <? } ?>
              </td>
              <td>
                <? if((isset($StuPreIntern_Details['EduDetails_Cert3Body']))) {?>
                       <input type="text" name="Cert3_body" style="width:22em;" value"<?echo $StuPreIntern_Details['EduDetails_Cert3Body'];?>"/>
                <? }else {?>
                        <input type="text" name="Cert3_body" style="width:22em;"/>
                 <? } ?>
              </td>
              <td class="center">
                <? if((isset($StuPreIntern_Details['EduDetails_Cert3IssuedDate'])) && $StuPreIntern_Details['EduDetails_Cert3IssuedDate'] !== "null" && $StuPreIntern_Details['EduDetails_Cert3IssuedDate'] !== "0000") {?>
                       <input type="text" name="Cert3_issuedyear" style="width:4em;" value"<?echo $StuPreIntern_Details['EduDetails_Cert3IssuedDate'];?>"/>
                <? }else {?>
                        <input type="text" name="Cert3_issuedyear" style="width:4em;"/>
                 <? } ?>
              </td>
              <td class="center">
                <? if((isset($StuPreIntern_Details['EduDetails_Cert3ValidityDate'])) && $StuPreIntern_Details['EduDetails_Cert3ValidityDate'] !== "null" && $StuPreIntern_Details['EduDetails_Cert3ValidityDate'] !== "0000") {?>
                         <input type="text" name="Cert3_validyear" style="width:4em;"  value"<?echo $StuPreIntern_Details['EduDetails_Cert3ValidityDate'];?>"/>
                <? }else {?>
                          <input type="text" name="Cert3_validyear" style="width:4em;"/>
                 <? } ?>
              </td>
            </tr>

            <!--<tr>
              <td><input type="text" name="Cert4_title" style="width:25em;"/></td>
              <td>	<input type="text" name="Cert4_body" style="width:25em;"/></td>
              <td class="center">  <input type="text" name="Cert4_issuedyear" style="width:5em;"/>  </td>
              <td class="center">  <input type="text" name="Cert4_validyear" style="width:5em;"/> </td>
            </tr>
          -->

            </tbody>
          </table>
      </div>
    </div>

    <div class="col-xs-12" style="height:1.5em;"></div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Work Experience</h3>
      </div>
      <div class="panel-body">
        <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th style="width:5em;"> Company </th>
                <th style="width:1.5em;">From (MM)</th>
                <th style="width:3em;">From (YYYY)</th>
                <th style="width:1.5em;">Till (MM)</th>
                <th style="width:3em;">Till (YYYY)</th>
                <th style="width:15em;">Title</th>
                <th style="width:15em;">Duties</th>
              </tr>
            </thead>

            <tbody>
            <tr>
              <td class="center">
                <?

                if((isset($StuPreIntern_Details['WrkExp1_Company']))) {

?>
                       <input type="text" name="Wrkexp1_company" style="width:15em;" value="<?echo $StuPreIntern_Details['WrkExp1_Company'];?>"/>
                <? }else {?>
                        <input type="text" name="Wrkexp1_company" style="width:15em;"/>
                 <? } ?>
              </td>
              <td class="center">
                <? if((isset($StuPreIntern_Details['WrkExp1_FromDate'])) && $StuPreIntern_Details['WrkExp1_FromDate'] !== "null" && $StuPreIntern_Details['WrkExp1_FromDate'] !== "0000" ) {?>
                       <input type="text" name="Wrkexp1_from_month" style="width:1.5em;" value="<?echo date('m',strtotime($StuPreIntern_Details['WrkExp1_FromDate']));?>"/>
                <? }else {?>
                        <input type="text" name="Wrkexp1_from_month" style="width:1.5em;"/>
                 <? } ?>
              </td>
              <td class="center">
                <? if((isset($StuPreIntern_Details['WrkExp1_FromDate']))  && $StuPreIntern_Details['WrkExp1_FromDate'] !== "null" && $StuPreIntern_Details['WrkExp1_FromDate'] !== "0000"  ) {?>
                        <input type="text" name="Wrkexp1_from_year" style="width:3em;" value="<?echo date('Y',strtotime($StuPreIntern_Details['WrkExp1_FromDate']));?>"/>
                <? }else {?>
                        <input type="text" name="Wrkexp1_from_year" style="width:3em;"/>
                 <? } ?>
              </td>
              <td class="center">
                <? if((isset($StuPreIntern_Details['WrkExp1_TillDate']))  && $StuPreIntern_Details['WrkExp1_TillDate'] !== "null" && $StuPreIntern_Details['WrkExp1_TillDate'] !== "0000"  ) {?>
                        <input type="text" name="Wrkexp1_till_month" style="width:1.5em;" value="<?echo date('m',strtotime($StuPreIntern_Details['WrkExp1_TillDate']));?>"/>
                <? }else {?>
                        <input type="text" name="Wrkexp1_till_month" style="width:1.5em;"/>
                 <? } ?>
              </td>
              <td class="center">
                <? if((isset($StuPreIntern_Details['WrkExp1_TillDate']))   && $StuPreIntern_Details['WrkExp1_TillDate'] !== "null" && $StuPreIntern_Details['WrkExp1_TillDate'] !== "0000"  ) {?>
                        <input type="text" name="Wrkexp1_till_year" style="width:3em;" value="<?echo date('Y',strtotime($StuPreIntern_Details['WrkExp1_TillDate']));?>"/>
                <? }else {?>
                        <input type="text" name="Wrkexp1_till_year" style="width:3em;"/>
                 <? } ?>
              </td>
              <td class="center">
                <? if((isset($StuPreIntern_Details['WrkExp1_Title']))) {?>
                        <input type="text" name="Wrkexp1_title" style="width:15em;" value="<?echo $StuPreIntern_Details['WrkExp1_Title'];?>"/>
                <? }else {?>
                        <input type="text" name="Wrkexp1_title" style="width:15em;"/>
                 <? } ?>
              </td>
              <td class="center">
                <? if((isset($StuPreIntern_Details['WrkExp1_Duties']))) {?>
                        <input type="text" name="Wrkexp1_duties" style="width:15em;" value="<?echo $StuPreIntern_Details['WrkExp1_Duties'];?>"/>
                <? }else {?>
                        <input type="text" name="Wrkexp1_duties" style="width:15em;"/>
                 <? } ?>
              </td>
            </tr>

            <tr>
              <td class="center">
                <? if((isset($StuPreIntern_Details['WrkExp2_Company']))) {?>
                       <input type="text" name="Wrkexp2_company" style="width:15em;" value="<?echo $StuPreIntern_Details['WrkExp2_Company'];?>"/>
                <? }else {?>
                        <input type="text" name="Wrkexp2_company" style="width:15em;"/>
                 <? } ?>
              </td>
              <td class="center">
                <? if((isset($StuPreIntern_Details['WrkExp2_FromDate'])) && $StuPreIntern_Details['WrkExp2_FromDate'] !== "null" && $StuPreIntern_Details['WrkExp2_FromDate'] !== "0000" ) {?>
                       <input type="text" name="Wrkexp2_from_month" style="width:1.5em;" value="<?echo date('m',strtotime($StuPreIntern_Details['WrkExp2_FromDate']));?>"/>
                <? }else {?>
                        <input type="text" name="Wrkexp2_from_month" style="width:1.5em;"/>
                 <? } ?>
              </td>
              <td class="center">
                <? if((isset($StuPreIntern_Details['WrkExp2_FromDate']))  && $StuPreIntern_Details['WrkExp2_FromDate'] !== "null" && $StuPreIntern_Details['WrkExp2_FromDate'] !== "0000"  ) {?>
                        <input type="text" name="Wrkexp2_from_year" style="width:3em;" value="<?echo date('Y',strtotime($StuPreIntern_Details['WrkExp2_FromDate']));?>"/>
                <? }else {?>
                        <input type="text" name="Wrkexp2_from_year" style="width:3em;"/>
                 <? } ?>
              </td>
              <td class="center">
                <? if((isset($StuPreIntern_Details['WrkExp2_TillDate']))  && $StuPreIntern_Details['WrkExp2_TillDate'] !== "null" && $StuPreIntern_Details['WrkExp2_TillDate'] !== "0000"  ) {?>
                        <input type="text" name="Wrkexp2_till_month" style="width:1.5em;" value="<?echo date('m',strtotime($StuPreIntern_Details['WrkExp2_TillDate']));?>"/>
                <? }else {?>
                        <input type="text" name="Wrkexp2_till_month" style="width:1.5em;"/>
                 <? } ?>
              </td>
              <td class="center">
                <? if((isset($StuPreIntern_Details['WrkExp2_TillDate']))   && $StuPreIntern_Details['WrkExp2_TillDate'] !== "null" && $StuPreIntern_Details['WrkExp2_TillDate'] !== "0000"  ) {?>
                        <input type="text" name="Wrkexp2_till_year" style="width:3em;" value="<?echo date('Y',strtotime($StuPreIntern_Details['WrkExp2_TillDate']));?>"/>
                <? }else {?>
                        <input type="text" name="Wrkexp2_till_year" style="width:3em;"/>
                 <? } ?>
              </td>
              <td class="center">
                <? if((isset($StuPreIntern_Details['WrkExp2_Title']))) {?>
                        <input type="text" name="Wrkexp2_title" style="width:15em;" value="<?echo $StuPreIntern_Details['WrkExp2_Title'];?>"/>
                <? }else {?>
                        <input type="text" name="Wrkexp2_title" style="width:15em;"/>
                 <? } ?>
              </td>
              <td class="center">
                <? if((isset($StuPreIntern_Details['WrkExp2_Duties']))) {?>
                        <input type="text" name="Wrkexp2_duties" style="width:15em;" value="<?echo $StuPreIntern_Details['WrkExp2_Duties'];?>"/>
                <? }else {?>
                        <input type="text" name="Wrkexp2_duties" style="width:15em;"/>
                 <? } ?>
              </td>
            </tr>

            <tr>
              <td class="center">  <input type="text" name="Wrkexp3_company" style="width:15em;"/>  </td>
              <td class="center">  <input type="text" name="Wrkexp3_from_month" style="width:1.5em;"/>  </td>
              <td class="center">  <input type="text" name="Wrkexp3_from_year" style="width:3em;"/>  </td>
              <td class="center">  <input type="text" name="Wrkexp3_till_month" style="width:1.5em;"/>  </td>
              <td class="center">  <input type="text" name="Wrkexp3_till_year" style="width:3em;"/>  </td>
              <td class="center">  <input type="text" name="Wrkexp3_title" style="width:15em;"/>  </td>
              <td class="center">  <input type="text" name="Wrkexp3_duties" style="width:15em;"/>  </td>

            </tr>

            <tr>
              <td class="center">  <input type="text" name="Wrkexp4_company" style="width:15em;"/>  </td>
              <td class="center">  <input type="text" name="Wrkexp4_from_month" style="width:1.5em;"/>  </td>
              <td class="center">  <input type="text" name="Wrkexp4_from_year" style="width:3em;"/>  </td>
              <td class="center">  <input type="text" name="Wrkexp4_till_month" style="width:1.5em;"/>  </td>
              <td class="center">  <input type="text" name="Wrkexp4_till_year" style="width:3em;"/>  </td>
              <td class="center">  <input type="text" name="Wrkexp4_title" style="width:15em;"/>  </td>
              <td class="center">  <input type="text" name="Wrkexp4_duties" style="width:15em;"/>  </td>

            </tr>

            <tr>
              <td class="center">  <input type="text" name="Wrkexp5_company" style="width:15em;"/>  </td>
              <td class="center">  <input type="text" name="Wrkexp5_from_month" style="width:1.5em;"/>  </td>
              <td class="center">  <input type="text" name="Wrkexp5_from_year" style="width:3em;"/>  </td>
              <td class="center">  <input type="text" name="Wrkexp5_till_month" style="width:1.5em;"/>  </td>
              <td class="center">  <input type="text" name="Wrkexp5_till_year" style="width:3em;"/>  </td>
              <td class="center">  <input type="text" name="Wrkexp5_title" style="width:15em;"/>  </td>
              <td class="center">  <input type="text" name="Wrkexp5_duties" style="width:15em;"/>  </td>

            </tr>

            </tbody>
          </table>
      </div>
    </div>

    <div class="col-xs-12" style="height:1.5em;"></div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Skills Endorsement</h3>
      </div>
      <div class="panel-body">

        <div class="control-group"  >
        <label class="control-label" for="Tech_skills">Technical</label>
          <div class="controls" >
            <select id="Tech_skills" name="Tech_skills[]" multiple data-rel="chosen" style="width:53em;">
              <?
              foreach($FormLookup_Details_TECHskills as $tech_skill)
              {
                  if( count($StuPreIntern_Details['Skillset_name']) > 0){

                    if (in_array($tech_skill, $StuPreIntern_Details['Skillset_name'])){
                ?>
                         <option value="<?echo $tech_skill; ?>" selected> <?echo $tech_skill;?> </option>
                <?
                       }
                       else {
                         # code...?>
                         <option value="<?echo $tech_skill; ?>"> <?echo $tech_skill;?> </option>
                       <?
                       }
                     }
                  else
                  {   ?>
                      <option value="<?echo $tech_skill; ?>"> <?echo $tech_skill;?> </option>
                  <?  }
              }
              ?>

            </select>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="Tech_skills_other">Other Technical skills</label>
          <div class="controls">
            <div class="input">
              <input id="Tech_skills_other" name="Tech_skills_other" size="16" type="text"/>
            </div>
          </div>
        </div>

        <div class="control-group">
        <label class="control-label" for="CMS_skills">CMS</label>
          <div class="controls input-lg">
            <select id="CMS_skills" name="CMS_skills[]" multiple data-rel="chosen" style="width:53em;" >
              <?
              foreach($FormLookup_Details_CMSskills as $CMS_skill)
              {
                  if( count($StuPreIntern_Details['Skillset_name']) > 0){

                    if (in_array($CMS_skill, $StuPreIntern_Details['Skillset_name'])){
                ?>
                         <option value="<?echo $CMS_skill; ?>" selected> <?echo $CMS_skill;?> </option>
                <?
                       }
                       else {
                         # code... ?>
                         <option value="<?echo $CMS_skill; ?>"> <?echo $CMS_skill;?> </option>
                       <? }
                     }
                  else
                  { ?>
                      <option value="<?echo $CMS_skill; ?>"> <?echo $CMS_skill;?> </option>
                  <? }
               }
              ?>
            </select>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="CMS_skills_other">Other CMS skills</label>
          <div class="controls">
            <div class="input">
              <input id="CMS_skills_other" name="CMS_skills_other" size="16" type="text"/>
            </div>
          </div>
        </div>

        <div class="control-group">
        <label class="control-label" for="OS_skills">Operating System</label>
          <div class="controls">
            <select id="OS_skills" name="OS_skills[]" multiple data-rel="chosen" style="width:53em;">
              <?
              foreach($FormLookup_Details_OSskills as $OS_skill)
              {
                if( count($StuPreIntern_Details['Skillset_name']) > 0){

                    if (in_array($OS_skill, $StuPreIntern_Details['Skillset_name'])){
                  ?>
                           <option value="<?echo $CMS_skill; ?>" selected> <?echo $OS_skill;?> </option>
                  <?
                       }
                       else {
                         # code... ?>
                         <option value="<?echo $OS_skill; ?>"> <?echo $OS_skill;?> </option>
                       <? }
                 }
                 else
                  { ?>
                     <option value="<?echo $OS_skill; ?>"> <?echo $OS_skill;?> </option>
                  <? }
               }
              ?>
            </select>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="OS_skills_other">Other OS skills</label>
          <div class="controls">
            <div class="input">
              <input id="OS_skills_other" name="OS_skills_other" size="20" type="text"/>
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="form-actions">
      <button type="submit" name="Upload_StuPreIntern_form" class="btn btn-primary">Update changes</button>
      <button type="reset" class="btn">Cancel</button>
    </div>
    </fieldset>
  </form>

<?
}


if(isset($_GET['Position_id']))
{
    $Position_id = $_GET['Position_id'];

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
               <a href="<? echo $Available_position_arr['org_website']; ?>">
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
