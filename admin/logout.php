<?php

include '../core/config.php';

// destroy session and redirect to login page
session_destroy();

header('Location: '.SITE_URL.'admin/login.php');

exit;
