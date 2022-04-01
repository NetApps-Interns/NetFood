<?php

    include __DIR__.'/../CORE/config/init.php';
    header("Content-type: application/json");

    //process the value and save in database
    //Check if button is clicked
    if ($_SERVER["REQUEST_METHOD"]=="POST") {

        //button clicked
        //get data from form
        $name = $_POST['name'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $password = md5($_POST['password']);
       
        //SQL Query to save data to database
        $sql = "INSERT INTO tbladmin SET
            admin_full_name='$name',
            email_address='$email',
            contact='$contact',
            admin_password='$password'
        ";
       //execute query
      
       $res = mysqli_query($db, $sql);

       die(output_json(['Admin successfully added'], 1));
    }   
       
   
?>