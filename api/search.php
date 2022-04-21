<?php
include_once __DIR__."/../CORE/config/init.php";
header("Content-type: application/json");

$user_input = $_GET["search"] ?? "";
// die($user_input);
// if (!$user_input && !preg_match("/[a-z]{2,}/i", $user_input)){
//     die();
// }

$SQL= "SELECT i.iditem id, i.photo pix, i.item_name itemName, i.description itemDescription, i.price itemPrice , v.vendor_name vendorName FROM item i JOIN vendor v ON i.idvendor = v.idvendor";

if ($user_input !==''){
    $SQL .= " WHERE item_name LIKE ?";
    $statement = $pdo->prepare($SQL);
    $statement->execute(['%'.$user_input.'%']); 
}else {
    $statement = $pdo->prepare($SQL);
    $statement->execute(); 
    
}



$items=$statement->fetchAll(PDO::FETCH_ASSOC);

if ($items){
    die(output_json([''], 1, $items));
}
die(output_json(['Item not found', 'Try something else'], 0));

 