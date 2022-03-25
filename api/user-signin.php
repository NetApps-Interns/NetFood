<?php
    $error = '';
        
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sign-up-submit'])){

        $fname = trim( $_POST['fname']);
        $lname = trim( $_POST['lname']);
        $fullname = $fname . ' ' . $lname;
        $email = trim ($_POST['email']);
        $password = trim( $_POST[ 'password']);
        $phone_number = trim( $_POST[ 'phone_number']);
        $password_hash = password_hash ($password, PASSWORD_BCRYPT);


        if($query = $db->prepare ("SELECT * FROM customer WHERE customer_email = ?")) {
            $error = '';

            //Bind parameters (s string, i = int, b = blob, etc), in our case the = username is a string so we use "s" 
            $query->bind_param ('s', $email);
            $query->execute();

            // Store the result so we can check if the account exists in the database.
            $query->store_result();
            if ($query->num_rows > 0) {
            $error .= '<p class="error">This email address is already registered!</p>'; 
            } else {
                // Validate password
                if (strlen($password ) < 6) {
                $error.= '<p class="error">Password must have atleast 6 characters.</p>';
                }
            } 

            if (empty($error) ) {
            
                $insertQuery = $db->prepare("INSERT INTO customer (customer_name, customer_email, customer_phone_number, customer_password) VALUES (?, ?, ?, ?)");
                $insertQuery->bind_param("ssss", $fullname, $email, $phone_number, $password_hash);
                $result = $insertQuery->execute();
                // die($insertQuery->error);

                if ($result) { 
                    $error .= '<p class="success">Your registration was successful! </p>';
                } else {
                    $error .= '<p class="error">Something went wrong! </p>';
                }
                
                $query->close();
                $insertQuery->close(); 
                // Close DB connection
                mysqli_close($db);
                
            }
            
            
        }
                
        
    }