<?php
    //connection
 include '../CORE/config/config.php';

if(isset( $_POST['vendor_name'], $_POST['description'], $_POST['contact'], $_POST['email'], $_POST['vendor_address'], $_POST['vendor_password'])){

     $vendor_name = $_POST['vendor_name'];
     $description = $_POST['description'];
     $contact = $_POST['contact'];
     $email = $_POST['email'];
     $vendor_address = $_POST['vendor_address'];
     $vendor_password = $_POST['vendor_password'];

     if(empty($vendor_name) || empty($description) || empty($contact) || empty($email)  || empty($vendor_address) || empty($vendor_name) ){
   
        echo 'Please correct the fields';
    }

$statement = $pdo->prepare("INSERT INTO vendor (vendor_name, description, contact, email, vendor_address, vendor_password ) 
                                        VALUES(:vendor_name, :description, :contact, :email, :vendor_address, :vendor_password )");

$statement->bindValue(':vendor_name', $vendor_name);
$statement->bindValue(':description', $description);
$statement->bindValue(':contact', $contact);
$statement->bindValue(':email', $email);
$statement->bindValue(':vendor_address', $vendor_address);
$statement->bindValue(':vendor_password', $vendor_password);
$statement->execute();
 header("location:congrats.php");
}

?>