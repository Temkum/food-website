<?php include '../core/functions.php';

include '../core/config.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login | Signup Form</title>

  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="../css/login.css" />
</head>

<body>
  <div class="loginbox">
    <img src="../images/avatar.png" class="avatar">
    <h1>Login Here</h1>

    <!-- display error -->
    <?php
    if (isset($_SESSION['login'])) {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    }

    if (isset($_SESSION['access-control'])) {
        echo $_SESSION['access-control'];
        unset($_SESSION['access-control']);
    }

    ?>
    <form method="POST" action="">
      <p>Username</p>
      <input type="text" name="username" placeholder="Enter Username">
      <p>Password</p>
      <input type="password" name="password" placeholder="Enter Password">
      <input type="submit" name="submit" value="Login">
      <a href="#">Lost your password?</a><br>
      <a href="#">Don't have an account?</a>
    </form>

  </div>
</body>

</html>

<?php

if (isset($_POST['submit'])) {
    // get data input
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // query to read from db
    $sql = "SELECT * FROM `admin` WHERE username='{$username}' AND password='{$password}'";

    $result = $conn->query($sql) or exit(mysqli_error($conn));

    // check if user exist
    $count = mysqli_num_rows($result);

    if (1 == $count) {
        // code...
        $_SESSION['login'] = '<div class="alert alert-success" role="alert">Welcome back!</div>';
        // check if user is logged in
        $_SESSION['user'] = $username;

        header('Location: '.SITE_URL.'admin/index.php');

        exit;
    }
    // login fail
    $_SESSION['login'] = '<div class="alert alert-danger" role="alert">Username or Password did not match!</div>';

    header('Location: '.SITE_URL.'admin/login.php');
}
