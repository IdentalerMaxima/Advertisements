<?php
include 'rabit\Model\model.php';

// When controller loads connect to DB
$connection = connectDB();

// Testing functions
// addPeldaPeter($connection);
// testPeldaPeter($connection);

// Load View at the end!
include 'rabit\View\index.php';

?>