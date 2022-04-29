<?php
include __DIR__.'/../CORE/config/init.php';
header("Content-type: application/json");


$userId = (int)($_SESSION["userid"]);
$itemId = (int)( $_POST['itemId']);
$itemName = sanitizeString( $_POST['itemName'] ?? 'Item');

$SQL="DELETE FROM ".TBL_FAV." WHERE idcustomer = '$userId' && item_id = '$itemId'";

$query = $db->query($SQL);

// var_dump($query);
// exit;

$SQL = "SELECT i.id itemId, i.item_name itemName, i.description itemDescription, i.price itemPrice, i.photo pix, v.vendor_name vendorName FROM ".TBL_FAV." f JOIN ".TBL_ITEM." i ON f.item_id= i.id JOIN ".TBL_VENDOR." v ON i.idvendor = v.id where f.idcustomer='$userId'";
$statement = $pdo->prepare($SQL);
$statement->execute();
$items=$statement->fetchAll(PDO::FETCH_ASSOC);

if($query) {
    die(output_json([$itemName." deleted from favorites"], 1, $items));
}else {
    die(output_json(["Something went wrong!!"], 0));
}