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

?>
<html lang="en">
<head>

	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Internship Mgmt System</title>
	<meta name="description" content="IMS">
		<!-- end: Meta -->

	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->

	<!-- start: CSS -->
	<link id="bootstrap-style" href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="../css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="../css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->


	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->

	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->

 <style>
   body .modal_lg {
     width: 75%; /* desired relative width */
     left: 15%; /* (100%-width)/2 */
     /* place center */
     margin-left:auto;
     margin-right:auto;
   }
 </style>

	<!-- start: Favicon -->
	<link rel="shortcut icon" href="../img/favicon.ico">
	<!-- end: Favicon -->
  <script>

  function check_upload_form()
  {
    return true;
  }

</script>
</head>

<body>
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
                <i class="halflings-icon white user"></i>
                Access level: <? echo $ProfileType; ?>
              </a>
            </li>
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

              <? if($ProfileType == "Admin") { ?>

                    <li><a href="../View/Dashboard.php"><i class="icon-bar-chart"></i><span class="active hidden-tablet"> Dashboard</span></a></li>
                    <li><a href="../Controller/Upload_interndetails_Controller.php "><i class="icon-download-alt"></i><span class="hidden-tablet"> Positions</span></a></li>
                    <li><a href="../View/Upload_form.php "><i class="icon-edit"></i><span class="hidden-tablet"> Upload Details</span></a></li>
                    <li><a href="../Controller/View_Controller.php "><i class="icon-align-justify"></i><span class="hidden-tablet"> View Details</span></a></li>

                    <li><a href="../View/chart.php "><i class="icon-signal"></i><span class="hidden-tablet"> Analysis</span></a></li>
                    <li><a href="../View/calendar.php"><i class="icon-calendar"></i><span class="hidden-tablet"> Calendar</span></a></li>
                    <li><a href="../View/file-manager.php"><i class="icon-folder-open"></i><span class="hidden-tablet"> CV Manager</span></a></li>

              <? }
                else { ?>
                      <li><a href="../View/Dashboard.php"><i class="icon-bar-chart"></i><span class="active hidden-tablet"> Dashboard</span></a></li>
                      <li><a href="../Controller/Upload_interndetails_Controller.php"><i class="icon-download-alt"></i><span class="active hidden-tablet"> Positions </span></a></li>
                      <li><a href="../Controller/Upload_Controller.php "><i class="icon-edit"></i><span class="hidden-tablet"> View/Update Details</span></a></li>

              <?  } ?>
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
			<div id="content" class="span10">


			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">View Details</a></li>
			</ul>


			<!-- Start : Inputs for Query -->

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i>
              <span class="break"></span>
              <span class="col-md-4" > Queries  </span>
              <span class="col-md-5" style="margin-left: 10em;"> </span>
              <span class="col-md-4" style="margin-left: 27em;">
                <?
                 if(isset($_GET['count_qry']))
                 {
                   if($_GET['count_qry'] == 0)
                   {
                         echo $_GET['count_qry']." Records found.. Try Again..";

                   }
                   else {
                     # code...
                     if($_GET['count_qry'] > 1)
                        echo $_GET['count_qry']." Records found..";
                     else
                        echo $_GET['count_qry']." Record found..";

                   }

                 }

                ?>
              </span>
            </h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
				<div class ="box-content">
				<form action="../Controller/View_Controller.php" method="post">

					<table cellspacing="5em" cellpadding="15" >
					       <br>
					<tr>
    					<td align="center">

    					<input type="submit" name="View_details_form" value="All students" />

    					</td>
						
						<td align="center">

    					<input type="submit" name="Without_any_job" value="Without any job" />

    					</td>

    					<td>

      					<div class="control-group">
      								<label class="control-label" for="selectError1">Internship Type</label>
      								<div class="controls">
      								  <select id="selectError1" multiple data-rel="chosen" name="intern_type[]">
          									<option>Company - Paid job</option>
          									<option>Company - Unpaid job</option>
          									<option>Startup company</option>
          									<option>Research Project</option>
          									<option>MAC Project</option>
          									<option>Other</option>
          								

      								  </select>
      								</div>
      					</div>

    					</td>

    					<td>

        					<div class="control-group">
        						<label class="control-label" for="joblocation">Job Location</label>
        							<div class="controls">
        								  <select id="joblocation" data-rel="chosen"  name="joblocation" >
        									<option  selected value> -- Select an option -- </option>
        									<?
        									   foreach($View_Details_Joblocation as $location)
        									   {
        									?>
        											<option value="<? echo $location; ?>"><? echo $location; ?></option>
        									<?
        									   }
        									?>

        								  </select>
        							</div>
        					</div>

    					</td>

					


















					</tr>

					<tr>
  					  <td>
                <div class="control-group">
      						<label class="control-label" for="batch">Batch</label>
      							<div class="controls">
      								  <select id="batch" data-rel="chosen"  name="batch">
      									<option  selected value> -- Select an option -- </option>
      									<?
      									   foreach($View_Details_Batch as $batch)
      									   {
      									?>
      											<option value="<? echo $batch; ?>"><? echo $batch; ?></option>
      									<?
      									   }
      									?>
      								  </select>
      							</div>
      					</div>
            </td>

  					<td>
    					<div class="control-group">
    						<label class="control-label" for="selectError5">Degree</label>
    							<div class="controls">
    								  <select id="selectError5" data-rel="chosen"  name="degree">
    									<option  selected value> -- Select an option -- </option>
    									<option>Under Graduate</option>
    									<option>Graduate</option>
    								  </select>
    							</div>
    					</div>
  					</td>

  					<td>
    					From
    					<br><input type="text" size="2" name="gpa_from" placeholder="/10" maxlength="4" style="width:100px"  >
  					</td>
  					<td>
    					To
    					<br>
    					<input type="text"  name="gpa_to" id="gpa_to" placeholder="/10" maxlength="4" size="2" style="width:100px" />
  					</td>
					</tr>
					<!--</div>-->

					<tr>
					<td>

					<div class="control-group">
								<label class="control-label" for="selectError6">Skills</label>
								<div class="controls">
								  <select id="selectError6" multiple data-rel="chosen" name="skills[]">
									<?
									   foreach($View_Details_Skills as $skill)
									   {
									?>
											<option value="<? echo $skill; ?>"><? echo $skill; ?></option>
									<?
									   }
									?>
								  </select>
								</div>
							  </div>

					</td>

					<td>

					<div class="control-group">
						<label class="control-label" for="certification">Certification</label>
							<div class="controls">
								  <select id="certification" data-rel="chosen"  name="certification">
									<option  selected value> -- Select an option -- </option>
									<?
									   foreach($View_Details_Certification as $certification)
									   {
									?>
											<option value="<? echo $certification; ?>"><? echo $certification; ?></option>
									<?
									   }
									?>
								  </select>
							</div>
					</div>
					</td>

					<td>
					<div class="control-group">
						<label class="control-label" for="selectError8">Experience</label>
							<div class="controls">
								  <select id="selectError8" data-rel="chosen"  name="experience">
    									<option  selected value> -- Select an option -- </option>
    									<option>No Work Experience</option>
    									<option><1 year</option>
    									<option>1-3 years</option>
    									<option>> 3 years</option>
								  </select>
							</div>
					</div>
					</td>

					
					<td>

    					<div class="control-group">
    						<label class="control-label" for="jobgroups">Job Groups</label>
    							<div class="controls">
    								  <select id="jobgroups" data-rel="chosen"  name="job_group">

                        <option value=""> -- Select an option --  </option>
                        <?
                           foreach($View_Details_JobGroup as $Job_group)
                           {
                        ?>
                            <option value="<? echo $Job_group; ?>"><? echo $Job_group; ?></option>
                        <?
                           }
                        ?>

						</select>

    								  














    							</div>
    					</div>
  					</td>
					
					</tr>

					<tr>
					<td>
  					<div class="control-group">
						<label class="control-label" for="selectError9">Gender</label>
							<div class="controls span2">
								  <select id="selectError2" data-rel="chosen"  name="gender">
    									<option selected>All</option>
    									<option>Male</option>
    									<option>Female</option>

								  </select>
							</div>
					</div>
					</td>
					
					<td>
              <div class="control-group">
  						  <label class="control-label" for="country">Country</label>
  							<div class="controls">
  								  <select id="country" data-rel="chosen"  name="country">
  									<option  selected value> -- Select an option -- </option>
  									<?
  									   foreach($View_Details_Country as $country)
  									   {
  									?>
  											<option value="<? echo $country; ?>"><? echo $country; ?></option>
  									<?
  									   }
  									?>
  								  </select>
  							</div>
  					</div>
					</td>
					</tr>

  					<tr>
    					<td colspan="2" align="center">
    					       <input type="submit" name="View_details_form" value="Submit" />
    					</td>
    					<td colspan="2" align="center">
      					<button onclick="myFunction()">Print</button>

      					<script>
      					function myFunction() {
      					window.print();
      					}
      					</script>
    					</td>
  					</tr>
					</table>

				</form>

			</div>
			</div>
			</div

			<!-- End : Inputs for Query -->

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i>
              <span class="break"></span>
              <span class="col-md-4" > Student Details </span>
              <span class="col-md-5" style="margin-left: 10em;"> </span>
              <span class="col-md-4" style="margin-left: 27em;">
                <?
                $Records = $_GET['count'];

                 if(isset($_GET['Deleted_val']))
                 {
                   echo $_GET['Deleted_val']." Record deleted..";
                 }
                 elseif (isset($_GET['count']))
                 {
                    if($Records > 1)
                      echo $_GET['count']." Records found..";
                    else {
                        # code...
                      echo $_GET['count']." Record found..";
                    }

                 }

                ?>
              </span>
            </h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
            <? if($Records == 0) {  ?>
                <h3> No records found...</h3>
            <? } else {?>
              <form class="form-horizontal" name="Upload_StuPreIntern_form" action="../Controller/View_Controller.php" method="post" onsubmit="return check_upload_form()">
    						<table class="table table-striped table-bordered bootstrap-datatable datatable">
    						  <thead>
    							  <tr>
                      <th></th>
    								  <th>Name</th>
    								  <th>Current Position</th>
    								  <th>Email</th>
    								  <th>Batch</th>
    							  </tr>
    						  </thead>
    						  <tbody>
                  <?

                    $Student_ids = array_keys($Student_details_val);

                    foreach($Student_ids as $Student_id)
                    {
                  ?>
    							<tr>
                    <td style="text-align:center;">
                      <input type="checkbox" name="chkbox_delete_<?echo $Student_id;?>" id="inlineCheckbox_<?echo $Student_id;?>" value="<?echo $Student_id;?>_selected">
                    </td>

                    <td>
                      <a href="../Controller/ViewDetails_Controller.php?Student_id=<? echo $Student_id; ?>" class="open-AddBookDialog" data-toggle="modal" data-target="#StudentDetailModal"   >
                          <? echo $Student_details_val[$Student_id]['Student_FName']." ".$Student_details_val[$Student_id]['Student_LName']; ?>
                      </a>
                    </td>

                    <td class="center">
                        <?
                          $Hired_details = Hired_details($Student_details_val[$Student_id]['idStudent']);
                          $Hired_details_count = count($Hired_details);

                          if($Hired_details_count){

                            $Hired_Position_keys = array_keys($Hired_details);

                            foreach ($Hired_Position_keys as $Hired_Position)
                            { ?>
                            <a href="../Controller/ViewDetails_Controller.php?Position_id=<? echo $Hired_Position; ?>" class="open-AddBookDialog" data-toggle="modal" data-target="#PositionDetailsModal"   >
                                <?    echo $Hired_details[$Hired_Position]['company_name'];  ?>
                            </a>
                          <?  }
                            }
                            else {
                              # code...
                              echo "Available";
                            }

                        ?>
                    </td>

    								<td class="center"><? echo $Student_details_val[$Student_id]['Student_Email']; ?></td>
    								<td class="center">
    									<? echo $Student_details_val[$Student_id]['Student_RegisteredSemester']." - ".$Student_details_val[$Student_id]['Student_RegisteredYear']; ?>
    								</td>

                  <? } ?>
    							</tr>

    						  </tbody>
    					  </table>

                </fieldset>

                <fieldset>

                <div class="form-actions">
                  <button type="submit" name="Delete_Student_details" class="btn btn-primary">Delete </button>

                </div>
                </fieldset>
              </form>

              <? } ?>
					</div>
				</div><!--/span-->

			</div><!--/row-->

	</div><!--/.fluid-container-->

			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->

    <div id="StudentDetailModal" class="modal fade modal_lg" role="dialog">
      <div class="modal-dialog modal-xlg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Student Details</h4>
          </div>
          <div class="modal-body">
            <p>Some text in the modal.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>

    <!-- Modal -->
    <div id="PositionDetailsModal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-xlg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Position Details</h4>
          </div>
          <div class="modal-body">
            <p>Some text in the modal.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>

	<div class="clearfix"></div>

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
