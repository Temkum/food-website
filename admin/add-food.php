<?php include 'inc/topbar.php'; ?>

<div class="main-content">
  <div class="wrapper">
    <h2>Add Food</h2>
    <br>

    <!-- display error -->
    <?php
    if (isset($_SESSION['upload'])) {
      echo $_SESSION['upload'];
      unset($_SESSION['upload']);
    }

    ?>

    <form action="" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>

      <div class="input-group mb-3 width-6">
        <span class="input-group-text" id="basic-addon1">Title</span>
        <input type="text" name="title" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" placeholder="Add title" required>
      </div>

      <div class="input-group mb-3 width-6">
        <span class="input-group-text">Description</span>
        <textarea class="form-control" name="description" aria-label="With textarea" required></textarea>
      </div>

      <div class="input-group mb-3 width-6">
        <span class="input-group-text">Price</span>
        <input type="number" name="price" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" required>
      </div>

      <div class="mb-4 mt-4 width-6">
        <input type="file" name="image" class="" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload" required>
      </div>

      <div class="btn-group mb-3">
        <span class="input-group-text">Categories</span>

        <select name="category" id="" class="form-select form-select-sm ms-4">
          <?php
          // create query to display data from database
          $sql = "SELECT * FROM category WHERE active='Yes'";

          $result = mysqli_query($conn, $sql) or exit(mysqli_error($conn));

          // check if categories exist
          $count = mysqli_num_rows($result);

          if ($count > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
              # get details of category
              $id = $row['id'];
              $title = $row['title'];
          ?>
              <option class="dropdown-item" value="<?php echo $id; ?>"><?php echo $title; ?>
              </option>

            <?php

            }
          } else {
            // no categories
            ?>
            <option value="0">No categories found!</option>
          <?php
          }

          // display on dropdown

          ?>
        </select>
        <!-- 
          <li><a class="dropdown-item" href="#">Pizza</a></li>
          <li><a class="dropdown-item" href="#">Snacks</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="#">Local Cuisine</a></li> -->
      </div>

      <div class="form-group">
        <label for="validationCustom01" class="form-label">Featured: </label>
        <div class="form-check form-check-inline mx-2">
          <input class="form-check-input" type="radio" id="inlineCheckbox1" value="Yes" name="featured">
          <label class="form-check-label" for="inlineCheckbox1">Yes</label>
        </div>
        <div class="form-check form-check-inline mb-4">
          <input class="form-check-input" type="radio" id="inlineCheckbox2" value="No" name="featured">
          <label class="form-check-label" for="inlineCheckbox2">No</label>
        </div>
        <br>

        <label for="validationCustom01" class="form-label">Active: </label>
        <div class="form-check form-check-inline mx-3">
          <input class="form-check-input" type="radio" id="inlineCheckbox1" value="Yes" name="active">
          <label class="form-check-label" for="inlineCheckbox1">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="inlineCheckbox2" value="No" name="active">
          <label class="form-check-label" for="inlineCheckbox2">No</label>
        </div>
      </div>
      <br>
      <button type="submit" name="submit" class="btn btn-primary">Add</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
      # add food to database

      // get form data
      $title = $_POST['title'];
      $description = $_POST['description'];
      $price = $_POST['price'];
      $category = $_POST['category'];

      // check radio btns
      if (isset($_POST['featured'])) {
        $featured = $_POST['featured'];
      } else {
        $featured = 'No';
      }

      if (isset($_POST['active'])) {
        $active = $_POST['active'];
      } else {
        $active = 'No';
      }

      // upload img if selected & upload only if img is selected
      if (isset($_FILES['image']['name'])) {
        $img_name = $_FILES['image']['name'];

        if ($img_name != '') {
          # img is selected
          $ext = end(explode('.', $img_name));

          // create new img name
          $img_name = 'Food-Name-' . rand(000, 999) . '.' . $ext;

          $source_path = $_FILES['image']['tmp_name'];
          $destination = '../images/food/' . $img_name;

          // upload img
          $upload = move_uploaded_file($source_path, $destination);

          // check if upload is OK
          if ($upload == false) {
            $_SESSION['upload'] = '<div class="alert alert-danger" role="alert">Image upload failed. Try again!</div>';

            header('Location: ' . SITE_URL . 'admin/add-food.php');

            exit; //prevent insert into db if upload fails
          }
        }
      } else {
        $img_name = ''; //default value
      }

      // insert to db
      $sql_insert = "INSERT INTO `food` (title, description, price, image_name, category_id, featured, active) VALUES ('$title', '$description', $price, '$img_name', $category, '$featured', '$active') ";

      $result2 = mysqli_query($conn, $sql_insert) or exit(mysqli_error($conn));

      // execute
      if ($result2 == true) {
        $_SESSION['add-food'] = '<div class="alert alert-success width" role="alert">Food added successfully!</div>';

        header('Location: ' . SITE_URL . 'admin/manage-food.php');

        exit;
      } else {
        // failed
        $_SESSION['add-food'] = '<div class="alert alert-danger" role="alert">Oops! Something went wrong. Try again!</div>';

        header('Location: ' . SITE_URL . 'admin/add-food.php');
      }
    }
    ?>

    <!-- back btn -->
    <a class="text-center btn-sm btn btn-outline-secondary my-5" href="<?php echo SITE_URL; ?>admin/manage-food.php" role="button">Back to Manage Food</a>
  </div>


</div>
</div>



<?php include 'inc/footer.php';
