<?php include 'core/functions.php' ?>
<?php include 'includes/header.php' ?>

<body>
	<form action="deleteCustomer.php" method = "post">
		Customer ID: <input type="text" name="newuser" required>
		<input type="submit">
	</form>

</body>

<?php include 'includes/footer.php' ?>


<?php

$collection = new mongoClient(); //Connect to MongoDB

//Extract ID from POST data
$custID = filter_input (INPUT_POST, 'newuser', FILTER_SANITIZE_STRING); 

//Build PHP array with remove criteria
$remCriteria = [
	'_newuser' => new MongoId($custID)
];
//Delete the customer document
$returnVal = $db->customers->remove($remCriteria);

//Delete result back to user
if ($returnVal ['ok'] ==1) {
	echo 'Ok' . $returnVal['n'] . 'documents deleted. ';
} else {
	echo 'Error deleting product';
}