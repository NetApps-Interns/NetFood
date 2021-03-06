<?php
include __DIR__.'/../CORE/config/init.php';
header("Content-type: application/json");

$cartObj = new CartStore_Session(); 

$itemID= (int)($_POST['item_id'] ?? 0);
$qty= (int)($_POST['qty'] ?? 0);

$SQL= "SELECT i.price itemPrice, i.item_name itemName, i.photo pix from ".TBL_ITEM." i WHERE id='$itemID'";

$res = $db->query($SQL);
$res = $res->fetch_all(MYSQLI_ASSOC);

$price = $res[0]['itemPrice'];
$extra = [
    'name' => $res[0]['itemName'],
    'image' => $res[0]['pix'],
];


switch (strtolower($_POST["action"])) {
    case 'add':
        if (!$itemID || !$qty){
            die(output_json(['Invalid request'], 0));
        }

        if (!$res){
            die(output_json(['Invalid request'], 0));
        }
        
        if ($cartObj->addItem($itemID, $price, $extra)) {
            die(output_json([$extra["name"].' added to cart'], 1, $cartObj->getCart()));
        }
        die(output_json(['Error adding '.$extra["name"].' to cart'], 0));
    
    case 'remove':
        if (!$itemID || !$qty){
            die(output_json(['Invalid request'], 0));
        }
        
        
        if ($cartObj->removeItem($itemID, $qty)) {
            die(output_json([$extra["name"].' removed from cart'], 1, $cartObj->getCart()));
        }

        die(output_json(['Error removing '.$extra["name"].' from cart'], 0, $cartObj->getCart()));
    
    case 'clear':
        $cartObj->clearCart();
        die(output_json(['Cart cleared'], 1));
        break;
    
    default:
        # code...
        break;
}