<?php include 'core/functions.php' ?>
<?php include 'includes/header.php' ?>

<body>
	<form action="findCustomer.php" method = "get">
		Customer name: <input type="text" name="name" required>
		<input type="submit">
	</form>

</body>

<?php include 'includes/footer.php' ?>


<?php

$collection = new mongoClient(); //Connect to MongoDB

$collection = $connection->eshop->Customer; //Slect a database and collection

//Exact the data that was sent to the server
$text = filter_input (INPUT_GET, 'name', FILTER_SANITIZE_STRING); 

//Create a PHP array with our search criteria
$findCriteria = [ 
	"name" => $text,
];

// Find all of customers that match this criteria
$cursor = $db->customers->find($findCriteria);

//Output the results
echo "<h1>Results</h1>";

foreach ($cursor as $cust) {
	echo "<p>";
	echo "Customer Name: " . $cust['name'];
	echo "Customer Surname: " . $cust['surname'];
	echo "Customer User ID: " . $cust['newuser'];
	echo "Customer Email: " . $cust['usermail'];
	echo "Customer Addres 1: " . $cust['address1'];
	echo "Customer Address 2: " . $cust['address2'];
	echo "Customer Town: " . $cust['name'];
	echo "Customer Postcode: " . $cust['postcode'];
	echo "Customer Password: " . $cust['password'];
	echo "</p>";
}
 
$connection->close(); //Close the connection