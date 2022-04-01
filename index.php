<?php
include_once 'CORE/config/init.php';

//if the user is already logged in then redirect user to welcome page
if (isset($_SESSION["userid"]) && $_SESSION["user"] === true) {
    header("location: menu.php");
    exit;
}
include 'components/header.php';

$page = $_GET['page'] ?? '';

// if(isset($_GET['page'])){
    
// }else {
//     $page='';
// }

switch ($page) {
    
    case '':
        # code...
        require 'pages/landing.php';
        break;
    
    case 'menu':
        # code...
        require 'pages/menu.php';
        break;
    
    case 'favorites':
        # code...
        require 'pages/favorites.php';
        break;
    
    case 'login-signup':
        # code...
        require 'pages/login-signup-2.php';
        break;
    
<<<<<<< HEAD
    case 'become-a-vendor':
        # code...
        require 'pages/vendour/vendor-registration.php';
=======
    case '#':
        # code...
        require 'pages/#.php';
>>>>>>> ceb8ddc90de2be4e13c9c55ed67ebddee887099b
        break;
    
    case '#':
        # code...
        require 'pages/#.php';
        break;
    
    case '#':
        # code...
        require 'pages/#.php';
        break;
    
    case '#':
        # code...
        require 'pages/#.php';
        break;
    
    case '#':
        # code...
        require 'pages/#.php';
        break;
    
    default:
        # code...
        break;
}



include 'components/footer.php';



?>