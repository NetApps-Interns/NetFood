<?php
include_once __DIR__."/../CORE/config/init.php";
header("Content-type: application/json");

$user_input = $_GET["search"] ?? "";
$fave = $_GET["isItFavPage"];
$userID = $_SESSION['userid'] ?? '';
// die($user_input);
// if (!$user_input && !preg_match("/[a-z]{2,}/i", $user_input)){
//     die();
// }

// What I need from the DB
$SQL = "SELECT i.iditem id, i.item_name itemName, i.description itemDescription, i.price itemPrice, i.photo pix, v.vendor_name vendorName";

// Which table am I getting it from, depending on the current page
if ($fave){
    $SQL .= " FROM favorites f JOIN item i ON f.item_id= i.iditem JOIN vendor v ON i.idvendor = v.idvendor WHERE f.id = $userID";

}else{
    $SQL .= " FROM item i JOIN vendor v ON i.idvendor = v.idvendor";
}

if ($user_input !==''){
    if ($fave) {
        $SQL .= " AND";
    } else {
        $SQL .= " WHERE";
    }

    $SQL .= " i.item_name LIKE ? OR v.vendor_name LIKE ?";
    $statement = $pdo->prepare($SQL);
    $statement->execute(["%$user_input%", "%$user_input%"]); 
}else {
    $statement = $pdo->prepare($SQL);
    $statement->execute(); 
}



$items=$statement->fetchAll(PDO::FETCH_ASSOC);

if ($items){
    die(output_json([''], 1, $items));
}
die(output_json(['Item not found', 'Try something else'], 0));

 