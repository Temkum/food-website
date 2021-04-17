<?php
session_start();

ob_start();

// set your website title
define('WEBSITE_TITLE', 'OmniFood');

define('SITE_URL', '/wangis/');

// set db variables
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'loveisall21');
define('DB_NAME', 'food_order');

// protocol type http or https
define('PROTOCOL', 'http');

// Create connection
$conn = new mysqli(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    exit('Connection failed: ' . $conn->connect_error);
}
