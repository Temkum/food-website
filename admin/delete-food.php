<?php

include '../core/config.php';

if (isset($_GET['id']) && isset($_GET['image_name'])) {
  // get id and img name
  $id = $_GET['id'];
  $image_name = $_GET['image_name'];

  // check if img is empty-> remove img if available
  if ($image_name != '') {
    # remove img from folder
    $path = '../images/food/' . $image_name;

    $remove = unlink($path);

    // check if img is removed or not
    if ($remove == false) {
      $_SESSION['upload'] = '<td class="alert alert-danger text-center"     role="alert">Unauthorized access!</td>';

      header('Location: ' . SITE_URL . 'admin/manage-food.php');

      exit; //prevent delete from db if img delete fails

    }
  }
  // delete food from db
  $sql = "DELETE FROM food WHERE id='$id' ";
  $result = mysqli_query($conn, $sql) or exit(mysqli_error($conn));

  if ($result == true) {
    # food deleted
    $_SESSION['delete'] = '<div class="alert alert-success text-center" role="alert">Food removed successfully!</div>';

    header('Location: ' . SITE_URL . 'admin/manage-food.php');
  } else {
    $_SESSION['delete'] = '<div class="alert alert-alert text-center" role="alert">Oops! Failed to delete food!</div>';
  }
} else {
  $_SESSION['auth'] = '<div class="alert alert-danger text-center" role="alert">Unauthorized access!</div>';

  header('Location: ' . SITE_URL . 'admin/manage-food.php');
}
