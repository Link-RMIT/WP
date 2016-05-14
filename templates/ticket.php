<style>
#ticket{border: 3px solid black; 
		border-collapse:collapse; 
		width:400px; 
		background-color: rgb(148,6,11);
		color: white;
		text-align:left;
		padding:5px;
		padding-left:15px;
}
.barcode{padding:30px;
		 text-align:right;
	
}
</style>


<p>
  <div id="ticket">
	<table>
	  <tr>
	  
		<th>
		<div><img border="0" alt="home" src="static/img/logo.PNG" width=250 height=75/></div> <br />
		<?= $args['movie_title'] ?><br />
		<?= $args['day']?> <?= $args['time'] ?><br />
		<?= $args['type']?> <br />
		</th>
		
		<th class="barcode">
		<img src="static/img/barcode.png" width= 50 height=125/>
		</th>

	  </tr>
	</table>
  </div>

</p>
