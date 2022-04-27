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
$SQL = "SELECT i.id itemId, i.item_name itemName, i.description itemDescription, i.price itemPrice, i.photo pix, v.vendor_name vendorName";

// Which table am I getting it from, depending on the current page
if ($fave){
    $SQL .= " FROM ".TBL_FAV." f JOIN ".TBL_ITEM." i ON f.item_id= i.id JOIN ".TBL_VENDOR." v ON i.idvendor = v.id WHERE f.idcustomer = $userID";

}else{
    $SQL .= " FROM ".TBL_ITEM."i JOIN ".TBL_VENDOR." v ON i.idvendor = v.id";
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

 