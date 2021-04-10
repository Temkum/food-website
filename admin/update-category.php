<?php include 'inc/topbar.php'; ?>

<!-- MAIN SECTION -->
<div class="main-content">
  <div class="wrapper">

    <h2 class="mb-3">Update Category</h2>
    <br>

    <!-- display error -->
    <?php

    if (isset($_GET['id'])) {
      $id = $_GET['id'];

      $sql = "SELECT * FROM `category` WHERE id='{$id}' ";

      $result = mysqli_query($conn, $sql) or exit(mysqli_error($conn));

      // check query execution
      $count = mysqli_num_rows($result);

      if (1 == $count) {
        //get data available
        $row = mysqli_fetch_assoc($result);
        $title = $row['title'];
        $current_image = $row['image_title'];
        $featured = $row['featured'];
        $active = $row['active'];
      } else {
        $_SESSION['update_category'] = '<div class="alert alert-danger" role="alert">No category found!</div>';

        header('Location: ' . SITE_URL . 'admin/manage-category.php');
      }
    } else {
      header('Location: ' . SITE_URL . 'admin/manage-category.php');
    }
    ?>

    <!-- update category -->
    <form method="POST" action="" class="needs-validation mb-3" enctype="multipart/form-data" novalidate>

      <div class="input-group mb-3 width">
        <span for="validationCustom01" class="input-group-text" id="addon-wrapping">Title</span>
        <input type="text" name="title" class="form-control " value="<?php echo $title; ?>" id="validationCustom01" placeholder="Enter title" required>
      </div>

      <!-- display current img -->
      <div>
        <?php if ('' != $current_image) {
          // display img
        ?>
          <figure class="figure">
            <img src="<?php echo SITE_URL; ?>images/category/<?php echo $current_image; ?>" class="figure-img img-fluid rounded" width="300px" height="300px" alt="<?php echo $title; ?>">
            <figcaption class="figure-caption text-end">Current Image</figcaption>
          </figure>
        <?php
        } else {
          // fail msg
          echo '<div class="alert alert-warning width" role="alert">Image not added!</div>';
        }
        ?>
      </div>

      <div class="mb-4 mt-2">
        <input type="file" name="image" class="width" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
      </div>

      <div class="form-group">
        <label for="validationCustom01" class="form-label ">Featured: </label>
        <div class="form-check form-check-inline">
          <input <?php if ('Yes' == $featured) {
                    echo 'checked';
                  } ?> class="form-check-input" type="radio" id="inlineCheckbox1" value="Yes" name="featured" for="validationCustom01">
          <label class="form-check-label" for="inlineCheckbox2">Yes</label>
        </div>
        <div class="form-check form-check-inline mb-4">
          <input <?php if ('No' == $featured) {
                    echo 'checked';
                  } ?> class="form-check-input" type="radio" id="" value="No" name="featured">
          <label class="form-check-label" for="inlineCheckbox2">No</label>
        </div>
        <br>

        <label for="validationCustom01" class="form-label">Active: </label>
        <div class="form-check form-check-inline mx-3">
          <input <?php if ('Yes' == $active) {
                    echo 'checked';
                  } ?> class="form-check-input" type="radio" id="inlineCheckbox1" value="Yes" name="active">
          <label class="form-check-label" for="inlineCheckbox1">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input <?php if ('No' == $active) {
                    echo 'checked';
                  } ?> class="form-check-input" type="radio" id="inlineCheckbox2" value="No" name="active">
          <label class="form-check-label" for="inlineCheckbox2">No</label>
        </div>
      </div>
      <br>

      <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <button type="submit" name="submit" class="btn btn-primary">Update</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
      // get form values
      $id = $_POST['id'];
      $title = $_POST['title'];
      $current_image = $_POST['current_image'];
      $featured = $_POST['featured'];
      $active = $_POST['active'];

      // update new img if selected
      if (isset($_FILES['image']['name'])) {
        # get img details
        $image_name = $_FILES['image']['name'];

        // check if img is available
        if ($image_name != '') {
          # upload new img

          // auto rename image
          $extension = end(explode('.', $image_name));

          // rename img
          $image_name = "Food-Category" . rand(000, 999) . '.' . $extension;

          $source_path = $_FILES['image']['tmp_name'];
          $destination = '../images/category/' . $image_name;

          // upload img
          $upload = move_uploaded_file($source_path, $destination);

          // check if upload is OK
          if (false == $upload) {
            $_SESSION['img_upload'] = '<div class="alert alert-danger" role="alert">Image upload failed. Try again!</div>';

            header('Location: ' . SITE_URL . 'admin/manage-category.php');

            exit;
          }

          // remove current img
          if ($current_image != '') {
            $rm_path = '../images/category/' . $current_image;
            $remove_current_img = unlink($rm_path);

            // check if img is unset && if fail, exit execution
            if ($remove_current_img == false) {
              # code...
              $_SESSION['img_remove'] = '<div class="alert alert-danger" role="alert">Failed to remove current image!</div>';

              header('Location: ' . SITE_URL . 'admin/update-category.php');

              exit;
            }
          }
        } else {
          $image_name = $current_image;
        }
      } else {
        $image_name = $current_image;
      }

      // update database
      $sql_update = "UPDATE `category` SET title='$title', image_title= '$image_name', featured = '$featured', active = '$active' WHERE id = '$id' ";

      $result_update = mysqli_query($conn, $sql_update) or exit(mysqli_error($conn));

      // check if query executed or not
      if ($result_update == true) {
        # update category
        $_SESSION['update_category'] = '<div class="alert alert-success" role="alert">Category updated successfully!</div>';

        header('Location: ' . SITE_URL . 'admin/manage-category.php');

        exit;
      } else {
        $_SESSION['update_category'] = '<div class="alert alert-danger" role="alert">Failed to update category!</div>';

        header('Location: ' . SITE_URL . 'admin/update-category.php');
      }
    }
    ?>

    <!-- back btn -->
    <a class="text-center btn btn-outline-secondary my-4" href="<?php echo SITE_URL; ?>admin/manage-category.php" role="button">Back to Manage Categories</a>
  </div>

</div>


<?php include 'inc/footer.php';
