<?php
include_once __DIR__."/../CORE/config/init.php";
header("Content-type: application/json");
// die(json_encode($_POST));

// $out = ['msg' => 'login', 'flag' => 1];
if ($_SERVER["REQUEST_METHOD"]=="POST") {

	$email = email($_POST['username']); 
	$password = trim($_POST['password']);
	// die($password);
	$SQL ="SELECT c.id customerId, c.customer_password customerPassword FROM ".TBL_CUSTOMER." c WHERE customer_email = '$email'";
	
	$query = $db->query($SQL);
	
	$row = $query->fetch_all(MYSQLI_ASSOC);
	
	if ($row) {
		$row=$row[0];
<<<<<<< HEAD
		if (password_verify($password, $row['customer_password'])) {
			$_SESSION["userid"] = $row["id"]; 
=======
		if (password_verify($password, $row['customerPassword'])) {
			$_SESSION["userid"] = $row["customerId"]; 
>>>>>>> 19ee2e58d75077522322ed13f245322451f57732
			$_SESSION["user"] = $row;
			session_regenerate_id();

			die(output_json(["Login Successful"], 1));
		} 

	} 

}
die(output_json(['Email or Password incorrect','Try again!'], 0));

// $query->close();
// Close connection
mysqli_close($db);


?>
