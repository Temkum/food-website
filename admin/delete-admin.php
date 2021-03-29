<?php

include '../core/config.php';

// get adm
$id = $_GET['id'];

$sql = "DELETE FROM `admin` WHERE id='{$id}'";

$result = mysqli_query($conn, $sql);

if (true == $result) {
    $_SESSION['delete'] = '<div class="alert alert-success" role="alert">
    Admin deleted successfully!
  </div>';

    header('Location: '.SITE_URL.'admin/manage-admin.php');
} else {
    $_SESSION['delete'] = '<div class="alert alert-danger" role="alert">
    Delete request failed! Try again later! </div>';
}
  header('Location: '.SITE_URL.'admin/manage-admin.php');
