<?php 
require_once '../includes/db.php'; // The mysql database connection script
if( null !== $_GET['companyName'] ){
$companyName = $_GET['companyName'];
$bigText = $_GET['bigText'];
$smallText = substr($bigText,0,100);
$link = $_GET['link'];
$format = $_GET['format'];
$smallText = substr($bigText,0,100);
$size = $_GET['size'];

$pic = $_GET['pic'];



$query="INSERT INTO BF_Articles (
  companyName,  link,    bigText,   smallText, format,     pic  	)  VALUES ('
$companyName','$link','$bigText','$smallText','$format',  '$pic'	);";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$result = $mysqli->affected_rows;

echo $json_response = json_encode($result);


}
?>