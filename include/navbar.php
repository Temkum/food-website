<?php include 'core/config.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <!-- Important to make website responsive -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Restaurant is a premium food delivery service with the mission to bring affordable meals to as many people as possible.">

  <title>Restaurant Website</title>

  <link rel="stylesheet" type="text/css" href="css/normalize.css">
  <link rel="stylesheet" type="text/css" href="css/grid.css">
  <link rel="stylesheet" type="text/css" href="css/animate.css">
  <link rel="stylesheet" type="text/css" href="css/ionicons.min.css">
  <link rel="stylesheet" type="text/css" href="css/queries.css">

  <!-- custom css -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <!-- NAVBAR -->
  <section class="navbar">
    <div class="container">
      <div class="logo">
        <a href="#" title="Logo">
          <img src="images/logo.png" alt="Restaurant Logo" class="img-responsive">
        </a>
      </div>

      <div class="menu text-right">
        <ul>
          <li>
            <a href="<?php echo SITE_URL; ?>">Home</a>
          </li>
          <li>
            <a href="<?php echo SITE_URL; ?>categories.php">Categories</a>
          </li>
          <li>
            <a href="<?php echo SITE_URL; ?>foods.php">Menu</a>
          </li>
          <li>
            <a href="<?php echo SITE_URL; ?>contact.php">Contact</a>
          </li>
        </ul>
        <a href="#" class="mobile-nav js-mobile-nav" <i class="ion-navicon-round"></i></a>
      </div>

      <div class="clearfix"></div>
    </div>
  </section>