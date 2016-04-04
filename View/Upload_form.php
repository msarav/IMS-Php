<!DOCTYPE html>
<?
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_SESSION['UserID']))
{
	$UserID = $_SESSION['UserID'];
	$Username = $_SESSION['User Name'];
	$ProfileType =$_SESSION['User Type'];

  include("../Controller/Lookup_Controller.php");
//  var_dump($FormLookup_Details_years);

  //exit();
?>
<html lang="en">
<head>

	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Internship Mgmt System</title>
	<meta name="description" content="IMS">
	<meta name="author" content="Satish">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->

	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->

	<!-- start: CSS -->
	<link id="bootstrap-style" href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="../css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="../css/style-responsive.css" rel="stylesheet">
	<link href='../css/google_font_api.css' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->


	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->

	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->

	<!-- start: Favicon -->
	<link rel="shortcut icon" href="../img/favicon.ico">
	<!-- end: Favicon -->

  <script type="text/javascript">
      function check_upload_form()
      {

        //alert("false triggered");
        return true;

      }
  </script>
</head>

<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="../index.php"><span>Internship Mgmt System (IMS) </span></a>

				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">

						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> <?echo 	$Username;?>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Account Settings</span>
								</li>
								<li><a href="#"><i class="halflings-icon user"></i> Profile</a></li>
								<li><a href="../Controller/Logout_Controller.php"><i class="halflings-icon off"></i> Logout</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->

			</div>
		</div>
	</div>
	<!-- start: Header -->

		<div class="container-fluid-full" >
			<div class="row-fluid" >

				<!-- start: Main Menu -->
				<div id="sidebar-left" class="span2" >
					<div class="nav-collapse sidebar-nav">
						<ul class="nav nav-tabs nav-stacked main-menu">
							<li><a href="../View/Dashboard.php"><i class="icon-bar-chart"></i><span class="active hidden-tablet"> Dashboard</span></a></li>
							<li><a href="../View/Upload_form.php "><i class="icon-edit"></i><span class="hidden-tablet"> Upload Details</span></a></li>
							<li><a href="../View/viewdetails.php "><i class="icon-align-justify"></i><span class="hidden-tablet"> View Details</span></a></li>

							<li><a href="../View/chart.php "><i class="icon-list-alt"></i><span class="hidden-tablet"> Charts</span></a></li>
							<li><a href="../View/calendar.php"><i class="icon-calendar"></i><span class="hidden-tablet"> Calendar</span></a></li>
							<li><a href="../View/file-manager.php"><i class="icon-folder-open"></i><span class="hidden-tablet"> CV Manager</span></a></li>

						</ul>
					</div>
				</div>
				<!-- end: Main Menu -->

				<noscript>
					<div class="alert alert-block span10">
						<h4 class="alert-heading">Warning!</h4>
						<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
					</div>
				</noscript>

				<!-- start: Content -->
				<div id="content" class="span10" >

					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="../View/Dashboard.php">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li><a href="#">Upload Details</a></li>
					</ul>


  			  <div class="row-fluid sortable">
    				<div class="box span12">
    					<div class="box-header" data-original-title>
    						<h2><i class="halflings-icon white user"></i>
                  <span class="break"></span>
                  <span class="col-md-3" style="border:1px solid black;"> Student Pre-Internship Survey  </span>
                  <span class="col-md-6" style="border:1px solid black;"> </span>
                  <span class="col-md-6" style="border:1px solid black;">
                    <?
                     if(isset($_GET['info']))
                        echo "Added one row..";

                    ?>
                  </span>
                </h2>

    						<div class="box-icon">
    							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
    							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
    						</div>
    					</div>

    					<div class="box-content" >
    						<form class="form-horizontal" name="Upload_StuPreIntern_form" action="../Controller/Upload_Controller.php" method="post" onsubmit="return check_upload_form()">
    						  <fieldset>

                    <div class="control-group">
      								<label class="control-label">Semester Registered</label>
      								<div class="controls">
      								  <label class="radio">
      									           <input type="radio" name="Sem_Regtd" id="Sem_Regtd_fall" value="fall" checked="">
      									                    Fall
      								  </label>
      								  <div style="clear:both"></div>
      								  <label class="radio">
      									           <input type="radio" name="Sem_Regtd" id="Sem_Regtd_winter" value="winter">
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
                          ?>
        									         <option value="<?echo $years; ?>"> <?echo $years;?> </option>
        									<?
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
            									<input id="Student_id" name="Student_id" size="16" type="text"/>
          								  </div>
                          </div>
                        </div>

                        <div class="control-group">
                          <label class="control-label" for="Stu_fname">First Name</label>
                          <div class="controls">
                            <div class="input">
            									<input id="Student_fname" name="Student_fname" size="16" type="text"/>
          								  </div>
                          </div>
                        </div>

                        <div class="control-group">
                          <label class="control-label" for="Stu_id">Last Name</label>
                          <div class="controls">
                            <div class="input">
            									<input id="Student_lname" name="Student_lname" size="16" type="text"/>
          								  </div>
                          </div>
                        </div>

                        <div class="control-group">
                          <label class="control-label" for="Stu_email">E-mail</label>
                          <div class="controls">
                            <div class="input">
            									<input id="Student_email" name="Student_email" size="16" type="text"/>
          								  </div>
                          </div>
                        </div>

                        <div class="control-group">
                          <label class="control-label" for="Stu_phnum">Phone num</label>
                          <div class="controls">
                            <div class="input">
            									<input id="Student_phnum" name="Student_phnum" size="16" type="text"/>
          								  </div>
                          </div>
                        </div>

                        <div class="control-group">
                          <label class="control-label">Gender</label>
                          <div class="controls">
                            <label class="radio">
                                       <input type="radio" name="Gender" id="Gender_male" value="Male" checked="">
                                                Male
                            </label>
                            <div style="clear:both"></div>
                            <label class="radio">
                                       <input type="radio" name="Gender" id="Gender_female" value="Female">
                                                Female
                            </label>
                          </div>
                        </div>

                        <div class="control-group">
                          <label class="control-label" for="Stu_program">Current Program</label>
                          <div class="controls">
                            <div class="input">
            									<input id="Student_program" name="Student_program" size="16" type="text"/>
          								  </div>
                          </div>
                        </div>

                        <div class="control-group">
          								<label class="control-label">Status</label>
          								<div class="controls">
          								  <label class="radio">
          									           <input type="radio" name="Status" id="Status_International_student" value="international_student" checked="">
          									                    International Student
          								  </label>
          								  <div style="clear:both"></div>
          								  <label class="radio">
          									           <input type="radio" name="Status" id="Status_PR_citizen" value="pr_citizen">
          									                    PR/Citizen
                            </label>
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
                            <td>	<input type="text" name="UG_major" style="width:6em;"/></td>
                            <td class="center">  <input type="text" name="UG_gpa" style="width:5em;"/>  </td>
                            <td class="center">  <input type="text" name="UG_univ" style="width:18em;"/> </td>
                            <td class="center">  <input type="text" name="UG_country" style="width:6em;"/> </td>
                            <td class="center">  <input type="text" name="UG_mm" style="width:5em;"/>  </td>
                            <td class="center">  <input type="text" name="UG_yyyy" style="width:5em;"/>  </td>
                          </tr>

                          <tr>
                            <td>Graduate degrees</td>
                            <td>	<input type="text" name="PG_major" style="width:6em;"/></td>
                            <td class="center">  <input type="text" name="PG_gpa" style="width:5em;"/>  </td>
                            <td class="center">  <input type="text" name="PG_univ" style="width:18em;"/> </td>
                            <td class="center">  <input type="text" name="PG_country" style="width:6em;"/> </td>
                            <td class="center">  <input type="text" name="PG_mm" style="width:5em;"/>  </td>
                            <td class="center">  <input type="text" name="PG_yyyy" style="width:5em;"/>  </td>
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
                            <td><input type="text" name="Cert1_title" style="width:22em;"/></td>
                            <td>	<input type="text" name="Cert1_body" style="width:22em;"/></td>
                            <td class="center">  <input type="text" name="Cert1_issuedyear" style="width:4em;"/>  </td>
                            <td class="center">  <input type="text" name="Cert1_validyear" style="width:4em;"/> </td>
                          </tr>

                          <tr>
                            <td><input type="text" name="Cert2_title" style="width:22em;"/></td>
                            <td>	<input type="text" name="Cert2_body" style="width:22em;"/></td>
                            <td class="center">  <input type="text" name="Cert2_issuedyear" style="width:4em;"/>  </td>
                            <td class="center">  <input type="text" name="Cert2_validyear" style="width:4em;"/> </td>
                          </tr>

                          <tr>
                            <td><input type="text" name="Cert3_title" style="width:22em;"/></td>
                            <td>	<input type="text" name="Cert3_body" style="width:22em;"/></td>
                            <td class="center">  <input type="text" name="Cert3_issuedyear" style="width:4em;"/>  </td>
                            <td class="center">  <input type="text" name="Cert3_validyear" style="width:4em;"/> </td>
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
                              <th style="width:5em;"/>Company</th>
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
                            <td class="center">  <input type="text" name="Wrkexp1_company" style="width:15em;"/>  </td>
                            <td class="center">  <input type="text" name="Wrkexp1_from_month" style="width:1.5em;"/>  </td>
                            <td class="center">  <input type="text" name="Wrkexp1_from_year" style="width:3em;"/>  </td>
                            <td class="center">  <input type="text" name="Wrkexp1_till_month" style="width:1.5em;"/>  </td>
                            <td class="center">  <input type="text" name="Wrkexp1_till_year" style="width:3em;"/>  </td>
                            <td class="center">  <input type="text" name="Wrkexp1_title" style="width:15em;"/>  </td>
                            <td class="center">  <input type="text" name="Wrkexp1_duties" style="width:15em;"/>  </td>

                          </tr>

                          <tr>
                            <td class="center">  <input type="text" name="Wrkexp2_company" style="width:15em;"/>  </td>
                            <td class="center">  <input type="text" name="Wrkexp2_from_month" style="width:1.5em;"/>  </td>
                            <td class="center">  <input type="text" name="Wrkexp2_from_year" style="width:3em;"/>  </td>
                            <td class="center">  <input type="text" name="Wrkexp2_till_month" style="width:1.5em;"/>  </td>
                            <td class="center">  <input type="text" name="Wrkexp2_till_year" style="width:3em;"/>  </td>
                            <td class="center">  <input type="text" name="Wrkexp2_title" style="width:15em;"/>  </td>
                            <td class="center">  <input type="text" name="Wrkexp2_duties" style="width:15em;"/>  </td>

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
                            ?>
          									         <option value="<?echo $tech_skill; ?>"> <?echo $tech_skill;?> </option>
          									<?
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
                            ?>
                                     <option value="<?echo $CMS_skill; ?>"> <?echo $CMS_skill;?> </option>
                            <?
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
                            ?>
                                     <option value="<?echo $OS_skill; ?>"> <?echo $OS_skill;?> </option>
                            <?
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
    							  <button type="submit" name="Upload_StuPreIntern_form" class="btn btn-primary">Save changes</button>
    							  <button type="reset" class="btn">Cancel</button>
    							</div>
    						  </fieldset>
    						</form>

    					</div>
    				</div><!--/span-->

    			</div><!--/row-->

  				</div>

  			</div>

  			<!-- End : Inputs for Query -->
       </div><!--/#content.span10-->



			</div><!--/fluid-row-->


		</div><!--/.fluid-container-->





		<footer style="border:1px solid black">

			<p>
				<span style="text-align:left;float:left">&copy; 2016  Copyright Reserved </span>

			</p>

		</footer>

	<!-- start: JavaScript-->

		<script src="../js/jquery-1.9.1.min.js"></script>
		<script src="../js/jquery-migrate-1.0.0.min.js"></script>

		<script src="../js/jquery-ui-1.10.0.custom.min.js"></script>

		<script src="../js/jquery.ui.touch-punch.js"></script>

		<script src="../js/modernizr.js"></script>

		<script src="../js/bootstrap.min.js"></script>

		<script src="../js/jquery.cookie.js"></script>

		<script src='../js/fullcalendar.min.js'></script>

		<script src='../js/jquery.dataTables.min.js'></script>

		<script src="../js/excanvas.js"></script>
	    <script src="../js/jquery.flot.js"></script>
	    <script src="../js/jquery.flot.pie.js"></script>
	    <script src="../js/jquery.flot.stack.js"></script>
	    <script src="../js/jquery.flot.resize.min.js"></script>

		<script src="../js/jquery.chosen.min.js"></script>

		<script src="../js/jquery.uniform.min.js"></script>

		<script src="../js/jquery.cleditor.min.js"></script>

		<script src="../js/jquery.noty.js"></script>

		<script src="../js/jquery.elfinder.min.js"></script>

		<script src="../js/jquery.raty.min.js"></script>

		<script src="../js/jquery.iphone.toggle.js"></script>

		<script src="../js/jquery.uploadify-3.1.min.js"></script>

		<script src="../js/jquery.gritter.min.js"></script>

		<script src="../js/jquery.imagesloaded.js"></script>

		<script src="../js/jquery.masonry.min.js"></script>

		<script src="../js/jquery.knob.modified.js"></script>

		<script src="../js/jquery.sparkline.min.js"></script>

		<script src="../js/counter.js"></script>

		<script src="../js/retina.js"></script>

		<script src="../js/custom.js"></script>
	<!-- end: JavaScript-->

</body>
</html>
<?
}
else
{
		header('Location: ../index.php');
}

?>
