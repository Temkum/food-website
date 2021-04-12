<?php include 'inc/topbar.php'; ?>

<?php
if (isset($_GET['id'])) {
  # get details
  $id = $_GET['id'];

  $read = "SELECT * FROM food WHERE id='$id' ";

  $results = $conn->query($read) or exit(mysqli_error($conn));

  // get value based on query
  $row2 = mysqli_fetch_assoc($results);

  // get values of selected food
  $title = $row2['title'];
  $description = $row2['description'];
  $price = $row2['price'];
  $current_image = $row2['image_name'];
  $current_category = $row2['category_id'];
  $featured = $row2['featured'];
  $active = $row2['active'];
} else {
  header('Location:' . SITE_URL . 'admin/manage-food.php');
  die();
}
?>

<div class="main-content p-0">
  <div class="wrapper">

    <a class="text-center btn btn-outline-secondary btn-sm mb-5" href="<?php echo SITE_URL; ?>admin/manage-food.php" role="button">Back</a>

    <h2 class="mb-3">Update Food</h2>
    <br>

    <form action="" method="POST" enctype="multipart/form-data" class="needs-validation mb-3" novalidate>

      <div class="input-group mb-3 width-6">
        <span class="input-group-text" id="basic-addon1">Title</span>
        <input type="text" name="title" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" placeholder="Add title" value="<?php echo $title; ?>" required>
      </div>

      <div class="input-group mb-3 width-6">
        <span class="input-group-text">Description</span>
        <textarea class="form-control" name="description" aria-label="With textarea" value="" required><?php echo $description; ?></textarea>
      </div>

      <div class="input-group mb-3 width-6">
        <span class="input-group-text">Price</span>
        <input type="number" name="price" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" value="<?php echo $price; ?>" required>
      </div>

      <div>
        <?php
        if ($current_image == '') {
          // img N/A
          echo '<div class="alert alert-warning width" role="alert">Image not added!</div>';
        } else {
          // fail msg
        ?>
          <figure class="figure">
            <img src="<?php echo SITE_URL; ?>images/food/<?php echo $current_image; ?>" class="figure-img img-fluid rounded" width="300px" height="300px" alt="<?php echo $title; ?>">
            <figcaption class="figure-caption text-end">Current Image</figcaption>
          </figure>
        <?php
        }
        ?>
      </div>

      <div class="mb-4 mt-2 width-6 btn-group">
        <label class="input-group-text">Select new image</label>
        <input type="file" name="image" class="ms-3 mt-1" id="inputGroupFile03 validationCustom04" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
        <div class="invalid-feedback">Please add a file!</div>
      </div> <br>

      <div class="btn-group mb-3">
        <span class="input-group-text">Categories</span>
        <select name="category" id="" class="form-select form-select-sm ms-2">

          <?php
          $sql = "SELECT * FROM category WHERE active='Yes' ";
          $result = $conn->query($sql) or exit(mysqli_error($conn));

          $count = mysqli_num_rows($result);
          if ($count > 0) {
            # display categories
            while ($row = mysqli_fetch_assoc($result)) {
              # code...
              $category_title = $row['title'];
              $category_id = $row['id'];
          ?>
              <option <?php if ($current_category == $category_id) {
                        echo 'selected';
                      }
                      ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?>
              </option>

          <?php
            }
          } else {
            # code...
            echo "<option value='0'>No categories found!</option>";
          }
          ?>
          <option value="0">Test</option>
        </select>
      </div>

      <div class="form-group">
        <label for="validationCustom01" class="form-label">Featured: </label>
        <div class="form-check form-check-inline mx-2">
          <input <?php if ('Yes' == $featured) {
                    echo 'checked';
                  }
                  ?> class="form-check-input" type="radio" id="inlineCheckbox1" value="Yes" name="featured" required>
          <label class="form-check-label" for="inlineCheckbox1">Yes</label>
        </div>
        <div class="form-check form-check-inline mb-4">
          <input <?php if ('No' == $featured) {
                    echo 'checked';
                  }
                  ?> class="form-check-input" type="radio" id="inlineCheckbox2" value="No" name="featured" required>
          <label class="form-check-label" for="inlineCheckbox2">No</label>
        </div>
        <br>
        <label for="validationCustom01" class="form-label">Active: </label>
        <div class="form-check form-check-inline mx-3">
          <input <?php if ('Yes' == $active) {
                    echo 'checked';
                  }
                  ?> class="form-check-input" type="radio" id="inlineCheckbox1" value="Yes" name="active" required>
          <label class="form-check-label" for="inlineCheckbox1">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input <?php if ('No' == $active) {
                    echo 'checked';
                  }
                  ?> class="form-check-input" type="radio" id="inlineCheckbox2" value="No" name="active" required>
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
      # get form details
      $id = $_POST['id'];
      $title = $_POST['title'];
      $description = $_POST['description'];
      $price = $_POST['price'];
      $current_image = $_POST['current_image'];
      $category = $_POST['category'];
      $featured = $_POST['featured'];
      $active = $_POST['active'];

      // upload img if selected
      #event listener
      if (isset($_POST['image']['name'])) {
        $img_name = $_FILES['image']['name'];

        if ($img_name != '') {
          # img is selected
          $extension = @end(explode(".", $img_name));

          // create new img name
          $img_name = 'Food-Name-' . rand(000, 999) . '.' . $extension;

          $source_path = $_FILES['image']['tmp_name'];
          $destination = '../images/food/' . $img_name;

          // upload img
          $upload = move_uploaded_file($source_path, $destination);

          // check if upload is OK
          if ($upload == false) {
            // img upload failed
            $_SESSION['upload'] = '<div class="alert alert-danger" role="alert">Image upload failed. Try again!</div>';

            header('Location: ' . SITE_URL . 'admin/manage-food.php');
            exit; //prevent insert into db if upload fails
          }

          // remove current img if new img is uploaded
          if ($current_image != '') {
            // remove img
            $remove_path = "../images/food/" . $current_image;
            $remove = unlink($remove_path);

            if ($remove == false) {
              # failed
              $_SESSION['remove_failed'] = '<div class="alert alert-danger" role="alert">Failed to remove image. Try again!</div>';

              header('Location:' . SITE_URL . 'admin/manage-food.php');
            }
          }
        } else {
          $img_name = $current_image;
        }
      } else {
        $img_name = $current_image; //default value
      }

      // update food and insert food in db
      $sql_insert = "INSERT INTO `food` (title, description, price, image_name, category_id, featured, active) VALUES ('$title', '$description', '$price', '$current_image', '$category', '$featured', '$active') ";

      $result2 = mysqli_query($conn, $sql_insert) or exit(mysqli_error($conn));

      // execute
      if ($result2 == true) {
        // insert successful
        $_SESSION['add-food'] = '<div class="alert alert-success width" role="alert">Food added successfully!</div>';

        header("Location: " . SITE_URL . "admin/manage-food.php");

        exit;
      } else {
        // failed
        $_SESSION['add-food'] = '<div class="alert alert-danger" role="alert">Oops! Something went wrong. Try again!</div>';

        header('Location: ' . SITE_URL . 'admin/manage-food.php');
      }
    }
    ?>
  </div>
</div>

<?php include 'inc/footer.php';
