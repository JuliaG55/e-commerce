<?php include 'core/functions.php' ?>
<?php include 'includes/header.php' ?>

<body>
   <!--HTML comes here -->

</body>

<?php include 'includes/footer.php' ?>


<?php
$collection = new mongoClient(); //Connect to MongoDB

$collection = $connection->eshop->bikes; //Slect a  database and collection


//php comes here