<?php
include 'config.php';
header("Content-type:application/json");
$query = "SELECT milletech_users.*, milletech_user_address.* FROM milletech_users, milletech_user_address WHERE milletech_users.id = milletech_user_address.customer_id";


$stmt = $pdo->prepare($query);
$stmt->execute();

$result = $stmt->FetchAll(PDO::FETCH_ASSOC);

$myJSON = json_encode($result);

echo $myJSON;



