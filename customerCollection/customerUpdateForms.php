<?php include 'core/functions.php' ?>
<?php include 'includes/header.php' ?>

<body>
	<form action="customerUpdateForms.php" method = "post">
		Search criteria: <input type="name" name="search" required><br>
		<input type="submit">
	</form>

    <?php include 'includes/js.php' ?>
</body>

<?php include 'includes/footer.php' ?>


<?php
$collection = new mongoClient(); //Connect to MongoDB

$collection = $connection->eshop->Customer; //Slect a  database and collection

//Extract the data that was sent to the server
$search_string = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_STRING);

//Create a PHP array with our search criteria
$findCriteria = [
	'$text' => [ '$search' => $search_string ]
];

//Find all of the customers that match this criteria
$cursor = $db->customers->find($findCriteria);

//Output the results as forms
echo "<h1>Customers</h1>";

foreach ($cursor as $cust) {
	echo '<form action="saveCustomer.php" method="post">';
	echo 'Customer Name: <input type="text" name="name" value="' . $cust['name'] . '" required><br>';
	echo 'Customer Surname: <input type="text" name="surname" value="' . $cust['surname'] . '" required><br>';
	echo 'Customer User ID: <input type="text" name="newuser" value="' . $cust['newuser'] . '" required><br>';
	echo 'Customer Email: <input type="email" name="usermail" value="' . $cust['usermail'] . '" required><br>';
	echo 'Customer Addres 1: <input type="text" name="address1" value="' . $cust['address1'] . '" required><br>';
	echo 'Customer Addres 2: <input type="text" name="address2" value="' . $cust['address2'] . '" required><br>';
	echo 'Customer Town: <input type="text" name="town" value="' . $cust['town'] . '" required><br>';
	echo 'Customer Postcode: <input type="text" name="postcode" value="' . $cust['postcode'] . '" required><br>';
	echo 'Customer Password: <input type="password" name="password" value="' . $cust['password'] . '" required><br>';
	echo '<input type="hidden" name="id" value="' . $cust['_newuser'] . '" required';
	echo '<input type="submit">';
	echo '</form><br>';
}
 
$connection->close(); //Close the connection