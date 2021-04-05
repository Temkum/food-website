<?php include '../core/config.php';

include 'access_control.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Food Order | Home</title>

  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
  <!-- menu -->
  <div class="menu text-center">
    <div class="wrapper">
      <ul class="nav nav-pills">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="manage-admin.php">Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="manage-category.php">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="manage-food.php">Food</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="manage-order.php">Order</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>