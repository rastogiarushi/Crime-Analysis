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


$incident_category=$_POST['incident_category'];
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





oci_bind_by_name($stmt, ':incident_category', $incident_category);

$r = oci_execute($stmt);
oci_fetch_all($stmt, $res);
// echo $res['IC'][0];
//echo $res['IP'][0];
print_r($res['IC']);

//while (($row = oci_fetch_array($insert, OCI_ASSOC)) != false) {
  //  echo $row['INCIID'] . "<br>\n";
    //echo $row['REPORTTYPE']->read(11) . "<br>\n"; // this will output first 11 bytes from DESCRIPTION
    //echo $row['REPORTTYPEDESC']->read(11) . "<br>\n";-------->
   
    //header('Location: SFCrimePrcnt.php');      
   // print_t($res['incident_percentage']);

//header('Location: SFReport.php');  
//}
$cat = $res['IC'][0];

oci_free_statement($stmt);
oci_close($c);
?>


<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Language', 'Speakers (in millions)'],
          ['Assamese', 13], [<?php echo $cat?> , 83], ['Bodo', 1.4],
          ['Dogri', 2.3], ['Gujarati', 46], ['Hindi', 300],
          ['Kannada', 38], ['Kashmiri', 5.5], ['Konkani', 5],
          ['Maithili', 20], ['Malayalam', 33], ['Manipuri', 1.5],
          ['Marathi', 72], ['Nepali', 2.9], ['Oriya', 33],
          ['Punjabi', 29], ['Sanskrit', 0.01], ['Santhali', 6.5],
          ['Sindhi', 2.5], ['Tamil', 61], ['Telugu', 74], ['Urdu', 52]
        ]);

        var options = {
          title: 'Indian Language Use',
          legend: 'none',
          pieSliceText: 'label',
          slices: {  4: {offset: 0.2},
                    12: {offset: 0.3},
                    14: {offset: 0.4},
                    15: {offset: 0.5},
          },
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>