<?php include 'inc/topbar.php'; ?>

<?php
if (isset($_GET['id'])) {
  # get details
  $id = $_GET['id'];

  $read = "SELECT * FROM food WHERE id='$id' ";

  $results = mysqli_query($conn, $read) or exit(mysqli_error($conn));

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
}

?>

<!-- MAIN SECTION -->
<div class="main-content">
  <div class="wrapper">

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

      <!-- display current img -->
      <div>
        <?php if ($current_image != '') {
          // display img
        ?>
          <figure class="figure">
            <img src="<?php echo SITE_URL; ?>images/food/<?php echo $current_image; ?>" class="figure-img img-fluid rounded" width="300px" height="300px" alt="<?php echo $title; ?>">
            <figcaption class="figure-caption text-end">Current Image</figcaption>
          </figure>
        <?php
        } else {
          // fail msg
          echo '<div class="alert alert-warning width" role="alert">Image not added!</div>';
        }
        ?>
      </div>

      <div class="mb-4 mt-4 width-6">
        <input type="file" name="image" class="" id="inputGroupFile03 validationCustom04" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
        <div class="invalid-feedback">Please add a file!</div>
      </div>

      <div class="btn-group mb-3">
        <span class="input-group-text">Categories</span>
        <select name="category" id="" class="form-select form-select-sm ms-2">
          <?php
          $sql = "SELECT * FROM category WHERE active='Yes' ";
          $result = mysqli_query($conn, $sql) or exit(mysqli_error($conn));

          $count = mysqli_num_rows($result);
          if ($count > 0) {
            # display categories
            while ($row = mysqli_fetch_assoc($result)) {
              # code...
              $category_title = $row['title'];
              $category_id = $row['id'];

              // echo "<option value='$category_id'>$category_title</option>";
          ?>
              <option <?php if ($current_category == $category_id) {
                        echo 'selected';
                      } ?> value='<?php echo $category_id; ?>'><?php echo $category_title; ?></option>
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
          <input <?php
                  if ('Yes' == $featured) {
                    echo 'checked';
                  }
                  ?> class="form-check-input" type="radio" id="inlineCheckbox1" value="Yes" name="featured" required>
          <label class="form-check-label" for="inlineCheckbox1">Yes</label>
        </div>
        <div class="form-check form-check-inline mb-4">
          <input <?php if ('No' == $featured) {
                    echo 'checked';
                  } ?> class="form-check-input" type="radio" id="inlineCheckbox2" value="No" name="featured" required>
          <label class="form-check-label" for="inlineCheckbox2">No</label>
        </div>
        <br>

        <label for="validationCustom01" class="form-label">Active: </label>
        <div class="form-check form-check-inline mx-3">
          <input <?php if ('Yes' == $active) {
                    echo 'checked';
                  } ?> class="form-check-input" type="radio" id="inlineCheckbox1" value="Yes" name="active" required>
          <label class="form-check-label" for="inlineCheckbox1">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input <?php if ('No' == $active) {
                    echo 'checked';
                  } ?> class="form-check-input" type="radio" id="inlineCheckbox2" value="No" name="active" required>
          <label class="form-check-label" for="inlineCheckbox2">No</label>
        </div>
      </div>
      <br>

      <button type="submit" name="submit" class="btn btn-primary">Update</button>
    </form>

    <!-- back btn -->
    <a class="text-center btn btn-outline-secondary my-4 btn-sm" href="<?php echo SITE_URL; ?>admin/manage-food.php" role="button">Back to Manage Food</a>
  </div>
</div>

<?php include 'inc/footer.php';
