<?php
include('CORE/config/config.php');

//getting id of the data from url
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
}


//deleting the row from table
$statement=$pdo->prepare("DELETE FROM item where id=:id");
$statement->bindValue(':id',$id);
$statement->execute();

header("Location:v-admin.php");





?>