
<?php
include('models.php');
include('functions.php');
?>




<?php
function cart(){
    if(!isset($_SESSION['cart'])) return;
    $cart = $_SESSION['cart'];

    function display_cart($cart){
	foreach($cart->items as $index => $booking){
	    $session = SessionModel::get('id',$booking->session_id);
	    $movie = MovieModel::get('id',$session->movie_id);
	    render('cart_item.php',array(
		'item_number' => $index,
		'movie' => $movie,
		'session' => $session,
		'booking' => $booking
	    ));
	}
    }
    if(isset($_GET['action'])){

	switch ($_GET['action']){
	    case 'destroy':
		echo $_GET['action'];
		
		$cart->items=array();
		//$_SESSION['cart']=$cart;
		break;
	    case 'delete_item':
		$cart->delete_item(intval($_GET['i']));
		header( 'Location: cart.php' ) ;
		exit();
		break;
	}
    }
    display_cart($cart);
    echo "Total: $cart->total";
};
?>

<?php include_once('header.php'); ?>

<div id="box">

    <div class="box2">Shopping Cart Review</div>
    <?php cart(); ?>
    <hr />
    <?php

    if(isset($_SESSION['customer_info'])){
	$c = $_SESSION['customer_info'];
	render('customer_info.php',array(
	    'name' => $c->name,
	    'email' => $c->email,
	    'phone' => $c->phone
	));
    }
    else{
	render('customer_info.php',array(
	    'name' => '',
	    'email' => '',
	    'phone' => ''
	));
    }
    ?>
    </div>
</div>

<?php include_once('footer.php'); ?>
