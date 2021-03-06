<?php
include __DIR__.'/../CORE/config/init.php';
header("Content-type: application/json");


$userId = (int)($_SESSION["userid"]);
$itemId = (int)( $_POST['itemId']);
$itemName = sanitizeString( $_POST['itemName'] ?? 'Item');

$SQL = "SELECT * FROM ".TBL_FAV." f WHERE f.idcustomer = '$userId' && item_id = '$itemId' ";

if($query = $db->query($SQL)) {
    $query = $query->fetch_all(MYSQLI_ASSOC);
    
    if (count($query) > 0) {
        die(output_json([$itemName." already in favorites"], 0));
    }else {

        $SQL="INSERT INTO ".TBL_FAV." (item_id, idcustomer) VALUES (?,?)";
       
        $insertQuery = $db->prepare($SQL);
        $insertQuery->bind_param("ii", $itemId, $userId);
        $result = $insertQuery->execute();


        if ($result) { 
            die(output_json([$itemName." has been added to Favorites"], 1));
        }
    }
    
    die(output_json(["Something went wrong!!"], 0));
    
}