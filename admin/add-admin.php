<?php include 'inc/topbar.php';
?>
<div class="main-content">
  <div class="wrapper">
    <!-- alert -->
    <?php if (isset($_SESSION['fail'])) {
    echo $_SESSION['fail'];
    unset($_SESSION['fail']);
}
    if (isset($_SESSION['user_not_found'])) {
        echo $_SESSION['user_not_found'];
        unset($_SESSION['user_not_found']);
    }

?>

    <h2 class="mb-4">Add Admin</h2>
    <br>

    <form action="" method="post">
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Full name</span>
        <input type="text" class="form-control" placeholder="Enter your name" aria-label="Name"
          aria-describedby="basic-addon1" name="full_name">
      </div>

      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Username</span>
        <input type="text" class="form-control" placeholder="Username" aria-label="Username"
          aria-describedby="basic-addon1" name="username">
      </div>

      <div class="mb-3 input-group">
        <span class="input-group-text" id="basic-addon1">Password</span>
        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Enter password">
      </div>


      <div class="col-auto">
        <button type="submit" name="submit" class="btn btn-primary mb-3">Register</button>
      </div>
    </form>
    <div class="clearfix"></div>
  </div>
</div>
<?php include 'inc/footer.php';

// check if form is submitted

// check if btn submit btn is clicked
if (isset($_POST['submit'])) {
    // get data from form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    // $created_at = date();

    // insert to db
    $sql = "INSERT INTO `admin` SET full_name='{$full_name}', username='{$username}', password='{$password}' ";

    $result = mysqli_query($conn, $sql) or exit(mysqli_error($conn));

    if (true == $result) {
        $_SESSION['add'] = '<div class="alert alert-success" role="alert">
        Admin added successfully!
      </div>';

        // redirect
        header('Location: manage-admin.php');

        exit;
    }
    $_SESSION['fail'] = '<div class="alert alert-danger" role="alert">
    Failed to add Admin!
  </div>';

    // redirect
    header('Location: add-admin.php');
}
