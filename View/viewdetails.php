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

	<!-- start: Favicon -->
	<link rel="shortcut icon" href="../img/favicon.ico">
	<!-- end: Favicon -->

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
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Queries</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
				<div class ="box-content">	
				<form action="test.php" method="post">
				
					<table cellspacing="5em" cellpadding="15" >
					<br>
					<tr>
					<td align="center">
					
					<button class="btn btn-small btn-primary">All students</button>
					
					</td>
					
					<td>
					
					<div class="control-group">
								<label class="control-label" for="selectError1">Internship Type</label>
								<div class="controls">
								  <select id="selectError1" multiple data-rel="chosen" name="intern[]">
									<option selected>Company - Paid job</option>
									<option>Company - Unpaid job</option>
									<option>Start up company</option>
									<option>Research Project</option>
									<option>MAC Project</option>
									<option>Other</option>
									<option>Without any job</option>
								  </select>
								</div>
							  </div>
					
					</td>
					
					<td>
					
					<div class="control-group">
						<label class="control-label" for="selectError">Job Location</label>
							<div class="controls">
								  <select id="selectError2" data-rel="chosen"  name="location" >
									<option>Toronto</option>
									<option>Windsor</option>
									<option>Quebec</option>
									
								  </select>
							</div>
					</div>
					
					</td>
					
					<td>
					
					<div class="control-group">
						<label class="control-label" for="selectError">Country</label>
							<div class="controls">
								  <select id="selectError3" data-rel="chosen"  name="country">
									<option>Canada</option>
									<option>India</option>
									<option>Canada</option>
									<option>China</option>
									<option>Option 4</option>
									<option>Option 5</option>
								  </select>
							</div>
					</div>
					
									
					</td>
					
					</tr>
					
					<tr>
					<td>
					
					
					<div class="control-group">
						<label class="control-label" for="selectError3">Batch</label>
							<div class="controls">
								  <select id="selectError4" data-rel="chosen"  name="batch">
									<option>Option 4</option>
									<option>Option 5</option>
								  </select>
							</div>
					</div>
					
					</td>
					
					<td>
					
					<div class="control-group">
						<label class="control-label" for="selectError5">GPA</label>
							<div class="controls">
								  <select id="selectError5" data-rel="chosen"  name="gpa">
									<option>Under Graduate</option>
									<option>Graduate</option>
								  </select>
							</div>
					</div>
								  			  
								  
							
					</td>
					
					<td>
					From 
					<br><input type="text" size="2" name="from" placeholder="/10" maxlength="2" style="width:100px"  >
					</td>
					<td>
					To 
					<br>
					<input type="text"  name="to" id="gpato" placeholder="/10" maxlength="2" size="2" style="width:100px" />
					</td>
					</tr>
					<!--</div>-->
					
					<tr>
					<td>
					
					<div class="control-group">
								<label class="control-label" for="selectError6">Skills</label>
								<div class="controls">
								  <select id="selectError6" multiple data-rel="chosen" name="skills[]">
									<option selected>DB</option>
									<option>PHP</option>
									<option>Java</option>
									<option>Research Project</option>
									<option>MAC Project</option>
									<option>Other</option>
									<option>Without any job</option>
								  </select>
								</div>
							  </div>
					
					</td>
					
					<td>
					
					<div class="control-group">
						<label class="control-label" for="selectError3">Certification</label>
							<div class="controls">
								  <select id="selectError7" data-rel="chosen"  name="certification">
									<option>Option 4</option>
									<option>Option 5</option>
								  </select>
							</div>
					</div>
					</td>
					
					<td>
					<div class="control-group">
						<label class="control-label" for="selectError8">Experience</label>
							<div class="controls">
								  <select id="selectError8" data-rel="chosen"  name="experience">
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
						<label class="control-label" for="selectError9">Gender</label>
							<div class="controls">
								  <select id="selectError9" data-rel="chosen"  name="gender">
									<option>All</option>
									<option>Male</option>
									<option>Female</option>
									
								  </select>
							</div>
					</div>
					</td>
					</tr>
					<tr>
					<td colspan="2" align="center">
					 <input type="submit" value="Submit" />
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
			</div>
			
			<!-- End : Inputs for Query -->
			
			
			<!-- Start : Modal -->
			

			
			<!-- End : Modal -->




			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Members</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Username</th>
								  <th>Date registered</th>
								  <th>Role</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>
						  <tbody>
							<tr>
								<td>Dennis Ji</td>
								<td class="center">2012/01/01</td>
								<td class="center">Member</td>
								<td class="center">
									<span class="label label-success">Active</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>
									</a>
									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i>
									</a>
								</td>
							</tr>
							<tr>
								<td>Dennis Ji</td>
								<td class="center">2012/01/01</td>
								<td class="center">Member</td>
								<td class="center">
									<span class="label label-success">Active</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>
									</a>
									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i>
									</a>
								</td>
							</tr>
							<tr>
								<td>Dennis Ji</td>
								<td class="center">2012/01/01</td>
								<td class="center">Member</td>
								<td class="center">
									<span class="label label-success">Active</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>
									</a>
									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i>
									</a>
								</td>
								</td>
							</tr>
							<tr>
								<td>Dennis Ji</td>
								<td class="center">2012/01/01</td>
								<td class="center">Member</td>
								<td class="center">
									<span class="label label-success">Active</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>
									</a>
									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i>
									</a>
								</td>
							</tr>
							<tr>
								<td>Dennis Ji</td>
								<td class="center">2012/02/01</td>
								<td class="center">Staff</td>
								<td class="center">
									<span class="label label-important">Banned</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>
									</a>
									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i>
									</a>
								</td>
							</tr>
							<tr>
								<td>Dennis Ji</td>
								<td class="center">2012/02/01</td>
								<td class="center">Staff</td>
								<td class="center">
									<span class="label label-important">Banned</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>
									</a>
									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i>
									</a>
								</td>
							</tr>
							<tr>
								<td>Dennis Ji</td>
								<td class="center">2012/03/01</td>
								<td class="center">Member</td>
								<td class="center">
									<span class="label label-warning">Pending</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>
									</a>
									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i>
									</a>
								</td>
							</tr>
							<tr>
								<td>Dennis Ji</td>
								<td class="center">2012/03/01</td>
								<td class="center">Member</td>
								<td class="center">
									<span class="label label-warning">Pending</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>
									</a>
									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i>
									</a>
								</td>
							</tr>
							<tr>
								<td>Dennis Ji</td>
								<td class="center">2012/01/21</td>
								<td class="center">Staff</td>
								<td class="center">
									<span class="label label-success">Active</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>
									</a>
									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i>
									</a>
								</td>
							</tr>
							<tr>
								<td>Dennis Ji</td>
								<td class="center">2012/01/21</td>
								<td class="center">Staff</td>
								<td class="center">
									<span class="label label-success">Active</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>
									</a>
									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i>
									</a>
								</td>
							</tr>
							<tr>
								<td>Dennis Ji</td>
								<td class="center">2012/08/23</td>
								<td class="center">Staff</td>
								<td class="center">
									<span class="label label-important">Banned</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>
									</a>
									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i>
									</a>
								</td>
							</tr>
							<tr>
								<td>Dennis Ji</td>
								<td class="center">2012/08/23</td>
								<td class="center">Staff</td>
								<td class="center">
									<span class="label label-important">Banned</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>
									</a>
									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i>
									</a>
								</td>
							</tr>
							<tr>
								<td>Dennis Ji</td>
								<td class="center">2012/06/01</td>
								<td class="center">Admin</td>
								<td class="center">
									<span class="label">Inactive</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>
									</a>
									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i>
									</a>
								</td>
							</tr>
							<tr>
								<td>Dennis Ji</td>
								<td class="center">2012/06/01</td>
								<td class="center">Admin</td>
								<td class="center">
									<span class="label">Inactive</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>
									</a>
									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i>
									</a>
								</td>
							</tr>
							<tr>
								<td>Dennis Ji</td>
								<td class="center">2012/03/01</td>
								<td class="center">Member</td>
								<td class="center">
									<span class="label label-warning">Pending</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>
									</a>
									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i>

									</a>
								</td>
							</tr>
							<tr>
								<td>Dennis Ji</td>
								<td class="center">2012/03/01</td>
								<td class="center">Member</td>
								<td class="center">
									<span class="label label-warning">Pending</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>
									</a>
									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i>

									</a>
								</td>
							</tr>
							<tr>
								<td>Dennis Ji</td>
								<td class="center">2012/03/01</td>
								<td class="center">Member</td>
								<td class="center">
									<span class="label label-warning">Pending</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>
									</a>
									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i>

									</a>
								</td>
							</tr>
							<tr>
								<td>Dennis Ji</td>
								<td class="center">2012/01/01</td>
								<td class="center">Member</td>
								<td class="center">
									<span class="label label-success">Active</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>
									</a>
									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i>

									</a>
								</td>
							</tr>
							<tr>
								<td>Dennis Ji</td>
								<td class="center">2012/02/01</td>
								<td class="center">Staff</td>
								<td class="center">
									<span class="label label-important">Banned</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>
									</a>
									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i>

									</a>
								</td>
							</tr>
							<tr>
								<td>Dennis Ji</td>
								<td class="center">2012/02/01</td>
								<td class="center">Admin</td>
								<td class="center">
									<span class="label">Inactive</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>
									</a>
									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i>

									</a>
								</td>
							</tr>
							<tr>
								<td>Dennis Ji</td>
								<td class="center">2012/02/01</td>
								<td class="center">Admin</td>
								<td class="center">
									<span class="label">Inactive</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>
									</a>
									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i>

									</a>
								</td>
							</tr>
							<tr>
								<td>Dennis Ji</td>
								<td class="center">2012/03/01</td>
								<td class="center">Member</td>
								<td class="center">
									<span class="label label-warning">Pending</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>
									</a>
									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i>

									</a>
								</td>
							</tr>
							<tr>
								<td>Dennis Ji</td>
								<td class="center">2012/03/01</td>
								<td class="center">Member</td>
								<td class="center">
									<span class="label label-warning">Pending</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>
									</a>
									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i>

									</a>
								</td>
							</tr>
							<tr>
								<td>Dennis Ji</td>
								<td class="center">2012/01/21</td>
								<td class="center">Staff</td>
								<td class="center">
									<span class="label label-success">Active</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>
									</a>
									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i>

									</a>
								</td>
							</tr>
							<tr>
								<td>Dennis Ji</td>
								<td class="center">2012/01/21</td>
								<td class="center">Staff</td>
								<td class="center">
									<span class="label label-success">Active</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>
									</a>
									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i>

									</a>
								</td>
							</tr>
							<tr>
								<td>Dennis Ji</td>
								<td class="center">2012/08/23</td>
								<td class="center">Staff</td>
								<td class="center">
									<span class="label label-important">Banned</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>
									</a>
									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i>

									</a>
								</td>
							</tr>
							<tr>
								<td>Dennis Ji</td>
								<td class="center">2012/08/23</td>
								<td class="center">Staff</td>
								<td class="center">
									<span class="label label-important">Banned</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>
									</a>
									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i>

									</a>
								</td>
							</tr>
							<tr>
								<td>Dennis Ji</td>
								<td class="center">2012/06/01</td>
								<td class="center">Admin</td>
								<td class="center">
									<span class="label">Inactive</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>
									</a>
									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i>

									</a>
								</td>
							</tr>
							<tr>
								<td>Dennis Ji</td>
								<td class="center">2012/03/01</td>
								<td class="center">Member</td>
								<td class="center">
									<span class="label label-warning">Pending</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>
									</a>
									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i>

									</a>
								</td>
							</tr>
							<tr>
								<td>Dennis Ji</td>
								<td class="center">2012/03/01</td>
								<td class="center">Member</td>
								<td class="center">
									<span class="label label-warning">Pending</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>
									</a>
									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i>

									</a>
								</td>
							</tr>
							<tr>
								<td>Dennis Ji</td>
								<td class="center">2012/03/01</td>
								<td class="center">Member</td>
								<td class="center">
									<span class="label label-warning">Pending</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>
									</a>
									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i>

									</a>
								</td>
							</tr>
							<tr>
								<td>Dennis Ji</td>
								<td class="center">2012/03/01</td>
								<td class="center">Member</td>
								<td class="center">
									<span class="label label-warning">Pending</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>
									</a>
									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i>

									</a>
								</td>
							</tr>
						  </tbody>
					  </table>
					</div>
				</div><!--/span-->

			</div><!--/row-->




	</div><!--/.fluid-container-->

			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->

	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
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
