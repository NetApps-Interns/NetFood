<?php
include_once 'CORE/config/init.php';


include 'components/admin_header.php';


$page = $_GET['page'] ?? '';

switch ($page) {
    
    
    
    case 'dashboard':
        # code...
        require 'pages/admin/dashboard.php';
        break;
    
    case 'orders':
        # code...
        require 'pages/admin/orders.php';
        break;
    
    case 'vendors':
        # code...
        require 'pages/admin/manage_vendors.php';
        break;
    
    case 'logistics':
        # code...
        require 'pages/admin/manage_riders.php';
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
        require 'pages/admin/admin-login.php';

        break;
}



include 'components/footer.php';



?>