<?php

// set constants
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'loveisall21');
define('DB_NAME', 'food_order');

 // Create connection
 $conn = new mysqli('localhost', 'root', 'loveisall21', 'food_order');

 // Check connection
 if ($conn->connect_error) {
     exit('Connection failed: '.$conn->connect_error);
 }
