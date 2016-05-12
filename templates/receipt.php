<div>
    <table>
	<tr><td><?= $args['customer']->name ?></td><td>Silverado</td></tr>
	<tr><td><?= $args['customer']->email ?></td><td><?= $args['movie']->title?></td></tr>
	<tr><td><?= $args['customer']->phone ?></td><td><?= $args['session']->day.' '.$args['session']->time?></td></tr>
	<?php $args['booking']->each_row(function($row){ ?>
	    <tr>
		<td><?= $row['quantity'] ?> &#10005; <?= $row['type_name'] ?></td>
		<td>$<?= number_format($row['subtotal'],2) ?></td>
	    </tr>
	<?php }); ?>
	<tr>
	    <td></td>
	    <td>Total: $<?= number_format($args['booking']->total,2) ?></td>
	</tr>
    </table>
</div>
