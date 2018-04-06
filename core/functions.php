<?php

// foreach ($bikes as $bike) {
// 	$collection->insert($bike);
// }

 
function getBikes($category) // Returns bikes for a given category.
{
	$connection = new MongoClient(); //Connect to MongoDB
	$collection = $connection->eshop->bikes; //Slect a collection
	return $collection->find(['category' => $category]);


	$connection->close(); //Close the connection
	
}

function searchBikes($pattern)
{
	// connect to db, use the pattern provided and return all matched bikes 

	$connection = new MongoClient(); //Connect to MongoDB
	$collection = $connection->eshop->bikes; //Slect a collection
	return $collection->find(['name' => $pattern]);


}