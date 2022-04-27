<?php
include __DIR__.'/../CORE/config/init.php';
header("Content-type: application/json");

// echo fname;
      
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $fname = name( $_POST['fname']);
    $lname = name( $_POST['lname']);
    $email = email($_POST['email']);
    $password = trim( $_POST[ 'password']);
    $phone_number = phone( $_POST[ 'phone_number']);

    $fullname = $fname . ' ' . $lname;
    $password_hash = password_hash ($password, PASSWORD_BCRYPT);


<<<<<<< HEAD
    if($query = $db->prepare ("SELECT * FROM customer WHERE customer_email = ?")) {
=======
    
    if($query = $db->prepare ("SELECT * FROM ".TBL_CUSTOMER." WHERE customer_email = ?")) {
>>>>>>> 19ee2e58d75077522322ed13f245322451f57732
        $error = '';
       
        //Bind parameters (s string, i = int, b = blob, etc), in our case the = username is a string so we use "s" 
        $query->bind_param ('s', $email);
        $query->execute();

      
        // Store the result so we can check if the account exists in the database.
        $query->store_result();
        if ($query->num_rows > 0) {
            $error .='<p>This email address is already registered!</p>';
            die(output_json(["This email address is already registered!", "Log In or Try another email"], 0));
        } else {
            // Validate password
            if (strlen($password ) < 6) {
            $error .='<p>Password too short</p>';
            die(output_json(["This Password is too short!","Kindly make it longer than 6 characters."], 0));
            }

            // $check = [];
            // if (!preg_match("/[a-z]+/", $password)) {
            //     $check[] = "lowercase";
            // }
            // if (!preg_match("/[A-Z]+/", $password)) {
            //     $check[] = "uppercase";
            // }
            // if (!preg_match("/\d/", $password)) {
            //     $check[] = "number";
            // }
            // if (!preg_match("/[^a-z0-9]/i", $password)) {
            //     $check[] = "special character";
            // }



            // if (!empty($check)){
            //     $msg = "Password must contain at least a ".implode(", ", $check);
            //     die(output_json(['Password format invalid',$msg], 0));
            // }

            // Check phone number
            if (!$phone_number) {
            $error .='<p>Phone number incorrect</p>';
            die(output_json(["This phone number \"".$_POST[ 'phone_number']."\" is invalid!","Kindly input a correct phone number!"], 0));
            }

        } 
      
        if (empty($error) ) {
<<<<<<< HEAD
            $insertQuery = $db->prepare("INSERT INTO customer (customer_name, customer_email, customer_phone_number, customer_password) VALUES (?, ?, ?, ?)");
=======
        
            $insertQuery = $db->prepare("INSERT INTO ".TBL_CUSTOMER." (customer_name, customer_email, customer_phone_number, customer_password) VALUES (?, ?, ?, ?)");
>>>>>>> 19ee2e58d75077522322ed13f245322451f57732
            $insertQuery->bind_param("ssss", $fullname, $email, $phone_number, $password_hash);
            $result = $insertQuery->execute();


            if ($result) { 
                die(output_json(["Your registration was successful!"], 1));
            } else {
                die(output_json(["Something went wrong!!"], 0));
            }
            
            $query->close();
            $insertQuery->close(); 
            // Close DB connection
            mysqli_close($db);
            
        }
        
        
    }
            
    
}