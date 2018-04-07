<?php include 'core/functions.php' ?>
<?php include 'includes/header.php' ?>

<body>
	<?php include 'includes/navbar.php' ?>

	<div class="boxbox">
	    <h4>Search for: <?php echo $_GET['search']; ?></h4>
	</div>

	<div class="boxbox">
    	<div class="bikes">
			<?php foreach (searchBikes($_GET['search']) as $bike) : ?>
				<?php include 'includes/product.php'; ?>
			<?php endforeach; ?>
		</div>
	</div>

	<?php include 'includes/js.php' ?>
</body>

<?php include 'includes/footer.php' ?>
