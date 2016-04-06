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

		<div class="container-fluid-full">
		<div class="row-fluid">

			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
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
				<li><a href="#">Charts</a></li>
			</ul>

			

			<div class="row-fluid sortable">
				<div class="box span6">
					<div class="box-header">
						<h2><i class="halflings-icon white list-alt"></i><span class="break"></span>Pie</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
							
							
							<div class="control-group">
							<table align="center" cellpadding="10" >
							<tr>
							<td>
							<label class="control-label controls" for="selectError3">Company</label></td>
							<td>
								<div class="controls">
									  <select id="selectError11" data-rel="chosen"  name="company_name">
										<option  selected value> -- Select an option -- </option>
										<option>Option 4</option>
										<option>Option 5</option>
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
									"country": "USA",
									"visits": 2025
								  }, {
									"country": "China",
									"visits": 1882
								  }, {
									"country": "Japan",
									"visits": 1809
								  }, {
									"country": "Germany",
									"visits": 1322
								  }, {
									"country": "UK",
									"visits": 1122
								  }, {
									"country": "France",
									"visits": 1114
								  }, {
									"country": "India",
									"visits": 2200
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

				<div class="box span6">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white list-alt"></i><span class="break"></span>Donut</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						 <div id="donutchart" style="height: 300px;"></div>
					</div>
				</div>
				
				
				<!-- Animated Doughnut Start-->
				
				<div class="box span12" style="margin-left: 0em;">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white list-alt"></i><span class="break"></span>Donut</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
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
								  "1995": [ 
									{ "sector": "Agriculture", "size": 6.6 }, 
									{ "sector": "Mining and Quarrying", "size": 0.6 }, 
									{ "sector": "Manufacturing", "size": 23.2 }, 
									{ "sector": "Electricity and Water", "size": 2.2 }, 
									{ "sector": "Construction", "size": 4.5 }, 
									{ "sector": "Trade (Wholesale, Retail, Motor)", "size": 14.6 }, 
									{ "sector": "Transport and Communication", "size": 9.3 }, 
									{ "sector": "Finance, real estate and business services", "size": 22.5 }, 
									{ "sector": "Personal Services", "size": 4.8 }, 
									{ "sector": "Government", "size": 11.8 } ],
								  "1996": [ 
									{ "sector": "Agriculture", "size": 6.4 }, 
									{ "sector": "Mining and Quarrying", "size": 0.5 }, 
									{ "sector": "Manufacturing", "size": 22.4 }, 
									{ "sector": "Electricity and Water", "size": 2 }, 
									{ "sector": "Construction", "size": 4.2 }, 
									{ "sector": "Trade (Wholesale, Retail, Motor)", "size": 14.8 }, 
									{ "sector": "Transport and Communication", "size": 9.7 }, 
									{ "sector": "Finance, real estate and business services", "size": 22 }, 
									{ "sector": "Personal Services", "size": 4.9 }, 
									{ "sector": "Government", "size": 13.2 } ],
								  "1997": [ 
									{ "sector": "Agriculture", "size": 6.1 }, 
									{ "sector": "Mining and Quarrying", "size": 0.2 }, 
									{ "sector": "Manufacturing", "size": 20.9 }, 
									{ "sector": "Electricity and Water", "size": 1.8 }, 
									{ "sector": "Construction", "size": 4.2 }, 
									{ "sector": "Trade (Wholesale, Retail, Motor)", "size": 13.7 }, 
									{ "sector": "Transport and Communication", "size": 9.4 }, 
									{ "sector": "Finance, real estate and business services", "size": 22.1 }, 
									{ "sector": "Personal Services", "size": 4.7 }, 
									{ "sector": "Government", "size": 17.5 } ],
								  "1998": [ 
									{ "sector": "Agriculture", "size": 6.2 }, 
									{ "sector": "Mining and Quarrying", "size": 0.3 }, 
									{ "sector": "Manufacturing", "size": 21.4 }, 
									{ "sector": "Electricity and Water", "size": 1.9 }, 
									{ "sector": "Construction", "size": 4.2 }, 
									{ "sector": "Trade (Wholesale, Retail, Motor)", "size": 14.5 }, 
									{ "sector": "Transport and Communication", "size": 10.6 }, 
									{ "sector": "Finance, real estate and business services", "size": 23 }, 
									{ "sector": "Personal Services", "size": 5.2 }, 
									{ "sector": "Government", "size": 12.5 } ],
								  "1999": [ 
									{ "sector": "Agriculture", "size": 5.7 }, 
									{ "sector": "Mining and Quarrying", "size": 0.2 }, 
									{ "sector": "Manufacturing", "size": 20 }, 
									{ "sector": "Electricity and Water", "size": 1.8 }, 
									{ "sector": "Construction", "size": 4.4 }, 
									{ "sector": "Trade (Wholesale, Retail, Motor)", "size": 15.2 }, 
									{ "sector": "Transport and Communication", "size": 10.5 }, 
									{ "sector": "Finance, real estate and business services", "size": 24.7 }, 
									{ "sector": "Personal Services", "size": 5.3 }, 
									{ "sector": "Government", "size": 11.8 } ],
								  "2000": [ 
									{ "sector": "Agriculture", "size": 5.1 }, 
									{ "sector": "Mining and Quarrying", "size": 0.3 }, 
									{ "sector": "Manufacturing", "size": 20.4 }, 
									{ "sector": "Electricity and Water", "size": 1.7 }, 
									{ "sector": "Construction", "size": 4 }, 
									{ "sector": "Trade (Wholesale, Retail, Motor)", "size": 16.3 }, 
									{ "sector": "Transport and Communication", "size": 10.7 }, 
									{ "sector": "Finance, real estate and business services", "size": 24.6 }, 
									{ "sector": "Personal Services", "size": 5.5 }, 
									{ "sector": "Government", "size": 11.1 } ],
								  "2001": [ 
									{ "sector": "Agriculture", "size": 5.5 }, 
									{ "sector": "Mining and Quarrying", "size": 0.2 }, 
									{ "sector": "Manufacturing", "size": 20.3 }, 
									{ "sector": "Electricity and Water", "size": 1.6 }, 
									{ "sector": "Construction", "size": 3.1 }, 
									{ "sector": "Trade (Wholesale, Retail, Motor)", "size": 16.3 }, 
									{ "sector": "Transport and Communication", "size": 10.7 }, 
									{ "sector": "Finance, real estate and business services", "size": 25.8 }, 
									{ "sector": "Personal Services", "size": 5.5 }, 
									{ "sector": "Government", "size": 10.7 } ],
								  "2002": [ 
									{ "sector": "Agriculture", "size": 5.7 }, 
									{ "sector": "Mining and Quarrying", "size": 0.2 }, 
									{ "sector": "Manufacturing", "size": 20.5 }, 
									{ "sector": "Electricity and Water", "size": 1.6 }, 
									{ "sector": "Construction", "size": 3.6 }, 
									{ "sector": "Trade (Wholesale, Retail, Motor)", "size": 16.1 }, 
									{ "sector": "Transport and Communication", "size": 10.7 }, 
									{ "sector": "Finance, real estate and business services", "size": 26 }, 
									{ "sector": "Personal Services", "size": 5.5 }, 
									{ "sector": "Government", "size": 10.1 } ],
								  "2003": [ 
									{ "sector": "Agriculture", "size": 4.9 }, 
									{ "sector": "Mining and Quarrying", "size": 0.2 }, 
									{ "sector": "Manufacturing", "size": 19.4 }, 
									{ "sector": "Electricity and Water", "size": 1.5 }, 
									{ "sector": "Construction", "size": 3.3 }, 
									{ "sector": "Trade (Wholesale, Retail, Motor)", "size": 16.2 }, 
									{ "sector": "Transport and Communication", "size": 11 }, 
									{ "sector": "Finance, real estate and business services", "size": 27.5 }, 
									{ "sector": "Personal Services", "size": 5.6 }, 
									{ "sector": "Government", "size": 9.9 } ],
								  "2004": [ 
									{ "sector": "Agriculture", "size": 4.7 }, 
									{ "sector": "Mining and Quarrying", "size": 0.2 }, 
									{ "sector": "Manufacturing", "size": 18.4 }, 
									{ "sector": "Electricity and Water", "size": 1.4 }, 
									{ "sector": "Construction", "size": 3.3 }, 
									{ "sector": "Trade (Wholesale, Retail, Motor)", "size": 16.9 }, 
									{ "sector": "Transport and Communication", "size": 10.6 }, 
									{ "sector": "Finance, real estate and business services", "size": 28.1 }, 
									{ "sector": "Personal Services", "size": 5.5 }, 
									{ "sector": "Government", "size": 9.4 } ],
								  "2005": [ 
									{ "sector": "Agriculture", "size": 4.3 }, 
									{ "sector": "Mining and Quarrying", "size": 0.2 }, 
									{ "sector": "Manufacturing", "size": 18.1 }, 
									{ "sector": "Electricity and Water", "size": 1.4 }, 
									{ "sector": "Construction", "size": 3.9 }, 
									{ "sector": "Trade (Wholesale, Retail, Motor)", "size": 15.7 }, 
									{ "sector": "Transport and Communication", "size": 10.6 }, 
									{ "sector": "Finance, real estate and business services", "size": 29.1 }, 
									{ "sector": "Personal Services", "size": 5.7 }, 
									{ "sector": "Government", "size": 9.2 } ],
								  "2006": [ 
									{ "sector": "Agriculture", "size": 4 }, 
									{ "sector": "Mining and Quarrying", "size": 0.2 }, 
									{ "sector": "Manufacturing", "size": 16.5 }, 
									{ "sector": "Electricity and Water", "size": 1.3 }, 
									{ "sector": "Construction", "size": 3.7 }, 
									{ "sector": "Trade (Wholesale, Retail, Motor)", "size": 14.2 }, 
									{ "sector": "Transport and Communication", "size": 12.1 }, 
									{ "sector": "Finance, real estate and business services", "size": 29.1 }, 
									{ "sector": "Personal Services", "size": 5.9 }, 
									{ "sector": "Government", "size": 10.7 } ],
								  "2007": [ 
									{ "sector": "Agriculture", "size": 4.7 }, 
									{ "sector": "Mining and Quarrying", "size": 0.2 }, 
									{ "sector": "Manufacturing", "size": 16.2 }, 
									{ "sector": "Electricity and Water", "size": 1.2 }, 
									{ "sector": "Construction", "size": 4.1 }, 
									{ "sector": "Trade (Wholesale, Retail, Motor)", "size": 15.6 }, 
									{ "sector": "Transport and Communication", "size": 11.2 }, 
									{ "sector": "Finance, real estate and business services", "size": 30.4 }, 
									{ "sector": "Personal Services", "size": 5.8 }, 
									{ "sector": "Government", "size": 8.3 } ],
								  "2008": [ 
									{ "sector": "Agriculture", "size": 4.9 }, 
									{ "sector": "Mining and Quarrying", "size": 0.3 }, 
									{ "sector": "Manufacturing", "size": 17.2 }, 
									{ "sector": "Electricity and Water", "size": 1.4 }, 
									{ "sector": "Construction", "size": 5.1 }, 
									{ "sector": "Trade (Wholesale, Retail, Motor)", "size": 15.4 }, 
									{ "sector": "Transport and Communication", "size": 11.1 }, 
									{ "sector": "Finance, real estate and business services", "size": 28.4 }, 
									{ "sector": "Personal Services", "size": 6 }, 
									{ "sector": "Government", "size": 8.5 } ],
								  "2009": [ 
									{ "sector": "Agriculture", "size": 4.7 }, 
									{ "sector": "Mining and Quarrying", "size": 0.3 }, 
									{ "sector": "Manufacturing", "size": 16.4 }, 
									{ "sector": "Electricity and Water", "size": 1.9 }, 
									{ "sector": "Construction", "size": 4.9 }, 
									{ "sector": "Trade (Wholesale, Retail, Motor)", "size": 15.5 }, 
									{ "sector": "Transport and Communication", "size": 10.9 }, 
									{ "sector": "Finance, real estate and business services", "size": 27.9 }, 
									{ "sector": "Personal Services", "size": 6.6 }, 
									{ "sector": "Government", "size": 9.9 } ],
								  "2010": [ 
									{ "sector": "Agriculture", "size": 4.2 }, 
									{ "sector": "Mining and Quarrying", "size": 0.3 }, 
									{ "sector": "Manufacturing", "size": 16.2 }, 
									{ "sector": "Electricity and Water", "size": 2.2 }, 
									{ "sector": "Construction", "size": 4.3 }, 
									{ "sector": "Trade (Wholesale, Retail, Motor)", "size": 15.7 }, 
									{ "sector": "Transport and Communication", "size": 10.2 }, 
									{ "sector": "Finance, real estate and business services", "size": 28.8 }, 
									{ "sector": "Personal Services", "size": 6.8 }, 
									{ "sector": "Government", "size": 10.2 } ],
								  "2011": [ 
									{ "sector": "Agriculture", "size": 4.1 }, 
									{ "sector": "Mining and Quarrying", "size": 0.3 }, 
									{ "sector": "Manufacturing", "size": 14.9 }, 
									{ "sector": "Electricity and Water", "size": 2.3 }, 
									{ "sector": "Construction", "size": 5 }, 
									{ "sector": "Trade (Wholesale, Retail, Motor)", "size": 17.3 }, 
									{ "sector": "Transport and Communication", "size": 10.2 }, 
									{ "sector": "Finance, real estate and business services", "size": 27.2 }, 
									{ "sector": "Personal Services", "size": 6.7 }, 
									{ "sector": "Government", "size": 10.4 } ],
								  "2012": [ 
									{ "sector": "Agriculture", "size": 3.8 }, 
									{ "sector": "Mining and Quarrying", "size": 0.3 }, 
									{ "sector": "Manufacturing", "size": 14.9 }, 
									{ "sector": "Electricity and Water", "size": 2.6 }, 
									{ "sector": "Construction", "size": 5.1 }, 
									{ "sector": "Trade (Wholesale, Retail, Motor)", "size": 15.8 }, 
									{ "sector": "Transport and Communication", "size": 10.7 }, 
									{ "sector": "Finance, real estate and business services", "size": 28 }, 
									{ "sector": "Personal Services", "size": 6.8 }, 
									{ "sector": "Government", "size": 10.3 } ],
								  "2013": [ 
									{ "sector": "Agriculture", "size": 3.7 }, 
									{ "sector": "Mining and Quarrying", "size": 0.2 }, 
									{ "sector": "Manufacturing", "size": 14.9 }, 
									{ "sector": "Electricity and Water", "size": 2.7 }, 
									{ "sector": "Construction", "size": 5.7 }, 
									{ "sector": "Trade (Wholesale, Retail, Motor)", "size": 16.5 }, 
									{ "sector": "Transport and Communication", "size": 10.5 }, 
									{ "sector": "Finance, real estate and business services", "size": 26.6 }, 
									{ "sector": "Personal Services", "size": 6.6 }, 
									{ "sector": "Government", "size": 10.6 } ],
								  "2014": [ 
									{ "sector": "Agriculture", "size": 3.9 }, 
									{ "sector": "Mining and Quarrying", "size": 0.2 }, 
									{ "sector": "Manufacturing", "size": 14.5 }, 
									{ "sector": "Electricity and Water", "size": 2.7 }, 
									{ "sector": "Construction", "size": 5.6 }, 
									{ "sector": "Trade (Wholesale, Retail, Motor)", "size": 16.6 }, 
									{ "sector": "Transport and Communication", "size": 10.5 }, 
									{ "sector": "Finance, real estate and business services", "size": 26.5 }, 
									{ "sector": "Personal Services", "size": 6.4 }, 
									{ "sector": "Government", "size": 10.7 } ]
								};


								/**
								 * Create the chart
								 */
								var currentYear = 1995;
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
									"text": "South African Economy"
								  }],
								  "allLabels": [{
									"y": "54%",
									"align": "center",
									"size": 25,
									"bold": true,
									"text": "1995",
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
										if (currentYear > 2014)
										  currentYear = 1995;
										return data;
									  }
									  
									  function loop() {
										chart.allLabels[0].text = currentYear;
										var data = getCurrentData();
										chart.animateData( data, {
										  duration: 2000,
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
