<?php include 'core/functions.php' ?>
<?php include 'includes/header.php' ?>

<body>
    <?php include 'includes/navbar.php' ?>
    
    <div class="boxbox">
        <h4>Login</h4>
	<form action="customerCollection/findCustomerIndexedSearch.php" method = "post">
		Username: <input type="text" name="newuser" required>
		Password: <input type="password" name="newpas" required>
		<input type="submit">
	</form>
    </div>
        
    <div class="boxbox">
        <h4>Register new customer</h4>
	<form action="customerCollection/addCustomer.php" method = "post">
		Name: <input type="name" name="name" required>
		Surname: <input type="surname" name="surname" required>
		Username: <input type="tnewuser" name="newuser" required>
		Email address: <input type="usermail" name="usermail" required>
		Address 1: <input type="address1" name="address1" required>
		Address 2: <input type="address2" name="address2" required>
		Town: <input type="town" name="town" required>
		Postcode: <input type="postcode" name="postcode" required>
		Password: <input type="newpas" name="newpas" required>
		<input type="submit">
	</form>
    </div>
    

    <?php include 'includes/js.php' ?>
</body>

<?php include 'includes/footer.php' ?>


<?php

$mongoClient = new MongoClient(); //Connect to MongoDB
$collection = $connection->eshop->Customer; //Slect a collection

//Exact the data that was sent to the server
$name = filter_input (INPUT_POST, 'name', FILTER_SANITIZE_STRING); 
$surname = filter_input (INPUT_POST, 'surname', FILTER_SANITIZE_STRING); 
$newuser = filter_input (INPUT_POST, 'newuser', FILTER_SANITIZE_STRING);
$usermail = filter_input (INPUT_POST, 'usermail', FILTER_SANITIZE_STRING);
$address1 = filter_input (INPUT_POST, 'address1', FILTER_SANITIZE_STRING); 
$address2 = filter_input (INPUT_POST, 'address2', FILTER_SANITIZE_STRING); 
$town = filter_input (INPUT_POST, 'town', FILTER_SANITIZE_STRING); 
$postcode = filter_input (INPUT_POST, 'postcode', FILTER_SANITIZE_STRING); 
$newpas = filter_input (INPUT_POST, 'newpas', FILTER_SANITIZE_STRING); 

//Convert to PHP array
$dataArray = [ 
	"name" => $name,
	"surname" => $surname,
	"newuser" => $newuser,
	"usermail" => $usermail,
	"address1" => $address1,
	"address2" => $address2,
	"town" => $town,
	"postcode" => $postcode,
	"newpas" => $newpas
];

//Add the new product to the database
$returnVal = $collection->insert($dataArray);

	if ($returnVal ['ok']==1) {  //Echo results back to the user
		echo 'User has been registered' ;
	} 
    else {
		echo 'Error! user could not be registered';
	};
 
$mongoClient->close(); //Close the connection