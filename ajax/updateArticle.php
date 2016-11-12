<?php 
require_once '../includes/db.php'; // The mysql database connection script
if(isset($_GET['articleID'])){
$status = $_GET['status'];
$articleID = $_GET['articleID'];
$query="update articles set status='$status' where id='$articleID'";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$result = $mysqli->affected_rows;

$json_response = json_encode($result);
}
?>