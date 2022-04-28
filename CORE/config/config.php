<?php
    try {
    //Connection to Local Server 
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

    $pdo = new PDO('mysql:host=localhost;port=3306=;dbname=netfood-db', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    

    // //Connection to Remote Shared server AKA Jesse's Desktop
    // define('DBSERVER', '192.168.0.122'); //DB server
    // define('DBUSERNAME', 'remote'); //DB Username
    // define('DBPASSWORD', 'remote'); //DB password
    // define('DBNAME', 'netfood-db'); //DB Name

    // // connect to MySQL DB
    
    // $db = mysqli_connect(DBSERVER, DBUSERNAME, DBPASSWORD, DBNAME);

    // // check db connection
    // if ($db === false){
    //     die("Error: Connection Error.". mysqli_connect_error());
    // }

    // $pdo = new PDO('mysql:host=192.168.0.122;port=3306=;dbname=netfood-db', 'remote', 'remote');
    // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $th) {
        //throw $th;
        die($th->getMessage());
    }

    const ITEM_IMG_DIR = "uploads/img/item/";
    

    
    // Database Table Definitons 

    const TBL_FAV = 'favorites';
    const TBL_ITEM = 'item';
    const TBL_VENDOR = 'vendor';
    const TBL_CUSTOMER = 'customer';
