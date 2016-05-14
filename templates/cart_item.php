<div>
<fieldset clas="feildset">
    <p>
	<?= $args['movie']->title ?>(<?= $args['movie']->rating ?>)
	
	<br />
	Showing at <?= $args['session']->day ?>, <?= $args['session']->time ?><br />
	
	
    </p>	
    <table>
	<tr><th>Ticket Type</th><th>Cost</th><th>quantity</th><th>Subtotal</th></tr>
	<?php $args['booking']->each_row(function($row){ ?>

	    <tr>
		<td><?= $row['type_name'] ?></td>
		<td>$<?= number_format($row['cost'],2) ?></td>
		<td><?= $row['quantity'] ?></td>
		<td>$<?= number_format($row['subtotal'],2) ?></td>
	    </tr>
	    
	<?php }); ?>
	<tr>
	    <td colspan="3">Sub Total:</td>
	    <td>$<?= number_format($args['booking']->total,2) ?></td>
	</tr>
    </table>
	<a href='cart.php?action=delete_item&i=<?= $args['item_number']?>'>Delete from cart</a>
	</fieldset>
</div>
