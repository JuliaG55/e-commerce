<?php include 'core/functions.php' ?>
<?php include 'includes/header.php' ?>

<body>
    <?php include 'includes/navbar.php' ?>
    
    <div class="boxbox">
        <h4>Login</h4>
    <form action="customerLogin.php" method = "post">
        Username: <input type="text" name="newuser" required>
        Password: <input type="password" name="newpas" required>
        <input type="submit">
    </form>
    </div>
        
    <div class="boxbox">
        <h4>Register new customer</h4>
    <form action="customerLogin.php" method = "post">
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

    $connection = new MongoClient(); //Connect to MongoDB
    $collection = $connection->eshop->Customer; //Slect a collection

    //Get name and address strings - need to filter input to reduce chances of SQL injection etc.
    $usermail= filter_input(INPUT_POST, 'usermail', FILTER_SANITIZE_STRING);
    $newpas = filter_input(INPUT_POST, 'newpas', FILTER_SANITIZE_STRING);    

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
    
    //Inform web page that login is successful
    echo 'ok';  
    
    //Close the connection
    $mongoClient->close();