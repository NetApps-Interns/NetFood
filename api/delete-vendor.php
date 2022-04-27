<?php 
include_once __DIR__."/../CORE/config/init.php";
header("Content-type: application/json");

    $id = $_POST['id'];

    $sql =  "DELETE FROM vendor WHERE idvendor=$id";
    $res = mysqli_query($db, $sql);
    if ($res){
        die(output_json(['Vendor Deleted'], 1));
    }else{
        die(output_json(["Couldn't delete Vendor", "Try Again!"], 0));

    }

?>