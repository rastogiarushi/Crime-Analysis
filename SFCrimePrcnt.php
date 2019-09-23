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
$stmt = oci_parse($c,'select * from(select incident_category as IC, COUNT(incident_category) as IP from incidents group by incident_category order by COUNT(incident_category) desc)where ROWNUM <=10');
$r = oci_execute($stmt);
oci_fetch_all($stmt, $res);
function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return random_color_part() . random_color_part() . random_color_part();
}
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
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        <?php echo '["IC", "IP", { role: "style" } ]' ?>,
        <?php
        	for($i = 0; $i < count($res['IP']) - 1; $i++){
        		echo '["' . $res['IC'][$i]. '", ' . floatval($res['IP'][$i]). ', "' . random_color(). '"],';
        	}
        	echo '["'.$res['IC'][count($res['IP']) - 1].'", '.floatval($res['IP'][count($res['IP']) - 1]).', "' . random_color(). '"],';
        ?>
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Top 10 Crime Categories",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
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
			<a href="index.php">WELCOME TO <span>SFCRIME</span></a>	
		</div>
		
		<div class="clearfix"></div>
	</div>
</div>
<!--- /header ---->
<div class="top-header">
	<div class="container">
		<ul class="tp-hd-lft wow fadeInLeft animated" data-wow-delay=".5s">
			<li><a href="Index.php">Home</a></li>
				
		</ul>
		<ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s"> 			
			
			<li class="sigi"><a href="index.php">Log Out</a></li>
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
							<li ><a href="SFACrimePrcnt.php">Crime Category Wise Comparison</a></li>
								<li ><a href="SFPattern.php">Pattern Detection & Trend Analysis</a></li>
								<li ><a href="SFReport.php">Check Report Status</a></li>
								<li class="active"><a href="crimeEval.php">Evaluation of Crime %</a></li>
								<li><a href="SFMaps.php">Maps</a></li>
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

<!--- Category of Crime ---->
<div class="agent">
	<div class="container">
		
		<div class="agent-left wow fadeInDown animated" data-wow-delay=".5s">
		<h2 class="wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">Crime Category Wise Comparision</h2>
	
			<div class="ban-bottom">

				<div class="col-md-12" style="float: right">
					<p> Crime Category Wise Depiction provides us with the category wise occurence of the criminal activity that takes place.This  depiction enriches us with the information about the categories which are prone to occur more than the others.The bar graph generated provides us with the  top 10 crime categories and depicts the number of their  occurences that takes place in San Fransico.From the  graph we that Larcency Theft has occured frequently compared to the other categories in the year 2018.</p>
				</div>
				<center> <div class="col-md-12" id="columnchart_values" style="width: 900px; height: 300px;float: left;" ></div></center>

			</div>
		</div>
			
		</div>
			<div class="clearfix"></div>
	</div>
</div>
<div class="about" style="padding:0em 0;" >
	<div class="container">
		
		<div class="about-mid">
			
				<div class="col-md-4 app-right wow fadeInLeft animated" data-wow-delay=".5s">
						
					</div>
			
			<div class="clearfix"></div>
		</div>
		
	</div>
</div>
<!--- /Category Of Crime ---->
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
