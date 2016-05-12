<?php
include('models.php');
include('functions.php');
session_start();

?>




<?php


function main(){
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

include('header.php');
main();
?>
<?php include('footer.php') ?>
