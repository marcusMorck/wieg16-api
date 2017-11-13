<?php
include 'config.php';
header("Content-type:application/json");
$query = "SELECT * FROM miltech_user";


$stmt = $pdo->prepare($query);
$stmt->execute();

$result = $stmt->FetchAll(PDO::FETCH_ASSOC);

$myJSON = json_encode($result);

echo $myJSON;
/*WHERE `users`.`userid` = ?*/


