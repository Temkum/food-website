<?php include 'inc/topbar.php'; ?>

<div class="main-content p-0">
  <div class="wrapper">
    <!-- back btn -->
    <a class="text-center btn btn-outline-secondary btn-sm mb-5" href="<?php echo SITE_URL; ?>admin/manage-order.php" role="button">Back</a>

    <h2>Update Placed Orders</h2>
    <!-- display msgs -->
    <br>

    <?php
    if (isset($_SESSION[''])) {
      echo $_SESSION[''];
      unset($_SESSION['']);
    }
    ?>

    <form action="" method="post" class="width">

      <div class="input-group input-group-sm mb-3">
        <span class="input-group-text" id="inputGroup-sizing-sm">Food Name</span>
        <input type="text" name="" value="" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="" disabled>
        <label for=""></label>
      </div>

      <div class="input-group input-group-sm mb-3">
        <span class="input-group-text" id="inputGroup-sizing-sm">Quantity</span>
        <input type="number" name="qty" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
      </div>

      <div class="input-group input-group-sm mb-3">
        <span class="input-group-text" id="inputGroup-sizing-sm">Status</span>
        <select class="form-select form-select-sm" aria-label=".form-select-sm example">
          <option selected>Ordered</option>
          <option value="1">Processing</option>
          <option value="2">Delivered</option>
          <option value="3">Cancelled</option>
        </select>
      </div>

      <div class="input-group input-group-sm mb-3">
        <span class="input-group-text" id="basic-addon1">Customer's Name</span>
        <input type="text" name="customer_name" class="form-control" placeholder="Full name" aria-label="Name" aria-describedby="basic-addon1">
      </div>

      <div class="input-group input-group-sm mb-3">
        <span class="input-group-text" id="basic-addon1">Customer's Phone</span>
        <input type="text" name="customer_phone" class="form-control" placeholder="Enter phone number" aria-label="Phone" aria-describedby="basic-addon1">
      </div>

      <div class="input-group input-group-sm mb-3">
        <span class="input-group-text" id="basic-addon1">Customer's Email</span>
        <input type="email" name="customer_email" class="form-control" placeholder="Enter email address" aria-label="Email" aria-describedby="basic-addon1">
      </div>

      <div class="input-group input-group-sm mb-3">
        <span class="input-group-text" id="basic-addon1">Customer's Address</span>
        <textarea type="text" name="customer_address" class="form-control" placeholder="Enter home address" aria-label="Address" aria-describedby="basic-addon1"></textarea>
      </div>

      <button type="submit" name="submit" class="btn btn-primary mb-3">Update</button>
    </form>

  </div>
</div>

<?php include 'inc/footer.php';
