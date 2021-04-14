<?php include 'inc/topbar.php'; ?>

<div class="main-content p-0">
  <div class="wrapper">
    <!-- back btn -->
    <a class="text-center btn btn-outline-secondary btn-sm mb-5" href="<?php echo SITE_URL; ?>admin/manage-order.php" role="button">Back</a>

    <h2>Update Placed Orders</h2>
    <!-- display msgs -->
    <br>

    <?php
    if (isset($_GET['id'])) {
      // get order details
      $id = $_GET['id'];

      $sql = "SELECT * FROM order_table WHERE id='$id' ";

      $result = $conn->query($sql) or exit(mysqli_error($conn));

      $count = mysqli_num_rows($result);

      if ($count == 1) {
        # code...
        $row = mysqli_fetch_assoc($result);

        $id = $row['id'];
        $food = $row['food'];
        $price = $row['price'];
        $quantity = $row['qty'];
        $status = $row['status'];
        $customer_name = $row['customer_name'];
        $customer_phone = $row['customer_contact'];
        $customer_email = $row['customer_email'];
        $customer_address = $row['customer_address'];
      } else {
        # code...
      }
    } else {
      header('Location: ' . SITE_URL . 'admin/manage-order.php');
    }
    ?>

    <form action="" method="post" class="width">

      <div class="input-group input-group-sm mb-3">
        <span class="input-group-text" id="inputGroup-sizing-sm">Food Name</span>
        <input type="text" name="food" value="<?php echo $food; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" disabled>
      </div>

      <div class="input-group input-group-sm mb-3">
        <span class="input-group-text" id="inputGroup-sizing-sm">Quantity</span>
        <input type="number" name="qty" value="<?php echo $quantity; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
      </div>

      <div class="input-group input-group-sm mb-3">
        <span class="input-group-text" id="inputGroup-sizing-sm">Price</span>
        <input type="number" name="price" value="<?php echo $price; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" disabled>
      </div>

      <div class="input-group input-group-sm mb-3">
        <span class="input-group-text" id="inputGroup-sizing-sm">Status</span>
        <select class="form-select form-select-sm" aria-label=".form-select-sm example">
          <option <?php if ($status == 'Ordered') {
                    echo 'selected';
                  } ?> value="Ordered">Ordered</option>
          <option <?php if ($status == 'Processing') {
                    echo 'selected';
                  } ?> value="1">Processing</option>
          <option <?php if ($status == 'Delivered') {
                    echo 'selected';
                  } ?> value="2">Delivered</option>
          <option <?php if ($status == 'Cancelled') {
                    echo 'selected';
                  } ?> value="3">Cancelled</option>
        </select>
      </div>

      <div class="input-group input-group-sm mb-3">
        <span class="input-group-text" id="basic-addon1">Customer's Name</span>
        <input type="text" name="customer_name" value="<?php echo $customer_name; ?>" class="form-control" placeholder="Full name" aria-label="Name" aria-describedby="basic-addon1">
      </div>

      <div class="input-group input-group-sm mb-3">
        <span class="input-group-text" id="basic-addon1">Customer's Phone</span>
        <input type="text" name="customer_phone" value="<?php echo $customer_phone; ?>" class="form-control" placeholder="Enter phone number" aria-label="Phone" aria-describedby="basic-addon1">
      </div>

      <div class="input-group input-group-sm mb-3">
        <span class="input-group-text" id="basic-addon1">Customer's Email</span>
        <input type="email" name="customer_email" value="<?php echo $customer_email; ?>" class="form-control" placeholder="Enter email address" aria-label="Email" aria-describedby="basic-addon1">
      </div>

      <div class="input-group input-group-sm mb-3">
        <span class="input-group-text" id="basic-addon1">Customer's Address</span>
        <textarea type="text" name="customer_address" value="" class="form-control" placeholder="Enter home address" aria-label="Address" aria-describedby="basic-addon1"><?php echo $customer_address; ?></textarea>
      </div>

      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <input type="hidden" name="price" value="<?php echo $price; ?>">
      <button type="submit" name="submit" class="btn btn-primary mb-3">Update</button>
    </form>


  </div>
</div>

<?php include 'inc/footer.php';
