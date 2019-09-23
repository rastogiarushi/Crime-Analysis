 <?php session_start(); 
error_reporting(0);?>
<!DOCTYPE html>
<html>
<head>
<title></title>
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

<?php echo $_SESSION['email']; ?><br>
<?php echo $_SESSION['pass']; ?><br>

<!--- header ---->
<div class="header">
	<div class="container">
		<div class="logo wow fadeInDown animated" data-wow-delay=".5s">
			<a href="index.php">WELCOME TO <span>SFCRIME</span></a>	
		</div>
		
		<div class="clearfix"></div>
	</div>
</div>
<!--- /Pop Link With Sign In ---->
<div class="top-header">
	<div class="container">
		<ul class="tp-hd-lft wow fadeInLeft animated" data-wow-delay=".5s">
			<li><a href="Index.php">Home</a></li>
				
		</ul>
		<ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s"> 			
			
			<li class="sigi"><a href="index.php">Log Out</a></li>
			<?php session_destroy()?>

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
							
								<li class="hm">Welcome! User</li>
								<div class="clearfix"></div>
						</ul>
					</nav>
				</div><!-- /.navbar-collapse -->	
			</nav>
		</div>
		
		<div class="clearfix"></div>
	</div>
</div>
<!--- /footer-btm ---->


<div class="offers-1">
	<div class="container">
		<div class="col-md-4 wow fadeInLeft animated" data-wow-delay=".5s">
			<div class="offers-1-left">
				
	            <h3>Crime Category Wise Comparison</h3>
				<a href="SFCrimePrcnt.php"  class="off" style="margin-top: 5px;">Crime Category Wise Comparison </a>
			</div>
		</div>
		<div class="col-md-4 wow fadeInUp animated" data-wow-delay=".5s">
			<div class="offers-1-left">
				<h3>Crime analyzer</h3>
			</div>
		</div>
		<div class="col-md-4 wow fadeInRight animated" data-wow-delay=".5s">
			<div class="offers-1-left">
				
				<h3>Check Report Status</h3>
				<a href="SFReport.php"  class="off" style="margin-top: 5px;">Check Report Status</a>
			</div>
		</div>
		<div class="col-md-4 wow fadeInLeft animated" data-wow-delay=".5s">
			<div class="offers-1-left">
				
				<h3>Evaluation of Crime</h3>
				<a href="crimeEval.php"  class="off" style="margin-top: 5px;">Evaluation of Crime </a>
			</div>
		</div>
		<div class="col-md-4 wow fadeInUp animated" data-wow-delay=".5s">
			<div class="offers-1-left">
				
				<h3>Crime Analysis via Google Maps</h3>
				<a href="SFMaps.php"  class="off" style="margin-top: 5px;">Crime Analysis via Google Maps</a>
			</div>
		</div>
		<div class="col-md-4 wow fadeInRight animated" data-wow-delay=".5s">
			<div class="offers-1-left">
				
				<h3>Pattern Detection and Trend Analysis  </h3>
				<a href="SFPattern.php" class="off" style="margin-top: 5px;">Pattern Detection and Trend Analysis </a>
			</div>
		</div>
		<div class="clearfix"></div>
	
	</div>
</div>
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
<!--- /footer-top ---->


</body>
</html>