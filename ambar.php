<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Silverado Cinema</title>

    <style>
     
    </style>
  <link rel="stylesheet" href="style.css" />
 <link href='https://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  </head> 



  <body>
	
    <header class="header">
      <a href="index.php">
      <div><img border="0" alt="home" src="logo.PNG" width=500 height=150/></div> 
      </a>
    </header>

    <nav class="nav">
      <a href="index.php">Home</a> | <a href="sessions.php">Out Now</a> | <a href="contact.php">Contact Us</a>
    </nav>

    <main class="main">
	<div id="box4">
		<div class="box2">Ambarsariya</div>
				
		<table style="width:100%;">
  
  		<tr>
   			 <td class="td1"><img src="ambar.jpg"></br>
    		</td>
    		<td class="td2">Title:</br>
				Director:</br> 
				Cast:</br> 
				Genre:</br>
				Rating:</br>
				Time:</br> 
				Plot:</br>
		</td>
  		
		<td class="td3">Ambarsayiya</br>
				Mandeep Kaumar</br>
				Diljit Dosanjh, Navneet Kaur Dhillon</br>
				Bollywood, Comedy</br>
				PG</br>
				140 Minutes</br>
				Diljit Dosanjh stars as the rogueish Ambarsariya, an insurance agent with a record number of sales to his name and great pride in his home and faith. However, when he meets those who aren't living up to their Sikh name and promise, even corrupting his great city, Ambarsariya's life is thrown into turmoil.</br>

		</tr>
 		</table>

		<div id="box5">
		<details>
			<summary>BOOK  NOW</summary>
			<div id=box5">
      			<form method="post" action="http://saturn.csit.rmit.edu.au/~e54061/wp/testbooking.php">

			<fieldset class="fieldset">
				<legend>Booking Information - Fill Out Form Below</legend>

					<label class="label">Movie:</label>
					<select name="movie" required="required" >
						<option value="name">Ambarsariya</option>

					</select>
					</br>

					<label class="label">Day</label>
					<select name="day" required="required" >
						<option>--</option>
						<option>Monday</option>
						<option>Tuesday</option>
						<option>Saturday</option>
						<option>Sunday</option>

					</select>
					</br>

					<label class="label">Time:</label>
					<select name="time" required="required" >
						<option>--</option>
						<option>3pm</option>
						<option>6pm</option>

					</select>
					</br>


					<div id="box5">Choose your tickets below.</div>

					<table class="styledTable">
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
	<div class="discount"> ON MONDAYS AND TUESDAYS (ALL DAY) </br> AND ON MONDAYS TO FRIDAYS (1PM SESSION ONLY) </br>GET DISCOUNTED TICKETS!</br>
	</div>
    </main>

    <footer class="footer">
      &copy; Lucas O'Hare s3545867
      <script>
        document.write(new Date().getFullYear());
      </script>.
    </footer>

  </body>
</html>






