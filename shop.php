<?php 

include 'core/functions.php';
include 'includes/header.php';

$caption = include 'core/captions.php';


?>
<body>
	<?php include 'includes/navbar.php' ?>

	<div class="boxbox">
	    <h4><?php echo $caption['title'] ?></h4>
	    <img src="images/Bikes/Roadbike.jpg" width="500" height="350">
	    <p><?php echo $caption['description'] ?></p>
	</div>
    
	<div class="boxbox">
    	<div class="bikes">
			<?php foreach (getBikes($_GET['category']) as $bike) : ?>
				<?php include 'includes/product.php'; ?>
			<?php endforeach; ?>
		</div>
	</div>
    
	<?php include 'includes/js.php' ?>
</body>

<?php include 'includes/footer.php' ?>
