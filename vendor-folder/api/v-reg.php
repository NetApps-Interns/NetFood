<?php
    //connection
include '../config.php';

if(isset( $_POST['vendor_name'], $_POST['description'], $_POST['contact_info'], $_POST['contact_email'], $_POST['vendor_address'], $_POST['vendor_password'])){

     $vendor_name = $_POST['vendor_name'];
     $description = $_POST['description'];
     $contact_info = $_POST['contact_info'];
     $contact_email = $_POST['contact_email'];
     $vendor_address = $_POST['vendor_address'];
     $vendor_password = $_POST['vendor_password'];

     if(empty($vendor_name) || empty($description) || empty($contact_info) || empty($contact_email)  || empty($vendor_address) || empty($vendor_name) ){
   
        echo 'Please correct the fields';
    }

$statement = $pdo->prepare("INSERT INTO vendor (vendor_name, description, contact_info, contact_email, vendor_address, vendor_password ) 
                                        VALUES(:vendor_name, :description, :contact_info, :contact_email, :vendor_address, :vendor_password )");

$statement->bindValue(':vendor_name', $vendor_name);
$statement->bindValue(':description', $description);
$statement->bindValue(':contact_info', $contact_info);
$statement->bindValue(':contact_email', $contact_email);
$statement->bindValue(':vendor_address', $vendor_address);
$statement->bindValue(':vendor_password', $vendor_password);
$statement->execute();
 header("location:congrats.php");
}

?>