<?php
include('header.php');
include('models.php');
session_start();



$cart_item = new Booking($_POST);




if(!isset($_SESSION["cart"])){
    $_SESSION["cart"]=new ShoppingCart();
}

$_SESSION['cart']->add_item($cart_item);



?>








<?php include('footer.php') ?>
