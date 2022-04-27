<?php
    define('DBSERVER', '192.168.0.122'); //DB server
    define('DBUSERNAME', 'remote'); //DB Username
    define('DBPASSWORD', 'remote'); //DB password
    define('DBNAME', 'netfood-db'); //DB password

    // connect to MySQL DB
    $db = mysqli_connect(DBSERVER, DBUSERNAME, DBPASSWORD, DBNAME);

    // check db connection
    if ($db === false){
        die("Error: Connection Error.". mysqli_connect_error());
    }

/* Attempt to connect to MySQL database */
try{
    $pdo = new PDO('mysql:host=192.168.0.122;port=3306=;dbname=netfood-db', 'remote', 'remote');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} 
// Set the PDO error mode to exception
catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
    const ITEM_IMG_DIR = "uploads/img/item/";
?>
