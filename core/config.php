<?php

session_start();

// set your website title

define('WEBSITE_TITLE', 'Wangis Restaurant');

define('SITE_URL', '/wangis/');

// set db variables
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'loveisall21');
define('DB_NAME', 'food_order');

// protocol type http or https
define('PROTOCOL', 'http');

 // Create connection
 $conn = new mysqli('localhost', 'root', 'loveisall21', 'food_order');

 // Check connection
 if ($conn->connect_error) {
     exit('Connection failed: '.$conn->connect_error);
 }
