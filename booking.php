<?php
include('header.php');
include('models.php');

$movie = MovieModel::get('id',$_GET['id']);
?>

<script>
 available_sessions =  <?php
 $sessions_array = SessionModel::filter('movie_id',$movie->id);
 $sessions_map = array();
 foreach($sessions_array as $s){
     if(array_key_exists($s->day,$sessions_map)){
	 array_push($sessions_map[$s->day],$s->time);
     }
     else{
	 $sessions_map[$s->day] = array($s->time);
     }
 }
 echo json_encode($sessions_map);

 ?>;
</script>
<script src="static/js/booking.js"></script>

	<div id="box4">
		<div class="box2"><?= $movie->title?></div>
		
		<table style="width:100%;">
  
  		<tr>
   			 <td class="td1"><img src="<?= $movie->poster?>"></br>
    		</td>
    		<td class="td2">Title:</br>
				Director:</br> 
				Cast:</br> 
				Genre:</br>
				Rating:</br>
				Time:</br> 
				Plot:</br>
				
		</td>
  		
		<td class="td3"><?= $movie->title?></br>
				<?= $movie->director?></br>
				<?= $movie->cast?></br>
				<?= $movie->gengre?></br>
				<?= $movie->rating?></br>
				<?= $movie->length?></br>
				<?= $movie->plot?></br>
		</tr>
 		</table>
		
		<div id="box5">
		<details>
			<summary>BOOK  NOW</summary>
			<div id=box5">
      			<form method="post" action="https://saturn.csit.rmit.edu.au/~e54061/wp/testbooking.php">

			<fieldset class="fieldset">
				<legend>Booking Information - Fill Out Form Below</legend>

					<label class="label">Movie:</label>
					<select name="movie" required="required" >
						<option value="name">Batman V Superman: Dawn of Justice</option>

					</select>
					</br>

					<label class="label">Day</label>
					<select name="day" id="day-picker" required="required" >
						<option>--</option>
						<option>Wednesday</option>
						<option>Thursday</option>
						<option>Friday</option>
						<option>Saturday</option>
						<option>Sunday</option>

					</select>
					</br>

					<label class="label">Time:</label>
					<select name="time" id="time-picker" required="required" >
						<option>--</option>
						<option>9pm</option>

					</select>
					</br>


					<div id="box5">Choose your tickets below.</div>

					<table id="order-table" class="styledTable">
    	    					<tr>
							<th>Ticket Type:</th>
        						<th>Quantity:</th>
							<th>Subtotal Price:</th>
        					
    						</tr>
						<tr>
							<td>Adult</td>
        						<td>
							<select name="SA" required="required" >
							<option>0</option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>

							</select></td>
							<td>$00.00</td>
        					
    						</tr>
    						<tr>
        						<td>Concession</td>
							<td>
							<select name="SP" required="required" >
							<option>0</option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>

							</select></td>
							<td>$00.00</td>
        					
    						</tr>
    						<tr>
        						<td>Child</td>
							<td>
							<select name="SC" required="required" >
							<option>0</option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>

							</select></td>
							<td>$00.00</td>
        					
    						</tr>
    						<tr>
        						
							<td>First Class Adult</td>
        						<td>
							<select name="FA" required="required" >
							<option>0</option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>

							</select></td>
							<td>$00.00</td>
        					
    						</tr>
    						<tr>
        						<td>First Class Child</td>
							<td>
							<select name="FC" required="required" >
							<option>0</option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>

							</select></td>
							<td>$00.00</td>
        					
    						</tr>
    						<tr>
        						<td>Beanbag - 1 Person</td>
							<td>
							<select name="B1" required="required" >
							<option>0</option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>

							</select></td>
							<td>$00.00</td>
        					
    						</tr>
    						<tr>
        						<td>Beanbag - 2 Persons</td>
							<td>
							<select name="B2" required="required" >
							<option>0</option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>

							</select></td>
							<td>$00.00</td>
        					
    						</tr>
    						<tr>
        						<td>Beanbag - 3 Persons</td>
							<td>
							<select name="B3" required="required" >
							<option>0</option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>

							</select></td>
							<td>$00.00</td>
        					
    						</tr>
    						<tr>
        						<th colspan="2">Total Price</td>
							<th><input type="hidden" name ="price">$00.00</th>
        					
    						</tr>

					</table>

					
					<input type="submit" value="Submit"/>
					</br>
			</feildset>
			</div>

		</details>
		</div>

	</div>
	</br>
	<div id="box"
	<div class="discount">
ON MONDAYS AND TUESDAYS (ALL DAY) </br> AND ON MONDAYS TO FRIDAYS (1PM SESSION ONLY) </br>GET DISCOUNTED TICKETS!</br>	    
	</div>


<?php include('footer.php') ?>
