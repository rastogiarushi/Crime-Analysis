<?php
session_start();

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




$stmt = oci_parse($c,'select incident_category as IC, round((count(incident_code)/739)*100,2) as IP from incidents group by incident_category');





$r = oci_execute($stmt);
oci_fetch_all($stmt, $res);

// echo $res['IC'][0];
//echo $res['IP'][0];
//print_r($res['IC']);

//while (($row = oci_fetch_array($insert, OCI_ASSOC)) != false) {
  //  echo $row['INCIID'] . "<br>\n";
    //echo $row['REPORTTYPE']->read(11) . "<br>\n"; // this will output first 11 bytes from DESCRIPTION
    //echo $row['REPORTTYPEDESC']->read(11) . "<br>\n";-------->
   
    //header('Location: SFCrimePrcnt.php');      
   // print_t($res['incident_percentage']);

//header('Location: SFReport.php');  
//}
//$cat = $res['IC'][0];
//echo $cat;
$cat= $res;
echo json_encode($cat);
oci_free_statement($stmt);
oci_close($c);
?>


