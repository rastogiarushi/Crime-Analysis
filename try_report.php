<?php

$username = "";                  // Use your username
$password = "";             // and your password
$database = "";   // and the connect string to connect to your database
 
$c = oci_connect($username, $password, $database);


if (!$c) 
{
    $m = oci_error();
    trigger_error('Could not connect to database: '. $m['message'], E_USER_ERROR);
}


$id=$_POST['id'];
$type=$_POST['type'];
$description=$_POST['description'];
//if (isset($_POST['id'])) {
//	$id=$_POST['id'];
//}
//if (isset($_POST['report'])) {
//   $type=$_POST['type'];
//}
//if (isset($_POST['description'])) {
  /// $description=$_POST['description'];
//}




$stmt = oci_parse($c,'Select Resolution as RESO from Incident_report where Incident_ID = :id AND REPORTTYPE_CODE = :type AND DESCRIPTION = :description');





oci_bind_by_name($stmt, ':id', $id);
oci_bind_by_name($stmt, ':type', $type);
oci_bind_by_name($stmt, ':description', $description);

 $r = oci_execute($stmt);
oci_fetch_all($stmt, $res);

echo $res['RESO'][0];

//while (($row = oci_fetch_array($insert, OCI_ASSOC)) != false) {
  //  echo $row['INCIID'] . "<br>\n";
    //echo $row['REPORTTYPE']->read(11) . "<br>\n"; // this will output first 11 bytes from DESCRIPTION
    //echo $row['REPORTTYPEDESC']->read(11) . "<br>\n";-------->

  if($res['RESO'][0] == '1'){
        
        header('Location: SFReport.php');      
    }

//header('Location: SFReport.php');  
//}
oci_free_statement($stmt);
oci_close($c);



?>