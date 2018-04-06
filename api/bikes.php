<?php

$connection = new MongoClient(); //Conect to mongoDB client
$collection = $connection->eshop->bikes;

$bikes = [];

$filters = [];

if (isset($_GET['category'])) {
	$filters['category'] = $_GET['category'];
}

foreach ($collection->find($filters) as $bike) {
	$bikes[] = (array) $bike;
}

echo json_encode($bikes);