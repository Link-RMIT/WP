<div>
    <script src="static/js/customer_info.js"></script>
    <form action="confirm.php" method="POST" id="customer-info">
	Name:<input type="text" name="name" id="name" value="<?= $args['name'] ?>" /><span id="message-name"></span><br />
	Email:<input type="text" name="email" id="email" value="<?= $args['email'] ?>" /><span id="message-email"></span><br />
	Phone:<input type="text" name="phone" id="phone" value="<?= $args['phone'] ?>" /><span id="message-phone"></span>
	<br />
	<input type='submit' value="Confirm" />
    </form>
</div>
