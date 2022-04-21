<?php
include __DIR__.'/../CORE/config/init.php';
header("Content-type: application/json");


$userId = (int)($_SESSION["userid"]);
$itemId = (int)( $_POST['itemId']);
$itemName = sanitizeString( $_POST['itemName'] ?? 'Item');


if($query = $db->query("DELETE FROM ".TBL_FAV." WHERE idcustomer = '$userId' &&  id = '$itemId'")) {

    print_r($query);
    exit;
    
    $query = $query->fetch_all(MYSQLI_ASSOC);
    
    if (count($query) > 0) {
        die(output_json([$itemName." already in favorites"], 0));
    }else {
       
        $insertQuery = $db->prepare("INSERT INTO favorites (item_id, idcustomer) VALUES (?,?)");
        $insertQuery->bind_param("ii", $itemId, $userId);
        $result = $insertQuery->execute();


        if ($result) { 
            die(output_json([$itemName." has been added to Favorites"], 1));
        }
    }
    
    die(output_json(["Something went wrong!!"], 0));
    
}