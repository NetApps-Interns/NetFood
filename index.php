<?php
include_once 'CORE/config/init.php';

// //if the user is already logged in then redirect user to welcome page
// if (isset($_SESSION["userid"])) {
//     header("location: menu.php");
//     exit;
// }

include 'components/header.php';
include 'components/cart.php';

$page = $_GET['page'] ?? '';

// if(isset($_GET['page'])){
    
// }else {
//     $page='';
// }
?>
<div class="background">
<?php
switch ($page) {
    
    case '':
    case 'landing':
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
    
    case '#':
        # code...
        require 'pages/#.php';
        break;
    
    default:
        require 'pages/landing.php';
        break;
}
?>
</div>
<?php


include 'components/footer.php';



?>