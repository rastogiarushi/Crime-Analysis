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
$stmt = oci_parse($c,'SELECT COUNT(INCIDENT_CATEGORY) AS IC, INCIDENT_DAYOFWEEK AS DAYS FROM MAIN,INCIDENTS   where  main.inci_code = incidents.incident_code GROUP BY INCIDENT_DAYOFWEEK order by COUNT(INCIDENT_CATEGORY) desc');
$query2 = oci_parse($c,'select to_char(to_date(incident_date,\'MM-DD-YYYY\'), \'Month\') as CMONTH, round((count(incident_category)/164325)*100,4) as CR from main,incidents where main.inci_code = incidents.incident_code group by to_char(to_date(incident_date, \'MM-DD-YYYY\'), \'Month\') order by count(incident_category) desc');
$r = oci_execute($stmt);
oci_fetch_all($stmt, $res);
$r = oci_execute($query2);
oci_fetch_all($query2, $val);
oci_free_statement($stmt);
oci_free_statement($query2);
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
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
      	var data = google.visualization.arrayToDataTable([
        <?php echo '["DAYS", "IC"]' ?>,
        <?php
        	for($i = 0; $i < count($res['IC']) - 1; $i++){
        		echo '["' . $res['DAYS'][$i]. '", ' . floatval($res['IC'][$i]). '],';
        	}
        	echo '["'.$res['DAYS'][count($res['DAYS']) - 1].'", '.floatval($res['IC'][count($res['IC']) - 1]).']';
        ?>
      ]);
       // var data = google.visualization.arrayToDataTable([
         // ['Days', 'Number of crimes',],
          //['2004',  1000],
         // ['2005',  1170],
          //['2006',  660],
          //['2007',  1030]
        //]);

        var options = {
          title: 'Number of crimes in each day',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
   </script>
   <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
      	var data2 = google.visualization.arrayToDataTable([
        <?php echo '["CMONTH", "CR"]' ?>,
        <?php
        	for($i = 0; $i < count($val['CR']) - 1; $i++){
        		echo '["' . $val['CMONTH'][$i]. '", ' . floatval($val['CR'][$i]). '],';
        	}
        	echo '["'.$val['CMONTH'][count($val['CMONTH']) - 1].'", '.floatval($val['CR'][count($val['CR']) - 1]).']';
        ?>
      ]);
       // var data = google.visualization.arrayToDataTable([
         // ['Days', 'Number of crimes',],
          //['2004',  1000],
         // ['2005',  1170],
          //['2006',  660],
          //['2007',  1030]
        //]);

        var options = {
          title: 'Number of crimes in each month',
          legend: { position: 'bottom' }
        };

        var chart2 = new google.visualization.LineChart(document.getElementById('curve_chart2'));

        chart2.draw(data2, options);
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
								<li class="active"><a href="SFPattern.php">Pattern Detection & Trend Analysis</a></li>
								<li ><a href="SFReport.php">Check Report Status</a></li>
								<li><a href="crimeEval.php">Evaluation of Crime </a></li>
								<li><a href="SFMaps.php">Maps</a></li>
								<div class="clearfix"></div>
						</ul>
					</nav>
				</div>
				<!-- <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1"> -->
					<!-- <nav class="cl-effect-1"> -->
						<!-- <ul class="nav navbar-nav"> -->
							
								<!-- <li class="hm">Area Wise Comparison</li> -->
								<!-- <div class="clearfix"></div> -->
						<!-- </ul> -->
					<!-- </nav> -->
				<!-- </div><!-- /.navbar-collapse -->	 
			</nav>
		</div>
		
		<div class="clearfix"></div>
	</div>
</div>
<!--- /footer-btm ---->
</div>

<!--- SFPattern ---->
<div class="agent">
	<div class="container">
		
		<div class="col-md-9 agent-left wow fadeInDown animated" data-wow-delay=".5s">
		<h2 class="wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">Pattern Detection & Trend Analysis</h2>
	
	
</div>
<div class="about" style="padding:0em 0;" >
	<div class="container">
		
		<div class="about-mid">
			<div class="col-md-6 abt-lft wow fadeInLeft animated" data-wow-delay=".5s">
				<h3>Day wise crime evaluation:</h3>
				<p>The resultant line graph depicts the trend analysis for each day and represents the different types of crime categories that take place on that particular day.</p>
				<p>The analysis helps to identify the days on which prevalent criminal activities takes place and it provides us a clear depiction of the days  which are safer or dangerous. From the result we are able to find out that there is a high rise in the criminal activities on friday whereas  sunday appears to have the lowest record of  criminal activities.</p> 
			</div>
				<div class="col-md-6 app-left wow fadeInLeft animated" data-wow-delay=".5s">
						<div id="curve_chart" style="width: 600px; height: 500px;"></div>
					</div>
			<div class="col-md-6 abt-lft wow fadeInLeft animated" data-wow-delay=".5s">
				<h3>Month wise crime evaluation:</h3>
				<p> The resultant line graph provides us an overall trend and evaluation for the entire year 2018 depicting the crime rate for each month.</p>
				<p>From the graph the month of January has the highest crime rate whereas the month of february has the lowest crime rate of all.</p>
			</div>
			<div class="col-md-6 app-left wow fadeInLeft animated" data-wow-delay=".5s">
						<div id="curve_chart2" style="width: 600px; height: 500px"></div>
					</div>
			<div class="clearfix"></div>
		</div>
		
	</div>
</div>
<!--- /SFPattern ---->
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