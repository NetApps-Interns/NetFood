<?php 
include_once __DIR__."/../CORE/config/init.php";
header("Content-type: application/json");

    $id = $_POST['id'];

    $sql =  "DELETE FROM tbladmin WHERE id=$id";
    $res = mysqli_query($conn, $sql);

    if ($res){
        die(output_json(['complete', 'yes'], 1));
    }else{
        die(output_json(["Couldn't delete Admin", "Try Again!"], 0));

    }

?>