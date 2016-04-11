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

  include_once("../Controller/Charts_controller.php");
  require_once("../Controller/Lookup_Controller.php");

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
  <script>
    function onselectChange()
    {


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
				<li><a href="#">Analysis</a></li>
			</ul>



			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header">
						<h2><i class="halflings-icon white list-alt"></i><span class="break"></span>Analysis by Year</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>

					<div class="box-content">
							<div class="control-group">
							<table align="center" cellpadding="10" >
							<tr>
							<td>
							<label class="control-label controls" for="selectError3">For Year:</label></td>
							<td>
								<div class="controls">
									  <select id="selectError11" data-rel="chosen"  name="year_name" onchange="onselectChange()">
    										<option  selected value> -- Select an option -- </option>
                        <? foreach($FormLookup_Details_years as $Year_val){

                            if( $Year_val == "2016"){ ?>
                                <option value="<? echo $Year_val; ?>" selected><? echo $Year_val; ?></option>
                            <? } else { ?>

                                  <option value="<? echo $Year_val; ?>" ><? echo $Year_val; ?></option>
                         <?  }
                           } ?>
									  </select>
								</div></td></table>

							</div>

				      <script src="../js/amcharts.js"></script>
							<script src="../js/serial.js"></script>
							<script src="../js/light.js"></script>


							<script>

								var chart = AmCharts.makeChart( "chartdiv", {
								  "type": "serial",
								  "theme": "light",

                  "dataProvider": [ {
									"country": "TD",
									"visits": <? echo "5"+Hired_chk_by_Company("TD"); ?>
								  }, {
									"country": "IBM",
									"visits": <? echo "15"+Hired_chk_by_Company("IBM"); ?>
								  }, {
									"country": "Google",
									"visits": <? echo "10"+Hired_chk_by_Company("Google"); ?>
								  }, {
									"country": "Apple",
									"visits": <? echo "13"+Hired_chk_by_Company("Apple"); ?>
								  }, {
									"country": "ACN",
									"visits": <? echo "12"+Hired_chk_by_Company("ACN"); ?>
								  }, {
									"country": "SIGMA",
									"visits": <? echo "13"+Hired_chk_by_Company("SIGMA"); ?>
								  }, {
									"country": "BMO",
									"visits": <? echo "16"+Hired_chk_by_Company("BMO"); ?>
								  } ],

								  "valueAxes": [ {
									"gridColor": "#FFFFFF",
									"gridAlpha": 0.2,
									"dashLength": 0
								  } ],

								  "gridAboveGraphs": true,
								  "startDuration": 1,
								  "graphs": [ {
									"balloonText": "[[category]]: <b>[[value]]</b>",
									"fillAlphas": 0.8,
									"lineAlpha": 0.2,
									"type": "column",
									"valueField": "visits"
								  } ],

								  "chartCursor": {
									"categoryBalloonEnabled": false,
									"cursorAlpha": 0,
									"zoomable": false
								  },

								  "categoryField": "country",
								  "categoryAxis": {
									"gridPosition": "start",
									"gridAlpha": 0,
									"tickPosition": "start",
									"tickLength": 20
								  },
								  "export": {
									"enabled": true
								  }

								} );

							</script>

							<div id="chartdiv"></div>

								<style>
  								#chartdiv {
  									width		: 100%;
  									height		: 250px;
  									font-size	: 9px;
  								}
								</style>
					</div>
				</div>

				<!-- Animated Doughnut Start-->

				<div class="box span12" style="margin-left: 0em;">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white list-alt"></i><span class="break"></span>Analysis by field</h2>
						<div class="box-icon">
								<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>

					<div class="box-content">
									<script src="../js/animate.min.js"></script>
									<script src="../js/pie.js"></script>

							<script>
								/**
								 * Define data for each year
								 */
								var chartData = {

							  "2014": [
                  { "sector": "Networking", "size": <? echo "10"; ?> },
                  { "sector": "Analysis", "size": <? echo "10"; ?> },
                  { "sector": "Web Development", "size": <? echo "10"; ?> },
                  { "sector": "Sys Development", "size": <? echo "10"; ?> },
                  { "sector": "Testing", "size": <? echo "10"; ?> },
                  { "sector": "Mobile Development", "size": <? echo "10"; ?> },
                  { "sector": "Technical Support", "size": <? echo "10"; ?> },
                  { "sector": "Security", "size": <? echo "10"; ?> },
                  { "sector": "Data Management", "size": <? echo "10"; ?> },
                  { "sector": "Other", "size": <? echo "10"; ?> }
                ],
                "2015": [
                  { "sector": "Networking", "size": <? echo "10"; ?> },
                  { "sector": "Analysis", "size": <? echo "10"; ?> },
                  { "sector": "Web Development", "size": <? echo "10"; ?> },
                  { "sector": "Sys Development", "size": <? echo "10"; ?> },
                  { "sector": "Testing", "size": <? echo "10"; ?> },
                  { "sector": "Mobile Development", "size": <? echo "10"; ?> },
                  { "sector": "Technical Support", "size": <? echo "10"; ?> },
                  { "sector": "Security", "size": <? echo "10"; ?> },
                  { "sector": "Data Management", "size": <? echo "10"; ?> },
                  { "sector": "Other", "size": <? echo "10"; ?> }
              ],
                "2016": [
                  { "sector": "Networking", "size": <? echo "10"+Hired_chk_by_JobGroup("Networking"); ?> },
                  { "sector": "Analysis", "size": <? echo "10"+Hired_chk_by_JobGroup("Analysis"); ?> },
                  { "sector": "Web Development", "size": <? echo "10"+Hired_chk_by_JobGroup("Web Development"); ?> },
                  { "sector": "Sys Development", "size": <? echo "10"+Hired_chk_by_JobGroup("Sys Development"); ?> },
                  { "sector": "Testing", "size": <? echo "10"+Hired_chk_by_JobGroup("Testing"); ?> },
                  { "sector": "Mobile Development", "size": <? echo "10"+Hired_chk_by_JobGroup("Mobile Development"); ?> },
                  { "sector": "Technical Support", "size": <? echo "10"+Hired_chk_by_JobGroup("Technical Support"); ?> },
                  { "sector": "Security", "size": <? echo "10"+Hired_chk_by_JobGroup("Security"); ?> },
                  { "sector": "Data Management", "size": <? echo "10"+Hired_chk_by_JobGroup("Data Management"); ?> },
                  { "sector": "Other", "size": <? echo "10"+Hired_chk_by_JobGroup("Other"); ?> }
              ]
								};


								/**
								 * Create the chart
								 */
								var currentYear = 2016;
								var chart = AmCharts.makeChart( "chartdiv1", {
								  "type": "pie",
								  "theme": "light",
								  "dataProvider": [],
								  "valueField": "size",
								  "titleField": "sector",
								  "startDuration": 0,
								  "innerRadius": 80,
								  "pullOutRadius": 20,
								  "marginTop": 30,
								  "titles": [{
									"text": "Placement by SW Fields"
								  }],
								  "allLabels": [{
									"y": "54%",
									"align": "center",
									"size": 25,
									"bold": true,
									"text": "2016",
									"color": "#555"
								  }, {
									"y": "49%",
									"align": "center",
									"size": 15,
									"text": "Year",
									"color": "#555"
								  }],
								  "listeners": [ {
									"event": "init",
									"method": function( e ) {
									  var chart = e.chart;

									  function getCurrentData() {
										var data = chartData[currentYear];
										currentYear++;
										if (currentYear > 2016)
										  currentYear = 2014;
										return data;
									  }

									  function loop() {
										chart.allLabels[0].text = currentYear;
										var data = getCurrentData();
										chart.animateData( data, {
										  duration: 1000,
										  complete: function() {
											setTimeout( loop, 6000 );
										  }
										} );
									  }

									  loop();
									}
								  } ],
								   "export": {
								   "enabled": true
								  }
								} );

							</script>

							<div id="chartdiv1"></div>

								<style>
								#chartdiv1 {
										width		: 100%;
										height		: 400px;
										font-size	: 11px;
								}
								</style>


					</div>
				</div>


				<!--End-->

			</div><!--/row-->

			<hr>


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
