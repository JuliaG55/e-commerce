<?php

$collection = new mongoClient(); //Connect to MongoDB
$collection = $connection->eshop->bikes; //Slect a  database and collection

//Extract the Cars details 
$name= filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$type= filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
$colour = filter_input(INPUT_POST, 'colour', FILTER_SANITIZE_STRING);
$price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
$stock = filter_input(INPUT_POST, 'stock', FILTER_SANITIZE_STRING);
$image_url = filter_input(INPUT_POST, 'image_url', FILTER_SANITIZE_STRING);
$url = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_STRING);
$keywords = filter_input(INPUT_POST, 'keywords', FILTER_SANITIZE_STRING);

//Convert to PHP array
$dataArray = [
    "name" => $name, 
    "type" => $type, 
    "colour" => $colour, 
    "price" => $price, 
    "stock" => $stock,
    "image_url" => $image_url,
    "url" => $url,
    "keywords" => $keywords
    "_id" => new MongoId($id)
 ];

//Add the new product to the database
$returnVal = $collection->bikes->save($dataArray);