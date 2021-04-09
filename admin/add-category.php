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

    if (isset($_SESSION['upload'])) {
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
    }

    ?>

    <!-- add category -->
    <form method="POST" action="" class="needs-validation mb-3" enctype="multipart/form-data" novalidate>
      <div class="mb-3 ">
        <label for="validationCustom01" class="form-label">Title</label>
        <input type="text" name="title" class="form-control width" id="validationCustom01" placeholder="Enter title"
          required>
      </div>

      <div class="mb-4 mt-4">
        <input type="file" name="image" class=" width" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03"
          aria-label="Upload">
      </div>

      <div class="form-group">
        <label for="validationCustom01" class="form-label ">Featured: </label>
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

        // check if avatar is set
        /*  print_r($_FILES['image']);

         exit(); //break execution */

        if (isset($_FILES['image']['name'])) {
            // source path and destination path
            $image_name = $_FILES['image']['name'];

            // for category update->upload image only if selected
            if ('' != $image_name) {
                // auto rename image
                $extension = end(explode('.', $image_name));
                
                // rename img
                $image_name = 'Food-Category'.rand(000, 999).'.'.$extension;

                $source_path = $_FILES['image']['tmp_name'];
                $destination = '../images/category/'.$image_name;

                // upload img
                $upload = move_uploaded_file($source_path, $destination);

                // check if upload is OK
                if (false == $upload) {
                    $_SESSION['upload'] = '<div class="alert alert-danger" role="alert">Image upload failed. Try again!</div>';

                    header('Location: '.SITE_URL.'admin/add-category.php');

                    exit;
                }
            }
        } else {
            // upload fail and set img value = ''
            $image_name = '';
        }

        // insert to database
        $sql = "INSERT INTO `category` (title, image_title, featured, active) VALUES ('{$title}','{$image_name}', '{$featured}','{$active}') ";

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
