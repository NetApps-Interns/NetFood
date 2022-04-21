<?php
include __DIR__.'/../CORE/config/init.php';
header("Content-type: application/json");


$userId = (int)($_SESSION["userid"]);
$itemId = (int)( $_POST['itemId']);
$itemName = sanitizeString( $_POST['itemName'] ?? 'Item');

$query = $db->query("DELETE FROM ".TBL_FAV." WHERE idcustomer = '$userId' &&   item_id = '$itemId'");


if($query) {
    die(output_json([$itemName." deleted from favorites"], 1));
}else {
    die(output_json(["Something went wrong!!"], 0));
}