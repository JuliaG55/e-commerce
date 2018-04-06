<?php
    //Start session management
    session_start();

    //Get name and address strings - need to filter input to reduce chances of SQL injection etc.
    $usermail= filter_input(INPUT_POST, 'usermail', FILTER_SANITIZE_STRING);
    $newpas = filter_input(INPUT_POST, 'newpas', FILTER_SANITIZE_STRING);    

    $connection = new MongoClient(); //Connect to MongoDB
    $collection = $connection->eshop->Customer; //Slect a collection

    //Create a PHP array with our search criteria
    $findCriteria = [
        "usermail" => $usermail, 
     ];

    //Find all of the customers that match  this criteria
    $cursor = $connection->eshop->Customer->find($findCriteria);

    //Check that there is exactly one customer
    if($cursor->count() == 0){
        echo 'Email not recognized.';
        return;
    }
    else if($cursor->count() > 1){
        echo 'Database error: Multiple customers have same email address.';
        return;
    }
   
    //Get customer
    $Customer = $cursor->getNext();
    
    //Check password
    if($Customer['newpas'] != $newpas){
        echo 'Password incorrect.';
        return;
    }
        
    //Start session for this user
    $_SESSION['usermail'] = $usermail;
    
    //Inform web page that login is successful
    echo 'ok';  
    
    //Close the connection
    $mongoClient->close();