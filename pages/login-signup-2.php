<section class="image-background">
    <div class="hover-tab">
		
        <button class="tablink" onclick="openPage('log-in-tab', this, 'initial')"id="defaultOpen">Log In</button>
       <button class="tablink" onclick="openPage('sign-up-tab', this, 'initial')" >Sign Up</button>

		<!-- SIGN UP        onsubmit="return signupValidation()" -->

        <div id="sign-up-tab" class="tabcontent">
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
			?>

			<?php echo $error?>

            <form action="" method="post" name="sign-up" class="login-request" >
			
				<div class="row">
					<div class="col span-1-of-2">
						<input type="text" name="fname" id="username" placeholder="First Name" required>
						<span class="required error" id="username-info"></span>
					</div>
					<div class="col span-1-of-2">
						<input type="text" name="lname" id="username" placeholder="Last Name" required>
					</div>
				</div>

				<div class="row">
						<input type="email" name="email" id="email" placeholder="E-mail" required>
				</div>
				
				<div class="row">
						<input type="text" name="phone_number" id="phone_number" placeholder="Phone Number" required>
				</div>

				<div class="row">
					<input class="col password" type="password" name="password" placeholder="Password" required>
					<ion-icon name="eye-outline" class="col togglePassword"></ion-icon>
				
				</div>

				<button type="submit" name="sign-up-submit" id="signup-btn">Sign Up</button>
				
			</form>
        </div>
		

		<!--  -->
		<!-- LOG IN -->
		<div id="log-in-tab" class="tabcontent">

			<?php
				$error = '';
				if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['log-in-submit'])) {

					$email = trim($_POST['username']); 
					$password = trim($_POST['password']);
					// die($password);
					
					$query = $db->prepare("SELECT * FROM customer WHERE customer_email = ?");
						$query->bind_param('s', $email);
						if ($query->execute()){
						$row = $query->fetch();
						if ($row) {
							if (password_verify($password, $row['customer_password'])) {
								$_SESSION["userid"] = $row["idcustomer"]; 
								$_SESSION["user"] = $row;

								// Redirect the user to welcome page 
								header("location: menu.html");
								exit;
							} 
							else {
								$error .= '<p class="error">The password is not valid.</p>';
							} 
						} 
						else {
						$error .= '<p class="error">No User exist with that email address.</p>';
						}
					}
					// $query->close();
					// Close connection
					mysqli_close($db);
				}
			?>
		
		<?php echo $error?>

			<form name="login" action="" method="post" class="login-request">
			
				<div class="row">
					<input type="text" name="username" id="username" placeholder="Email or Phone Number" required>
				</div>
				
				<div class="row">
						<input class="col password" name="password" type="password" placeholder="Password" required>
					<ion-icon name="eye-outline" class="col togglePassword"></ion-icon>
				</div>

				<button type="submit" name="log-in-submit" id="login-btn">Log In</button>

			</form>

        </div>
        

    </div>
    </section>
