<?php include 'inc/topbar.php'; ?>

<!-- MAIN SECTION -->
<div class="main-content">
  <div class="wrapper">

    <h2 class="mb-4">Add Category</h2>
    <br>
    <!-- display error -->
    <?php
    if (isset($_SESSION['category'])) {
        echo $_SESSION['category'];
        unset($_SESSION['category']);
    }

    ?>

    <!-- add category -->
    <form method="POST" action="" class="needs-validation mb-3" novalidate>
      <div class="mb-3 ">
        <label for="validationCustom01" class="form-label">Title</label>
        <input type="text" name="title" class="form-control width" id="validationCustom01" placeholder="Enter title"
          required>
      </div>

      <div class="form-group">
        <label for="validationCustom01" class="form-label ">Featured: </label>
        <div class="form-check form-check-inline mx-2">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Yes" name="featured">
          <label class="form-check-label" for="inlineCheckbox1">Yes</label>
        </div>
        <div class="form-check form-check-inline mb-4">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="No" name="featured">
          <label class="form-check-label" for="inlineCheckbox2">No</label>
        </div>
        <br>

        <label for="validationCustom01" class="form-label">Active: </label>
        <div class="form-check form-check-inline mx-3">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Yes" name="active">
          <label class="form-check-label" for="inlineCheckbox1">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="No" name="active">
          <label class="form-check-label" for="inlineCheckbox2">No</label>
        </div>
      </div>
      <br>
      <button type="submit" name="submit" class="btn btn-primary">Add</button>
    </form>

    <?php
if (isset($_POST['submit'])) {
        // code...
        $title = $_POST['title'];

        if (isset($_POST['featured'])) {
            // get form value
            $featured = $_POST['featured'];
        } else {
            // set default value
            $featured = 'No';
        }

        if (isset($_POST['active'])) {
            $active = $_POST['active'];
        } else {
            $active = 'No';
        }

        // insert to database
        $sql = "INSERT INTO `category` (title, featured, active) VALUES ('{$title}','{$featured}','{$active}') ";

        $result = mysqli_query($conn, $sql) or exit(mysqli_error($conn));

        if (true == $result) {
            // execute
            $_SESSION['category'] = '<div class="alert alert-success" role="alert">Category added successfully!</div>';

            header('Location: '.SITE_URL.'admin/manage-category.php');

            exit;
        }
        // failed
        $_SESSION['category'] = '<div class="alert alert-danger" role="alert">Oops! Something went wrong. Try again!</div>';
    }

?>

    <a class="text-center btn btn-outline-secondary my-4"
      href="<?php echo SITE_URL; ?>admin/manage-category.php"
      role="button">Back to Manage Categories</a>
  </div>

</div>


<?php include 'inc/footer.php';
