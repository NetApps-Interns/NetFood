<?php
include __DIR__.'/../CORE/config/init.php';
header("Content-type: application/json");

$userId = (int)($_SESSION["userid"]);

$name = sanitizeString($_POST['name']);
$number = phone($_POST['number']);
$address = sanitizeString($_POST['address']);

$SQL = "UPDATE ".TBL_CUSTOMER." SET 
`customer_name` = '".$name."',
`customer_phone_number` = '".$number."',
`customer_address` = '".$address."'
 WHERE `customer`.`id` = ".$userId;


$updateQuery = $pdo->prepare($SQL);
$result = $updateQuery->execute();

if ($result) { 
    die(output_json(["Your profile has been updated"], 1));
}
die(output_json(["Error in updating Profile"], 0));