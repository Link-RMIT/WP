<?php
include('header.php');
include('models.php');
session_start();



$cart_item = new Booking($_REQUEST);




if(!isset($_SESSION["cart"])){
    $_SESSION["cart"]=new ShoppingCart();
}

$_SESSION['cart']->add_item($cart_item);



?>
<div id="box">
	<div id="text">
	Your items have been placed into your cart. </br>
	You can now either: </br>
	<a href="sessions.php">
		continue shopping
	</a></br>
	or</br>
	<a href="cart.php">
		view your shopping cart
	</a>
	</div>
</div>





<?php include('footer.php') ?>
