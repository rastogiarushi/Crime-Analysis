<?php session_start(); 
error_reporting(0);
$username = "";                  // Use your username
$password = "";             // and your password
$database = "";   // and the connect string to connect to your database
 
$c = oci_connect($username, $password, $database);


if (!$c) 
{
    $m = oci_error();
    trigger_error('Could not connect to database: '. $m['message'], E_USER_ERROR);
}


//if (isset($_POST['id'])) {
//	$id=$_POST['id'];
//}
//if (isset($_POST['report'])) {
//   $type=$_POST['type'];
//}
//if (isset($_POST['description'])) {
  /// $description=$_POST['description'];
//}


if(isset($_POST['Submit'])){

$id=$_POST['id'];
$type=$_POST['type'];
$description=$_POST['description'];
$stmt = oci_parse($c,'Select Resolution as RESO from Incident_report where Incident_ID = :id AND REPORTTYPE_CODE = :type AND DESCRIPTION = :description');





oci_bind_by_name($stmt, ':id', $id);
oci_bind_by_name($stmt, ':type', $type);
oci_bind_by_name($stmt, ':description', $description);

 $r = oci_execute($stmt);
oci_fetch_all($stmt, $res);
oci_free_statement($stmt);
}else{
	$res=' ';
}

//while (($row = oci_fetch_array($insert, OCI_ASSOC)) != false) {
  //  echo $row['INCIID'] . "<br>\n";
    //echo $row['REPORTTYPE']->read(11) . "<br>\n"; // this will output first 11 bytes from DESCRIPTION
    //echo $row['REPORTTYPEDESC']->read(11) . "<br>\n";-------->

//header('Location: SFReport.php');  
//}

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
<!-- 	<script>
		 new WOW().init();
	</script> -->
<!--//end-animate-->
</head>
<body>
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
							<li ><a href="SFCrimePrcnt.php">Crime Category Wise Comparison</a></li>
								<li ><a href="SFPattern.php">Pattern Detection & Trend Analysis</a></li>
								<li class="active"><a href="SFReport.php">Check Report Status</a></li>
								<li><a href="crimeEval.php">Evaluation of Crime </a></li>
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
<!--- SFReport ---->
<div class="agent">
	<div class="container">
		
		<div class="col-md-9 agent-left wow fadeInDown animated" data-wow-delay=".5s">
		<h2 class="wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">Check Report Status</h2>
	<div class="ban-bottom">
			<div class="bnr-right">
			<form method="post" action= "SFReport.php">



													<input style="margin-bottom: 10px" type="text" name="id" value="ID" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
													<select style="margin-top: 0px;margin-bottom: 10px;" name="type" id="type" class="grayTextNormal"> 
					                                <option value="-- Select Type --">-- Select Report Code --</option>
					                                 <option value="VS">VS</option>
					                                <option value="II">II</option>
					                                <option value="IS">IS</option>
					                                 <option value="VI">VI</option>
				                                     </select>

				                                     <select style="margin-top: 0px;margin-bottom: 10px" name="description" id="description" class="grayTextNormal"> 
													 <option value="-- Select Type --">-- Select Report Description --</option>
														<option value="Vehicle Supplement">Vehicle Supplement</option>
														<option value="Initial">Initial</option>
														<option value="Initial Supplement">Initial Supplement</option>
														<option value="Vehicle Initial">Vehicle Initial</option>
														<option value="Coplogic Initial">Coplogic Initial</option>
														<option value="Coplogic Supplement">Coplogic Supplement</option>
				 										</select>
														
													<input type="submit" name="Submit" style="margin-top: 10px">
												</form>
											</div>
											<div>Report Status:  <?php echo $res['RESO'][0]; error_reporting(0); ?></div>
</div>


</div>
</div>
</div>

</body>
</html>