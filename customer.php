<?php
include 'config.php';
//header("Content-type:application/json");
$custId = $_GET['customer_id'];
$query = "SELECT * FROM milletech_users WHERE id = $custId";


$stmt = $pdo->prepare($query);
$stmt->execute();

$result = $stmt->FetchAll(PDO::FETCH_ASSOC);
var_dump($result);
//$myJSON = json_encode($result);

//echo $myJSON;