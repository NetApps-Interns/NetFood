<?php
include_once __DIR__."/../CORE/config/init.php";
header("Content-type: application/json");
// die(json_encode($_POST));

// $out = ['msg' => 'login', 'flag' => 1];
	// $error = '';
	if ($_SERVER["REQUEST_METHOD"]=="POST") {

		$email = trim($_POST['username']); 
		$password = trim($_POST['password']);
		// die($password);
		
		$query = $db->query("SELECT * FROM vendor WHERE vendor_email = '$email'");
		
		$row = $query->fetch_all(MYSQLI_ASSOC);
		$row=$row[0];

		if ($row) {
			if (password_verify($password, $row['vendor_password'])) {
				$_SESSION["userid"] = $row["id"]; 
				$_SESSION["user"] = $row;
				session_regenerate_id();

				die(output_json(['Login Successful'], 1));
			} 

		} 

	}
	die(output_json(['Email or Password Incorrect'], 0));

	// $query->close();
	// Close connection
	mysqli_close($db);
				
			
			?>