<?php include 'inc/topbar.php'; ?>

<div class="main-content">
  <div class="wrapper">

    <!-- alerts -->
    <?php
      if (isset($_SESSION['pwd_change'])) {
          echo $_SESSION['pwd_change'];
          unset($_SESSION['pwd_change']);
      }?>

    <h2 class="mb-4">Change Password</h2>

    <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
    ?>

    <form class="row g-2" method="POST" action="">
      <div class="row g-3 align-items-center">
        <div class="col-auto">
          <label for="inputPassword6" class="col-form-label">Old password</label>
        </div>
        <div class="col-auto mx-4">
          <input type="password" name="old_pwd" id="" class="form-control" aria-describedby="passwordHelpInline"
            placeholder="Old password">
        </div>
      </div>

      <div class="row g-3 align-items-center">
        <div class="col-auto">
          <label for="" class="col-form-label">New password</label>
        </div>
        <div class="col-auto mx-3">
          <input type="password" name="new_pwd" id="" class="form-control" placeholder="New password">
        </div>

        <div class="col-auto">
          <span id="passwordHelpInline" class="form-text">
            Must be at least 6 characters long.
          </span>
        </div>
      </div>

      <div class="row g-3 align-items-center mb-3">
        <div class="col-auto">
          <label for="inputPassword6" class="col-form-label">Repeat password</label>
        </div>
        <div class="col-auto">
          <input type="password" name="confirm_pwd" id="" class="form-control" placeholder="Repeat password">
        </div>
      </div>

      <div class="col-auto">
        <input type="hidden" name="id" value="<?php echo $di; ?>">
        <button type="submit" name="submit" class="btn btn-primary mb-3">Reset Password</button>
      </div>
    </form>
  </div>
</div>

<?php
if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $old_pwd = md5($_POST['old_pwd']);
        $new_pwd = md5($_POST['new_pwd']);
        $confirm_pwd = md5($_POST['confirm_pwd']);

        $sql = "SELECT * FROM `admin` WHERE id='{$id}' AND password='{$old_pwd}'";

        $result = mysqli_query($conn, $sql);

        if (true == $result) {
            $count = mysqli_num_rows($result);

            if (1 == $count) {
                // update password
                if ($new_pwd == $confirm_pwd) {
                    $sql_update = "UPDATE `admin` SET password='{$new_pwd}' WHERE id='{$id}'";

                    $result_update = mysqli_query($conn, $sql_update);

                    if (true == $result_update) {
                        // code...
                        $_SESSION['pwd_change'] = '<div class="alert alert-success" role="alert">Password updated successfully!</div>';

                        header('Location: '.SITE_URL.'admin/manage-admin.php');
                    }

                    $_SESSION['pwd_change'] = '<div class="alert alert-danger" role="alert"> Passwords do not match!</div>';

                    header('Location: '.SITE_URL.'admin/pwd-change.php');
                }
            }
            $_SESSION['pwd_change'] = '<div class="alert alert-danger" role="alert">User not found!</div>';

            header('Location: '.SITE_URL.'admin/add-admin.php');
        }
    }
?>

<?php include 'inc/footer.php';
