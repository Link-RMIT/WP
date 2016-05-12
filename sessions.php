<?php
include('header.php');
include('models.php');
?>

	<div id="box">
		 <div class="box2">OUT NOW | <a href="action.php">ACTION</a>  | <a href="art.php">ART/FOREIGN</a> | <a href="kids.php">KIDS</a> | <a href="romcom.php">ROMANTIC COMEDY</a></div>
		 <?php foreach (MovieModel::$movies as $movie){?>
       		     <a href="booking.php?id=<?= $movie->id ?>">
			 <div class="floating-box">
			     <img src="<?= $movie->poster ?>">
			 </div>
		     </a>
		 <?php }?>
	</div>
	</br>
	<div id="box"
	<div class="discount"> ON MONDAYS AND TUESDAYS (ALL DAY) </br> AND ON MONDAYS TO FRIDAYS (1PM SESSION ONLY) </br>GET DISCOUNTED TICKETS!</br>
	</div>
<?php include('footer.php'); ?>






