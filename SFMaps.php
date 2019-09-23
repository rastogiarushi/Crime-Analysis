<?php session_start(); 
$username = "";                  // Use your username
$password = "";             // and your password
$database = "";   // and the connect string to connect to your database

$c = oci_connect($username, $password, $database);
if (!$c) 
{
    $m = oci_error();
    trigger_error('Could not connect to database: '. $m['message'], E_USER_ERROR);
}
$stmt = oci_parse($c,'(select analysis_neighbourhood as AN, round(avg(latitude),3) as LAT, round(avg(longitude),3) as LONGI, round(((count(incident_category)/164325)*100),3) as NUM
from incident_address,incidents,main  
where main.inci_code = incidents.incident_code AND main.CNN_NO = incident_address.CNN
group by analysis_neighbourhood)');

$r = oci_execute($stmt);
oci_fetch_all($stmt, $val);
oci_free_statement($stmt);
oci_close($c);
?>
<!DOCTYPE HTML>
<html>
<head>
<title>SFCrime</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {
        "packages":["map"],
        // Note: you will need to get a mapsApiKey for your project.
        // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
        "mapsApiKey": ""
    });
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
      	var data = google.visualization.arrayToDataTable([
        <?php echo '["LAT", "LONG", "NUM","AN"]' ?>,
        <?php
        	for($i = 0; $i < count($val['LAT']) - 1; $i++){
        		echo '[' . floatval($val['LAT'][$i]). ', ' . floatval($val['LONGI'][$i]). ', ' . floatval($val['NUM'][$i]). ',"' . $val['AN'][$i]. '"],';
        	}
        	echo '['.floatval($val['LAT'][count($val['LAT']) - 1]).', '.floatval($val['LONGI'][count($val['LONGI']) - 1]).','.floatval($val['NUM'][count($val['NUM']) - 1]).',"'.$val['AN'][count($val['AN']) - 1].'"]';
        ?>
      ]);
        //var data = google.visualization.arrayToDataTable([
          //['Lat', 'Long', 'Name'],
         // [37.4232, -122.0853, 'Work'],
       //   [37.4289, -122.1697, 'University'],
     //     [37.6153, -122.3900, 'Airport'],
   //       [37.4422, -122.1731, 'Shopping']
 //       ]);

        var map = new google.visualization.Map(document.getElementById('map_div'));
        map.draw(data, {
          showTooltip: true,
          showInfoWindow: true
        });
      }

    </script>

<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href="css/font-awesome.css" rel="stylesheet">
<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
</head>
<body>
<!-- top-header -->

	
<!--- /top-header ---->
<!--- header ---->
<div class="header">
	<div class="container">
		<div class="logo wow fadeInDown animated" data-wow-delay=".5s">
			<a href="index.html">WELCOME TO <span>SFCRIME</span></a>	
		</div>
		
		<div class="clearfix"></div>
	</div>
</div>
<!--- /header ---->
<div class="top-header">
	<div class="container">
		<ul class="tp-hd-lft wow fadeInLeft animated" data-wow-delay=".5s">
			<li><a href="Index.html">Home</a></li>
				
		</ul>
		<ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s"> 			
			
			<li class="sigi"><a href="index.html">Log Out</a></li>
        </ul>
		<div class="clearfix"></div>
	</div>
</div>
<!--- footer-btm ---->
<div class="footer-btm wow fadeInLeft animated" data-wow-delay=".5s">
	<div class="container">
	<div class="navigation">
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					<nav class="cl-effect-1">
						<ul class="nav navbar-nav">
							<li ><a href="SFCrimePrcnt.php">Crime Category Wise Comparison</a></li>
								<li ><a href="SFPattern.php">Pattern Detection & Trend Analysis</a></li>
								<li ><a href="SFReport.php">Check Report Status</a></li>
								<li><a href="crimeEval.php">Evaluation of Crime </a></li>
								<li class="active"><a href="SFMaps.php">Maps</a></li>
								<div class="clearfix"></div>
						</ul>
					</nav>
				</div>
				 
			</nav>
		</div>
		
		<div class="clearfix"></div>
	</div>
</div>
<!--- /footer-btm ---->

</div>

<!--- Maps ---->
<div class="agent">
	<div class="container">
		
		<div class="about-mid">
			<h2 class="wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">Google Map</h2>
	
				<div class="col-md-12 app-left wow fadeInLeft animated" data-wow-delay=".5s">
						<div id="map_div" style="width: 1200px; height: 800px"></div>
					</div>
			
			<div class="clearfix"></div>
		</div>
		
		
	</div>
</div>

	
</div>
<!--- /Maps ---->
<!--- footer-top ---->
<div class="footer-top">
	<div class="container">
		<div class="col-md-6 footer-left wow fadeInLeft animated" data-wow-delay=".5s">
			
		</div>
		<div class="col-md-6 footer-left wow fadeInRight animated" data-wow-delay=".5s">
		
			
		</div>
		<div class="clearfix"></div>
	</div>
</div>
</body>
</html>