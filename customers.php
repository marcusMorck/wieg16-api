<?php
include 'config.php';
header("Content-type:application/json");
//Assigment 1
$customerId = $_GET['customer_id'];
$customerAddress = $_GET['address'];

if (!isset($customerId)){
$query = "SELECT customers.*, 
            address.id as address_id,
            address.customer_id as address_customer_id,
            address.email as address_email,
            address.firstname as address_firstname,
            address.lastname as address_lastname,
            address.postcode as address_postcode,
            address.street as address_street,
            address.city as address_city,
            address.telephone as address_telephone,
            address.country_id as address_country_id,
            address.address_type as address_type,
            address.company as address_company,
            address.country as address_country
            FROM customers
            LEFT JOIN address on customers.id = address.customer_id
            GROUP BY customers.id";


$stmt = $pdo->prepare($query);
$stmt->execute();

$customers = $stmt->FetchAll(PDO::FETCH_ASSOC);

foreach ($customers as $index => $customer){

    $customers[$index]['address'] = [];

    foreach ($customer as $key => $value){
        if (strpos($key, 'address') !== false){
            $customers[$index]['address'][$key] = $value;
            unset($customers[$index][$key]);
        }
    }

}

echo json_encode($customers);
}

//Assignment 2,3
if (isset($customerId)){
    $status = 200;
    $query = "SELECT * FROM customers WHERE id = $customerId";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $customer = $stmt->FetchAll(PDO::FETCH_ASSOC);

    if ($customer == null){
        $status = 404;
        $customer = ["Message" => "customer couldn't be found"];

    }
    header("Content-type: application/json", true, $status);
    echo json_encode($customer);
}

if (isset($customerAddress) && $customerAddress == true){
    $query = "SELECT * FROM customers WHERE id = $customerId";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $customer = $stmt->FetchAll(PDO::FETCH_ASSOC);

    echo json_encode($customer);


}





