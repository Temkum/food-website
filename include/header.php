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
  <header>
    <nav>
      <div class="row">
        <img src="images/logo.png" alt="logo white" class="logo">
        <img src="" alt="logo black" class="logo-black">
        <ul class="main-nav js-main-nav">
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
    </nav>

    <div class="hero-text-box" id="hideText">
      <h1>Goodbye junk food <br>
        Hello super healthy meals</h1>
      <a class="hero-btn hero-btn-full js-scroll-to-plan" href="<?php echo SITE_URL; ?>order.php">Start eating well</a>
      <a class="hero-btn hero-btn-ghost js-scroll-to-start" href="<?php echo SITE_URL; ?>foods.php">I'm hungry</a>
    </div>

  </header>