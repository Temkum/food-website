<?php

include '../core/config.php';

// unset user and destroy session
session_destroy();

header('Location: '.SITE_URL.'admin/login.php');

exit;
