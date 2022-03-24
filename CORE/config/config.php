<?php
    define('DBSERVER', 'localhost'); //DB server
    define('DBUSERNAME', 'root'); //DB Username
    define('DBPASSWORD', ''); //DB password
    define('DBNAME', 'netfood-db'); //DB Name

    // connect to MySQL DB
    $db = mysqli_connect(DBSERVER, DBUSERNAME, DBPASSWORD, DBNAME);

    // check db connection
    if ($db === false){
        die("Error: Connection Error.". mysqli_connect_error());
    }
?>