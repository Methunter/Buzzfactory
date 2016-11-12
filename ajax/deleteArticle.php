<?php 
require_once '../includes/db.php'; // The mysql database connection script
if(isset($_GET['articleID'])){
$articleID = $_GET['articleID'];

$query="delete from articles where id='$articleID'";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$result = $mysqli->affected_rows;

echo $json_response = json_encode($result);
}
?>