<?php

 include '../core/config.php';

// check if id and image are set
if (isset($_GET['id']) and isset($_GET['image_name'])) {
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    // remove img file if available
    if ('' != $image_name) {
        // code...
        $path = '../images/category/'.$image_name;

        // use unlink method to remove img
        $remove = unlink($path);

        // if action fails then stop process
        if (false == $remove) {
            $_SESSION['remove'] = '<div class="alert alert-danger" role="alert">Remove request failed! Please try again!</div>';

            header('Location: '.SITE_URL.'admin/manage-category.php');

            exit;
        }
    }

    $sql = "DELETE FROM `category` WHERE id='{$id}' ";

    $result = mysqli_query($conn, $sql) or exit(mysqli_error($conn));

    if (true == $result) {
        $_SESSION['delete'] = '<div class="alert alert-success" role="alert">
      Category deleted successfully!</div>';

        header('Location: '.SITE_URL.'admin/manage-category.php');

        exit;
    } else {
        $_SESSION['delete'] = '<div class="alert alert-danger" role="alert">
      Request failed! Please try again!</div>';

        header('Location: '.SITE_URL.'admin/manage-category.php');
    }
} else {
    // redirect to category page
    header('Location: '.SITE_URL.'admin/manage-category.php');
}
