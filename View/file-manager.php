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

		<!-- Check git branch -->


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

		<div class="container-fluid-full">
		<div class="row-fluid">

			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
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
				<li><a href="#">File Manager</a></li>
			</ul>

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header">
						<h2><i class="halflings-icon white picture"></i><span class="break"></span>File Manager</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<div class="alert alert-info">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<i class="halflings-icon info-sign"></i> As its a demo, you currently have read-only permission, in your server you may do everything like, upload or delete. It will work on a server only.
						</div>
						<div class="file-manager"></div>
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
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
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
