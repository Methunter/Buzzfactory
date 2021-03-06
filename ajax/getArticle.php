<?php 
$headers = GetAllHeaders(); 
//Заголовки для кроссдоменных запросоы
header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS'); 
header('Access-Control-Allow-Headers: Content-Type, X-Requested-With'); 
require_once '../includes/db.php'; // Подключили БД

$query="select id,companyName,smallText,bigText,pic,link,format,date from BF_Articles  order by date"; // интересующие поля
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