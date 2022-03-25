<?php
// include_once __DIR__."/../CORE/config/config.php";
// header("Content-type: application/json");
// die(json_encode($_POST));

// $out = ['msg' => 'login', 'flag' => 1];
				$error = '';
				if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['log-in-submit'])) {

					$email = trim($_POST['username']); 
					$password = trim($_POST['password']);
					// die($password);
					
					$query = $db->query("SELECT * FROM customer WHERE customer_email = '$email'");
					// $query->bind_param('s', $email);
					// if ($query->execute()){
					$row = $query->fetch_all(MYSQLI_ASSOC);
					$row=$row[0];

					if ($row) {
						if (password_verify($password, $row['customer_password'])) {
							$_SESSION["userid"] = $row["idcustomer"]; 
							$_SESSION["user"] = $row;

							// Redirect the user to welcome page 
							header("location: index.php?");
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
				
			
			?>