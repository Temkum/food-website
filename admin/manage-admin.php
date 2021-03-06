<?php include 'inc/topbar.php'; ?>

<!-- MAIN SECTION -->
<div class="main-content">
  <div class="wrapper">

    <!-- alert -->
    <?php if (isset($_SESSION['add'])) {
    echo $_SESSION['add'];
    unset($_SESSION['add']);
}

        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }

        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        if (isset($_SESSION['pwd_success'])) {
            echo $_SESSION['pwd_success'];
            unset($_SESSION['pwd_success']);
        }

?>

    <h2 class="mb-4">Manage Admin</h2>

    <!-- add admin -->
    <a class="btn btn-outline-primary mb-4" href="add-admin.php" role="button">Add Admin</a>

    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Full Name</th>
          <th scope="col">Username</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>

        <?php
    $sql = 'SELECT * FROM `admin`';
    $result = $conn->query($sql);

if (true == $result) {
    // count rows frm database
    $count = mysqli_num_rows($result);

    $serial_num = 1;

    if ($count > 0) {
        // output data of each row
        while ($rows = mysqli_fetch_assoc($result)) {
            $id = $rows['id'];
            $full_name = $rows['full_name'];
            $username = $rows['username']; ?>

        <tr>
          <th><?php echo $serial_num++; ?>
          </th>
          <td><?php echo $full_name; ?>
          </td>
          <td><?php echo $username; ?>
          </td>
          <td>
            <a href="<?php echo SITE_URL; ?>admin/update-admin.php?id=<?php echo $id; ?>"
              class="btn btn-info btn-sm mx-2">Update</a>
            <a href="<?php echo SITE_URL; ?>admin/pwd-change.php?id=<?php echo $id; ?>"
              class="btn btn-secondary btn-sm mx-2">Modify Password</a>
            <a href="<?php echo SITE_URL; ?>admin/delete-admin.php?id=<?php echo $id; ?>"
              class="btn btn-danger btn-sm mx-3">Remove</a>
          </td>
        </tr>

        <?php
        }
    } else {
        // echo 'No data available!';
        echo '<td>No data available!</td>';
    }
}
?>
      </tbody>
    </table>

    <div class="clearfix"></div>
  </div>
</div>

<?php include 'inc/footer.php';
