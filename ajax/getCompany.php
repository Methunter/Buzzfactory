<?php 
require_once '../includes/db.php'; // Подключили БД

$query="select title,smallText,bigText,pic,original,thumb,link,size,format,date,conpanyName from BF_Articles  order by date"; // интересующие поля
$result = $mysqli->query($query) or die($mysqli->error.__LINE__); // запросили

$arr = array();

if($result->num_rows > 0) { // если есть что показать:
	while($row = $result->fetch_assoc()) { // пока есть что показать
		$arr[] = $row;	// показывай
	}
}

# JSON-encode the response
 $json_response = json_encode($arr);

// header( "Content-Type: application/json" );

echo $json_response;
// exit;
?>