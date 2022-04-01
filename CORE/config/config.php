<?php
<<<<<<< HEAD
    // define('DBSERVER', 'localhost'); //DB server
    // define('DBUSERNAME', 'root'); //DB Username
    // define('DBPASSWORD', ''); //DB password
    // define('DBNAME', 'mydb'); //DB password

    // // connect to MySQL DB
    // $db = mysqli_connect(DBSERVER, DBUSERNAME, DBPASSWORD, DBNAME);

    // // check db connection
    // if ($db === false){
    //     die("Error: Connection Error.". mysqli_connect_error());
    // }

    $pdo = new PDO('mysql:host=localhost;port=3306=;dbname=mydb', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   //const ITEM_IMG_DIR = "/uploads/img/item/";
=======
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

    const ITEM_IMG_DIR = "/uploads/img/item/";
>>>>>>> ceb8ddc90de2be4e13c9c55ed67ebddee887099b
