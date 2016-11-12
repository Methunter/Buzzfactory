<?php 
require_once '../includes/db.php'; // The mysql database connection script
if( null !== $_GET['title'] ){
$title = $_GET['title'];
echo("Hello, i'm addArticle!\n");
$bigText = $_GET['bigText'];
$smallText = substr($bigText,0,100);
$width = $_GET['width'];
$height = $_GET['height'];
$pic = $_GET['pic'];

echo $json_response = json_encode("Here: "+$title+ $bigText+ $width+ $height+ $pic );
$query="INSERT INTO BF_Articles(title,smallText, bigText, width, height, pic, link)  VALUES ('$title','$smallText', '$bigText', '$width', '$height', '$pic','link');";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$result = $mysqli->affected_rows;

echo $json_response = json_encode($result);


}
?>

