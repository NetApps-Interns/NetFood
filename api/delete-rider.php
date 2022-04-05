<?php 
include_once __DIR__."/../CORE/config/init.php";
header("Content-type: application/json");

    $id = $_POST['id'];

    $sql =  "DELETE FROM logistics WHERE logistics_id=$id";
    $res = mysqli_query($db, $sql);
    if ($res){
        die(output_json(['Rider Deleted'], 1));
    }else{
        die(output_json(["Couldn't delete Rider", "Try Again!"], 0));

    }

?>
