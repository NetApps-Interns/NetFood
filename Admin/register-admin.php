<?php include_once '../CORE/config/init.php';
include '../components/admin_header.php';?>
<head>
      <style>
         .error {color: crimson;}
      </style>
   </head>
   
      <?php
         // define variables and set to empty values
         $nameErr = $emailErr = $contactErr = $passwordErr  = "";
         $name = $email = $contact = $password = "";
         
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
               $nameErr = "Name is required";
            }else {
               $name = test_input($_POST["name"]);
            }
            
            if (empty($_POST["email"])) {
               $emailErr = "Email is required";
            }else {
               $email = test_input($_POST["email"]);
               
               // check if e-mail address is well-formed
               if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $emailErr = "Invalid email format"; 
               }
            }
            
            if (empty($_POST["contact"])) {
               $contactErr = "Contact Information is Required";
            }else {
               $contact = test_input($_POST["contact"]);
            }
            
            if (empty($_POST["password"])) {
               $passwordErr = "Password is Required";
            }else {
               $password = test_input($_POST["password"]);
            }
            
           
         }
         
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
      ?> 
       <h1>Admin Registration</h1>

      <p><span class = "error">* required field.</span></p>
      <br /> <br />

  
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
          <table  style="width: 30%;">
              <tr>
                  <td>Full Name</td>
                  <td><input type="text" name="name" placeholder="Enter Your Name">
                       <span class = "error">* <?php echo $nameErr;?></span>
                  </td>
              </tr>
              <tr>
                  <td>Email: </td>
                  <td>
                      <input required type="email" name="email" placeholder="Email">
                      <span class = "error">* <?php echo $emailErr;?></span>
                  </td>
              </tr>
              <tr>
                  <td>Contact: </td>
                  <td>
                      <input type="number" name="contact" placeholder="Enter Contact Details">
                      <span class = "error">* <?php echo $contactErr;?></span>
                  </td>
              </tr>
              <tr>
                  <td>Password</td>
                  <td>
                      <input required type="password" name="password" placeholder="Enter Password">
                      <span class = "error">* <?php echo $passwordErr;?></span>
                  </td>
              </tr>
              <tr>
                  <td colspan="2">
                      <input type="submit" name="submit" value="Add Admin" class="btn-admin">
                  </td>
              </tr>
          </table>
      </form>




<?php include '../components/footer.php';?>