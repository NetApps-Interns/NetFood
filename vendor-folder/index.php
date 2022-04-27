<?php
include_once 'CORE/config/init.php';

//if the user is already logged in then redirect user to welcome page
if (isset($_SESSION["userid"]) && $_SESSION["user"] === true) {
    header("location: pages/v-admin.php");
    exit;
}
include 'components/vendor_header.php';

$page = $_GET['page'] ?? '';

// if(isset($_GET['page'])){
    
// }else {
//     $page='';
// }

switch ($page) {
      
    case 'menu':
        # code...
        require '../../pages/menu.php';
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
        require 'pages/vendor_registration.php';
        # code...
        break;
}



include 'components/vendor_footer.php';



?>