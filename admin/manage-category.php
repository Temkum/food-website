<?php include 'inc/topbar.php'; ?>
<!-- MAIN SECTION -->
<div class="main-content">
  <div class="wrapper">
    <h2 class="mb-4">Manage Categories</h2>

    <?php
        if (isset($_SESSION['category'])) {
            echo $_SESSION['category'];
            unset($_SESSION['category']);
        }

        if (isset($_SESSION['remove'])) {
            echo $_SESSION['remove'];
            unset($_SESSION['remove']);
        }

        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }

        if (isset($_SESSION['update_category'])) {
            echo $_SESSION['update_category'];
            unset($_SESSION['update_category']);
        }

        if (isset($_SESSION['img_upload'])) {
            echo $_SESSION['img_upload'];
            unset($_SESSION['img_upload']);
        }
        
        if (isset($_SESSION['img_remove'])) {
            echo $_SESSION['img_remove'];
            unset($_SESSION['img_remove']);
        }
    ?>

    <!-- add category -->
    <a class="btn btn-outline-primary mb-4"
      href="<?php echo SITE_URL; ?>admin/add-category.php"
      role="button">Add Category</a>

    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Image</th>
          <th scope="col">Featured</th>
          <th scope="col">Active</th>
          <th scope="col">Action</th>
        </tr>

        <?php // read from database
        $sql = 'SELECT * FROM category';

        $result = mysqli_query($conn, $sql) or exit(mysqli_error($conn));

        $count = mysqli_num_rows($result);

        // check if data is available
         $serial_num = 1;

    if ($count > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $title = $row['title'];
            $image_name = $row['image_title'];
            $featured = $row['featured'];
            $active = $row['active']; ?>

        <tr>
          <th><?php echo $serial_num++; ?>
          </th>
          <td><?php echo $title; ?>
          </td>

          <td>
            <?php if ('' != $image_name) {
                // display img?>
            <img
              src="<?php echo SITE_URL; ?>images/category/<?php echo $image_name; ?>"
              width="100px" height="100px"
              alt="<?php echo $image_name; ?>">
            <?php
            } else {
                // error msg
              echo '';
            } ?>
          </td>

          <td><?php echo $featured; ?>
          </td>
          <td><?php echo $active; ?>
          </td>
          <td>
            <a href="<?php echo SITE_URL; ?>admin/update-category.php?id=<?php echo $id; ?>"
              class="btn btn-info btn-sm mx-2">Modify</a>
            <a href="<?php echo SITE_URL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>"
              class="btn btn-danger btn-sm mx-3">Remove</a>
          </td>
        </tr>

        <?php
        }
    } else {
        // echo 'No data available!';
        echo '<div class="alert alert-info text-center width" role="alert" >No data available!</div>';
    }

?>
        </tbody>
    </table>

    <div class="clearfix"></div>
  </div>
</div>

<?php include 'inc/footer.php';
