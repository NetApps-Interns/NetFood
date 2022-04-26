<?php

$SQL= "SELECT i.iditem id, i.photo pix, i.item_name itemName, i.description itemDescription, i.price itemPrice , v.vendor_name vendorName FROM item i JOIN vendor v ON i.idvendor = v.idvendor";

    $statement = $pdo->prepare($SQL);
    $statement->execute();
    $customer=$statement->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="profile-con">
<img src="<?= ITEM_IMG_DIR.$customer['pix']?>" alt="Profile Picture">

</div>

<style>
    .profile-con{
        background-color: purple;
        
    }


</style>