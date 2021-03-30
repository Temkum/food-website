<?php include 'inc/topbar.php'; ?>

<div class="main-content">
  <div class="wrapper">
    <h2 class="mb-4">Update Admin</h2>
    <br>

    <?php
      $id = $_GET['id'];

      $sql = "SELECT * FROM `admin` WHERE id='{$id}'";

      $result = mysqli_query($conn, $sql);

      // check query execution

      if (true == $result) {
          // check if data is available
          $count = mysqli_num_rows($result);

          if ($count > 0) {
              // code...
              $row = mysqli_fetch_assoc($result);
              $full_name = $row['full_name'];
              $username = $row['username'];
          } else {
              header('Location: '.SITE_URL.'admin/manage-admin.php');
          }
      }
        // code...

    ?>

    <form action="" method="post" class="">
      <div class="row">
        <div class="input-group mb-3 col-md-6">
          <span class="input-group-text" id="basic-addon1">Full name</span>
          <input type="text" class="form-control" placeholder="Enter your name" aria-label="Name"
            aria-describedby="basic-addon1" name="full_name"
            value="<?php echo $full_name; ?>">
        </div>

        <div class="input-group mb-3 col-md-6">
          <span class="input-group-text" id="basic-addon1">Username</span>
          <input type="text" class="form-control" placeholder="Username" aria-label="Username"
            aria-describedby="basic-addon1" name="username"
            value="<?php echo $username; ?>">
        </div>

        <div class="col-auto">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <button type="submit" name="submit" class="btn btn-primary mb-3">Update</button>
        </div>
      </div>
    </form>
  </div>
</div>

<?php
if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

        $sql = "UPDATE admin SET full_name='{$full_name}', username='{$username}' WHERE id='{$id}' ";

        $result = mysqli_query($conn, $sql);

        if (true == $result) {
            $_SESSION['update'] = '<div class="alert alert-success" role="alert">
        Admin updated successfully!
      </div>';

            // redirect
            header('Location: manage-admin.php');
        }
        $_SESSION['fail'] = '<div class="alert alert-danger" role="alert">
          Failed to update Admin. Try again later!
        </div>';

        header('Location: update-admin.php');
    }
?>

<?php include 'inc/footer.php';
