<?php
// Include config file
require_once '../CORE/config/config.php';
 
// Define variables and initialize with empty values
$email = $vendor_password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    
   
    // Validate username
    if(empty(trim($_POST["email"]))){
        $username_err = "Please enter a email.";
    // } elseif(!preg_match('/^[a-zA-Z0-9_]@+$/', trim($_POST["email"]))){
    //     $username_err = "Username can only contain letters, numbers, and underscores.";
    
} else{
        // Prepare a select statement
        $sql = "SELECT id FROM vendor WHERE email = ?";

        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username );
           
            
            // Set parameters
            
            // $param_vendor_name = $_POST["vendor_name"] ?? "";
            // $param_description = $_POST["description"];
            // $param_contact = $_POST["contact"];
            // $param_vendor_address = $_POST["vendor_address"];
            // $param_idcity = $_POST["idcity"];

            $param_username = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["vendor_password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["vendor_password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $vendor_password = trim($_POST["vendor_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($vendor_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO vendor (email, vendor_password) VALUES (?,?)";
         
        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters

            // $param_vendor_name = $vendor_name;
            // $param_description = $description;
            // $param_contact = $contact;
            // $param_vendor_address = $vendor_address;
            // $param_idcity = $idcity;
            $param_username = $email;
            $param_password = password_hash($vendor_password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: ../pages/review.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($db);
}
?>