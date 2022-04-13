<?php
include_once __DIR__."/../CORE/config/init.php";
header("Content-type: application/json");

$user_input = $_GET["search"] ?? "";

if (!$user_input && !preg_match("/[a-z]{2,}/i", $user_input)){
    die();
}
$statement = $pdo->prepare("SELECT iditem id, photo pix, item_name itemName, description itemDescription, price itemPrice FROM item WHERE item_name LIKE ?");
$statement->execute(['%'.$user_input.'%']);  

$items=$statement->fetchAll(PDO::FETCH_ASSOC);

if ($items){
    die(output_json([''], 1, $items));
}
die(output_json(['Item not found', 'Try something else'], 0));

 