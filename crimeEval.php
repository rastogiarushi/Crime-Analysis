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
$stmt = oci_parse($c,'select analysis_neighbourhood as AN, round(((rank*100)/total),2) as RF from (select analysis_neighbourhood, rownum as rank, total from (select analysis_neighbourhood, 
A as W_F from (select analysis_neighbourhood, count(*) as A from incident_address 
group by analysis_neighbourhood)  order by W_F) cross join (select count(distinct analysis_neighbourhood) as total from incident_address)) where 
analysis_neighbourhood in (select analysis_neighbourhood from (select analysis_neighbourhood,count(*) from (select * from incident_address where 
(latitude  between 37.7079882591846 and 37.8299907546886) and (longitude between -122.511294926245 and -122.363742766952)) 
group by analysis_neighbourhood order by count(*) desc) where rownum=1)');
$query2=oci_parse($c,'select analysis_neighbourhood as ANN
from incidents i,main m,incident_address id
where i.incident_code = m.inci_code AND m.CNN_no=id.CNN
group by analysis_neighbourhood
having count(incident_category)<= ALL(select count(incident_category) from incidents i,main m,incident_address id
where i.incident_code = m.inci_code AND m.CNN_no=id.CNN
group by analysis_neighbourhood)');
$r = oci_execute($stmt);
oci_fetch_all($stmt, $res);
oci_free_statement($stmt);
$r1 = oci_execute($query2);
oci_fetch_all($query2, $val);
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
<div>

</div>	
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
							<li ><a href="SFCrimePrcnt.php">Crime Category Wise Comparison</a></li>
								<li ><a href="SFPattern.php">Pattern Detection & Trend Analysis</a></li>
								<li ><a href="SFReport.php">Check Report Status</a></li>
								<li class="active"><a href="crimeEval.php">Evaluation of Crime </a></li>
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
		
		<div class="col-md-6 agent-left wow fadeInDown animated" data-wow-delay=".5s">
		<h2 class="wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">Crime Evaluation Results</h2>
		<div class="sear">
			<img src="images/SF.JPEG" class="img-responsive" alt="">
		<h3>The most dangerous place is :- <?php echo $res['AN'][0] ?> with the a risk factor of<?php echo $res['RF'][0] ?>.</h3></img><br>
				
		</div>
		
			
		</div>
<div class="col-md-6 agent-left wow fadeInDown animated" data-wow-delay=".5s" style="margin-bottom: 10px">
		
		<div class="sear">
			<br>
			<img src="images/SF2.JPEG" class="img-responsive" alt="">
		
		<h3>Safest location is :- <?php echo $val['ANN'][0] ?></h3></img>			
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
