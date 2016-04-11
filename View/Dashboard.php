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
	<meta name="description" content="IMS Dashboard">
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
				<div id="content" class="span10" >

					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="index.html">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li><a href="#">Dashboard</a></li>
					</ul>

					<div class="row-fluid">

						<div class="span3 statbox purple" onTablet="span6" onDesktop="span3">
							<div class="boxchart">5,6,7,2,0,4,2,4,8,2,3,3,2</div>
							<div class="number">24<i class="icon-arrow-up"></i></div>
							<div class="title">Web Developer</div>

						</div>
						<div class="span3 statbox green" onTablet="span6" onDesktop="span3">
							<div class="boxchart">1,2,6,4,0,8,2,4,5,3,1,7,5</div>
							<div class="number">40<i class="icon-arrow-up"></i></div>
							<div class="title">SW Testing</div>

						</div>
						<div class="span3 statbox blue noMargin" onTablet="span6" onDesktop="span3">
							<div class="boxchart">5,6,7,2,0,4,2,4,8,2,3,3,2</div>
							<div class="number">26<i class="icon-arrow-up"></i></div>
							<div class="title">Data Analyst</div>

						</div>
						<div class="span3 statbox yellow" onTablet="span6" onDesktop="span3">
							<div class="boxchart">7,2,2,2,1,4,2,4,8,,0,3,3,5</div>
							<div class="number">34<i class="icon-arrow-down"></i></div>
							<div class="title">Sys Development</div>

						</div>

					</div>

					<div class="row-fluid" >

						<div class="widget blue span6" onTablet="span6" onDesktop="span6">

							<h2><span class="glyphicons globe"><i></i></span> By Year</h2>

							<hr>

							<div class="content">

								<div class="verticalChart">

									<div class="singleBar">

										<div class="bar">

											<div class="value">
												<span>8%</span>
											</div>

										</div>

										<div class="title">2008</div>

									</div>

									<div class="singleBar">

										<div class="bar">

											<div class="value">
												<span>11%</span>
											</div>

										</div>

										<div class="title">2009</div>

									</div>

									<div class="singleBar">

										<div class="bar">

											<div class="value">
												<span>15%</span>
											</div>

										</div>

										<div class="title">2010</div>

									</div>

									<div class="singleBar">

										<div class="bar">

											<div class="value">
												<span>26%</span>
											</div>

										</div>

										<div class="title">2011</div>

									</div>

									<div class="singleBar">

										<div class="bar">

											<div class="value">
												<span>31%</span>
											</div>

										</div>

										<div class="title">2012</div>

									</div>

									<div class="singleBar">

										<div class="bar">

											<div class="value">
												<span>33%</span>
											</div>

										</div>

										<div class="title">2013</div>

									</div>

									<div class="singleBar">

										<div class="bar">

											<div class="value">
												<span>36%</span>
											</div>

										</div>

										<div class="title">2014</div>

									</div>

									<div class="singleBar">

										<div class="bar">

											<div class="value">
												<span>35%</span>
											</div>

										</div>

										<div class="title">2015</div>

									</div>

									<div class="clearfix"></div>

								</div>

							</div>

						</div><!--/span-->

					  <div class="box black span6" onTablet="span6" onDesktop="span6">
							<div class="box-header">
								<h2><i class="halflings-icon white list"></i><span class="break"></span>mySuccess News</h2>
								<div class="box-icon">
									<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
									<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
								</div>
							</div>
							<div class="box-content">
								<ul class="dashboard-list metro">
									<li>
										<a href="#">
											<i class="icon-arrow-up green"></i>
											<strong>92</strong>
											New Comments
										</a>
									</li>
								  <li>
									<a href="#">
									  <i class="icon-arrow-down red"></i>
									  <strong>15</strong>
									  New Registrations
									</a>
								  </li>
								  <li>
									<a href="#">
									  <i class="icon-minus blue"></i>
									  <strong>36</strong>
									  New Articles
									</a>
								  </li>
								  <li>
									<a href="#">
									  <i class="icon-comment yellow"></i>
									  <strong>45</strong>
									  User reviews
									</a>
								  </li>
								  <li>
									<a href="#">
									  <i class="icon-arrow-up green"></i>
									  <strong>112</strong>
									  New Comments
									</a>
								  </li>
								  <li>
									<a href="#">
									  <i class="icon-arrow-down red"></i>
									  <strong>31</strong>
									  New Registrations
									</a>
								  </li>
								  <li>
									<a href="#">
									  <i class="icon-minus blue"></i>
									  <strong>93</strong>
									  New Articles
									</a>
								  </li>

								</ul>
							</div>
						</div><!--/span--> <!-- end: Content -->

					</div><!--/fluid-row-->

				</div><!--/#content.span10-->

			</div><!--/fluid-row-->

		</div><!--/.fluid-container-->





		<footer style="border:1px solid black">

			<p>
				<span style="text-align:left;float:left">&copy; 2016  Copyright Reserved </span>

			</p>

		</footer>
<!--
	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>

	<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-content">
			<ul class="list-inline item-details">
				<li><a href="http://themifycloud.com">Admin templates</a></li>
				<li><a href="http://themescloud.org">Bootstrap themes</a></li>
			</ul>
		</div>
	</div> -->



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
