<?php

include '../core/config.php';

// get adm
$id = $_GET['id'];

$sql = "DELETE FROM `admin` WHERE id='{$id}'";

$result = mysqli_query($conn, $sql);

if (true == $result) {
    $_SESSION['delete'] = 'Admin deleted!';

    header('Location: '.SITE_URL.'admin/manage-admin.php');
} else {
    $_SESSION['delete'] = 'Delete request failed! Try again later!';
}
  header('Location: '.SITE_URL.'admin/manage-admin.php');
