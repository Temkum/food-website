<?php include 'inc/topbar.php'; ?>

<!-- MAIN SECTION -->
<div class="main-content">
  <div class="wrapper">
    <h2 class="mb-4">Manage Food</h2>
    <br>

    <?php
    if (isset($_SESSION['delete'])) {
      echo $_SESSION['delete'];
      unset($_SESSION['delete']);
    }

    if (isset($_SESSION['upload'])) {
      echo $_SESSION['upload'];
      unset($_SESSION['upload']);
    }

    if (isset($_SESSION['auth'])) {
      echo $_SESSION['auth'];
      unset($_SESSION['auth']);
    }

    if (isset($_SESSION['add-food'])) {
      echo $_SESSION['add-food'];
      unset($_SESSION['add-food']);
    }
    ?>

    <!-- add category -->
    <a class="btn btn-outline-primary mb-4" href="<?php echo SITE_URL; ?>admin/add-food.php" role="button">Add Food</a>

    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Price</th>
          <th scope="col">Image</th>
          <th scope="col">Featured</th>
          <th scope="col">Active</th>
          <th scope="col">Action</th>
        </tr>
      </thead>

      <tbody>
        <!-- display data to UI -->
        <?php
        $sql = "SELECT * FROM food";
        $result = mysqli_query($conn, $sql) or exit(mysqli_error($conn));

        $count = mysqli_num_rows($result);
        // serial number
        $sn = 1;

        if ($count > 0) {
          # display data from db
          while ($row = mysqli_fetch_assoc($result)) {
            # get values
            $id = $row['id'];
            $title = $row['title'];
            $price = $row['price'];
            $image_name = $row['image_name'];
            $featured = $row['featured'];
            $active = $row['active'];
        ?>
            <tr>
              <th scope="row"><?php echo $sn++; ?></th>
              <td><?php echo $title; ?></td>
              <td><?php echo $price; ?></td>
              <td><?php
                  // check if img exist
                  if ($image_name == '') {
                    # code...
                    echo 'No image added!';
                  } else {
                    # display img
                  ?>
                  <img src="<?php echo SITE_URL; ?>images/food/<?php echo $image_name; ?>" alt="<?php echo $title; ?>" width="200" height="100">
                <?php
                  }
                ?>
              </td>
              <td><?php echo $featured; ?></td>
              <td><?php echo $active; ?></td>
              <td>
                <a href="<?php echo SITE_URL; ?>admin/update-food.php?id=<?php echo $id; ?>" class="btn btn-info btn-sm mx-2">Update</a>
                <a href="<?php echo SITE_URL; ?>admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn btn-danger btn-sm mx-3">Remove</a>
              </td>
            </tr>
      </tbody>

  <?php
          }
        } else {
          # code...
          echo '<td class="alert alert-info text-center" role="alert" >No Food available!</td>';
        }
  ?>
    </table>
  </div>
</div>

<?php include 'inc/footer.php';
