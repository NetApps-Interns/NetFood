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
       
        if($query = $db->prepare ("SELECT * FROM tbladmin WHERE email_address = ?")) {
            $error = '';
           
            //Bind parameters (s string, i = int, b = blob, etc), in our case the = username is a string so we use "s" 
            $query->bind_param ('s', $email);
            $query->execute();
    
          
            // Store the result so we can check if the account exists in the database.
            $query->store_result();
            if ($query->num_rows > 0) {
                $error .='<p>This email address is already registered!</p>';
                die(output_json(["This email address is already registered!", "Log In or Try another email"], 0));
            }
            else{
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
            }


        }
                

?>