<?php 
    $id = $_GET['id'];

    $sql =  "DELETE FROM tbladmin WHERE idadmin=$id";
    $res = mysqli_query($db, $sql);
?>