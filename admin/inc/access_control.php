<?php
// check if user is logged in
if (!isset($_SESSION['user'])) {
    // if user is not logged in
    $_SESSION['access-control'] = '<div class="alert alert-danger" role="alert">Please login to access Admin Panel!</div>';

    header('Location: ' . SITE_URL . 'admin/login.php');
}
