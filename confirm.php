<?php
include('functions.php');
include('models.php');
session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
    $customer = new CustomerInfo($_REQUEST);
    $_SESSION['customer_info'] = $customer;
}
else{
    $customer = $_SESSION['customer_info'];
}
$cart = $_SESSION['cart'];
?>
<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
	<?php foreach($cart->items as $booking){
	    $session = SessionModel::get('id',$booking->session_id);
	    $movie = MovieModel::get('id',$session->movie_id);
   	    render('receipt.php',array(
		'customer' => $customer,
		'session' => $session,
		'movie' => $movie,
		'booking' => $booking
	    ));
	    $booking->each_row(function($row)use(&$session,&$movie){
		for($i=0;$i<$row['quantity'];$i++){
		    render('ticket.php',array(
			'movie_title' => $movie->title,
			'day' => $session->day,
			'time' => $session->time,
			'type' => $row['type_name']
		    ));
		}
	    });
	}?>
    </body>
</html>

