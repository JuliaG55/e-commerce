<?php include 'core/functions.php' ?>
<?php include 'includes/header.php' ?>

<body>
	<?php include 'includes/navbar.php' ?>

	<div class="boxbox">
        <h4>Your basket!</h4>
	    <ul id="cart-list" class="shacostyle">
        </ul>
        
       <button class="clear-cart" onclick="Cart.clear({})">Clear ALL!</button> 
        
        <button class="clear-cart" onclick="window.location.href='checkout.php'">Check out!</button>
        
	</div>

	<?php include 'includes/js.php' ?>
</body>

<?php include 'includes/footer.php' ?>
