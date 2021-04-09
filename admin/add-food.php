<?php include 'inc/topbar.php'; ?>

<div class="main-content">
  <div class="wrapper">
    <h2>Add Food</h2>
    <br>

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
        <input type="file" name="image" class="form-control" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload" required>
      </div>

      <div class="input-group mb-3 width-6">
        <button type="button" class="btn btn-outline-secondary">Category</button>
        <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
          <span class="visually-hidden">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Burger</a></li>
          <li><a class="dropdown-item" href="#">Pizza</a></li>
          <li><a class="dropdown-item" href="#">Snacks</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="#">Local Cuisine</a></li>
        </ul>
        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" required>
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

    <!-- back btn -->
    <a class="text-center btn btn-outline-secondary my-5" href="<?php echo SITE_URL; ?>admin/manage-category.php" role="button">Back to Manage Food</a>
  </div>


</div>
</div>



<?php include 'inc/footer.php';
