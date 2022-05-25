<?php
    require_once __DIR__."/config.php";
    
    include __DIR__.'/../functions/input_output.php';
    include __DIR__.'/../functions/CartStore_Session.php';
    session_start();
    $cartObj = new CartStore_Session();
    define("CART_COMP", $cartObj->getCart());
    define("CART_QTY", count($cartObj->getItems()));

