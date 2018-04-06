<?php

$collection = new mongoClient(); //Connect to MongoDB

$collection = $connection->eshop->Customer; //Slect a  database and collection

//Extract the data that was sent to the server
$text = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$text = filter_input (INPUT_POST, 'surname', FILTER_SANITIZE_STRING); 
$text = filter_input (INPUT_POST, 'newuser', FILTER_SANITIZE_STRING);
$email = filter_input (INPUT_POST, 'usermail', FILTER_SANITIZE_STRING);
$text = filter_input (INPUT_POST, 'address1', FILTER_SANITIZE_STRING); 
$text = filter_input (INPUT_POST, 'address2', FILTER_SANITIZE_STRING); 
$text = filter_input (INPUT_POST, 'town', FILTER_SANITIZE_STRING); 
$text = filter_input (INPUT_POST, 'postcode', FILTER_SANITIZE_STRING); 
$password = filter_input (INPUT_POST, 'newpas', FILTER_SANITIZE_STRING); 

//Construct PHP array with data
$customerData = [ 
	"name" => $text,
	"surname" => $text,
	"_newuser" => new MongoID($newuser),
	"usermail" => $email,
	"address1" => $text,
	"address2" => $text,
	"town" => $text,
	"postcode" => $text,
	"newpas" => $password
];

//Save the product in the database - it will overwrite the data for the product with this ID
$returnVal = $db->customers->save($customerData);

	if ($returnVal ['ok'] == 1) {  //Echo results back to the user
		echo 'ok';
	} else {
		echo 'Error saving customers';
	}
 
$connection->close(); //Close the connection