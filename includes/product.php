
<div class="bike">
	<div class="bike-image">
		<a href="#">
			<img src="<?php echo $bike['image'] ?>" alt="Preview image">
		</a>
	</div>

	<div class="bike-content">
		<b><a href="#0"><?php echo $bike['name'] ?></a></b>
		<em>&pound;<?php echo $bike['price'] ?></em>
	</div>

	<div class="bike-footer">  
		<button class="add-to-cart" onclick="Cart.add({  
			name: '<?php echo $bike['name'] ?>', 
			price: '<?php echo $bike['price'] ?>',  // inside the basket 
			image: '<?php echo $bike['image'] ?>'
		})">Add to Cart</button>
	</div>
</div>
			