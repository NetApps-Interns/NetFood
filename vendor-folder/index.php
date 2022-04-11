<?php
include_once 'vendor-folder/CORE/config/init.php';

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
    
    case '':
        # code...
        require 'vendor-folder/pages/become-a-vendor.php';
        break;
    
    case 'menu':
        # code...
        require 'pages/menu.php';
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



include 'components/vendor_footer.php';



?>