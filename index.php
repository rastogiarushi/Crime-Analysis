<!DOCTYPE html>

<?php

//Use the db.php file and open connection...
$username = "";                  // Use your username
$password = "";             // and your password
$database = "";   // and the connect string to connect to your database
 
$c = oci_connect($username, $password, $database);


if (!$c) {
    $m = oci_error();
    trigger_error('Could not connect to database: '. $m['message'], E_USER_ERROR);
}

if(isset($_POST['Submit'])){
    
    
//... the INSERT statement (line 13) is populated with the user data entered.

$insert = oci_parse($c, 'INSERT INTO ACCOUNT (email,pass,confirmpass) VALUES(:email, :pass, :conpassw)');

///Assign form data to global variables...
$email=$_POST['Email'];
$pass=$_POST['Password'];
$conpassw=$_POST['Confirm'];


//Use bind by name function for db performance and to enhance security...
oci_bind_by_name($insert, ':email', $email);
oci_bind_by_name($insert, ':pass', $pass);
oci_bind_by_name($insert, ':conpassw', $conpassw);


// Execute and commit the transaction...
$execute = oci_execute($insert);  


if ($execute) {
    //Uncomment below line if needed for testing
    
    //print "Row Inserted";
    
    //Parse and execute commit statement to oracle, committing transaction.
    $commit = oci_parse($c, 'Commit');
oci_execute($commit);
}

oci_free_statement($insert);

}
?>



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
		<ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s"> 			
			<li class="sig"><a href="#" data-toggle="modal" data-target="#myModal" >Sign Up</a></li> 
			<li class="sigi"><a href="#" data-toggle="modal" data-target="#myModal4" >/ Sign In</a></li>
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
							<li><a href="#">Home</a></li>
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

<!--- about ---->
<div class="about" style="padding:0em 0;" >
	<div class="container">
		
		<div class="about-mid">
			<div class="col-md-6 abt-lft wow fadeInLeft animated" data-wow-delay=".5s">
				<h3>San Francisco Crime Description</h3>
				<p>Violent crime rate is one of the highest in the nation for San Francisco across communities of all sizes. 
Violent offenses tracked included burglary, sexual offense, drug violation, robbery, assault etc.
The overall crime rate in San Francisco is 151% higher than the national average. San Francisco is safer than 5% of the cities in United States. For every 100,000 people, there are 18.86 daily crimes that occur in San Francisco. 
The most prevalent type of crime for our data is larceny theft. Some of the bad neighbourhoods in San Franciso are Lakeshore, Sunset/Parkside, Visiticion Valley etc.		</p>
			</div>
				<div class="col-md-6 app-left wow fadeInLeft animated" data-wow-delay=".5s">
						<img src="images/SF3.JPG" class="img-responsive" alt="">
					</div>
			
			<div class="clearfix"></div>
		</div>
		
	</div>
</div>
<!--- /about ---->

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

<!-- sign -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
							<section>
								<div class="modal-body modal-spa">
									<div class="login-grids">
										<div class="login">
											<div class="login-left">
												
											</div>
											<div class="login-right">
												<form action = "index.php" method = "post">
													<input type="text" name="Email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
													<input type="text" name="Password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
													<input type="text" name="Confirm" value="Confirm Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Confirm Password';}" required="">	
														
													<input type="submit" name="Submit">
												</form>
											</div>
												<div class="clearfix"></div>								
										</div>
											
									</div>
								</div>
							</section>
					</div>
				</div>
			</div>
<!-- //sign -->
<!-- signin -->
		<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>						
						</div>
						<div class="modal-body modal-spa">
							<div class="login-grids">
								<div class="login">
									<div class="login-right">
										<form action="try.php" method="post">
											<h3>Signin with your account </h3>
											<input type="text" name="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">	

											<input type="password" name="pass" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">	
											
											
											<input type="submit" value="SIGNIN">
										</form>
									</div>
									<div class="clearfix"></div>								
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
<!-- //signin -->

<div class="results">



</div>

</body>
</html>