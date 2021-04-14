<?php include 'inc/topbar.php'; ?>

<div class="main-content p-0">
  <div class="wrapper">
    <!-- back btn -->
    <a class="text-center btn btn-outline-secondary btn-sm mb-5" href="<?php echo SITE_URL; ?>admin/manage-order.php" role="button">Back</a>

    <!-- display message -->
    <?php
    if (isset($_SESSION['update'])) {
      echo $_SESSION['update'];
      unset($_SESSION['update']);
    }
    ?>

    <h2>Update Placed Orders</h2>
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
        header('location:' . SITE_URL . 'admin/manage-order.php');
      }
    } else {
      header('Location:' . SITE_URL . 'admin/manage-order.php');
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
        <select class="form-select form-select-sm" name="status" aria-label=".form-select-sm example">
          <option <?php if ($status == 'Ordered') {
                    echo 'selected';
                  } ?> value="Ordered">Ordered</option>

          <option <?php if ($status == 'Processing') {
                    echo 'selected';
                  } ?> value="Processing">Processing</option>

          <option <?php if ($status == 'Delivered') {
                    echo 'selected';
                  } ?> value="Delivered">Delivered</option>

          <option <?php if ($status == 'Cancelled') {
                    echo 'selected';
                  } ?> value="Cancelled">Cancelled</option>
        </select>
      </div>

      <div class="input-group input-group-sm mb-3">
        <span class="input-group-text" id="basic-addon1">Customer's Name</span>
        <input type="text" name="customer_name" value="<?php echo $customer_name; ?>" class="form-control" placeholder="Full name" aria-label="Name" aria-describedby="basic-addon1">
      </div>

      <div class="input-group input-group-sm mb-3">
        <span class="input-group-text" id="basic-addon1">Customer's Phone</span>
        <input type="text" name="customer_contact" value="<?php echo $customer_phone; ?>" class="form-control" placeholder="Enter phone number" aria-label="Phone" aria-describedby="basic-addon1">
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

    <?php
    // check submit click event
    if (isset($_POST['submit'])) {
      # get form values
      $id = $_POST['id'];
      $price = $_POST['price'];
      $quantity = $_POST['qty'];

      $total = $price * $quantity;

      $status = $_POST['status'];

      $customer_name = $_POST['customer_name'];
      $customer_phone = $_POST['customer_contact'];
      $customer_email = $_POST['customer_email'];
      $customer_address = $_POST['customer_address'];

      // update values
      $sql_update = "UPDATE order_table SET qty='$quantity', price='$price', total='$total', status='$status', customer_name='$customer_name', customer_contact='$customer_phone', customer_email='$customer_email', customer_address='$customer_address' WHERE id='$id' ";

      $result2 = $conn->query($sql_update) or exit(mysqli_error($conn));

      // verify update
      if ($result2 == true) {
        # code...
        $_SESSION['update'] = '<div class="alert alert-success" role="alert">Order updated successfully!</div>';

        header('Location:' . SITE_URL . 'admin/manage-order.php');
        exit;
      } else {
        $_SESSION['update'] = '<div class="alert alert-danger" role="alert">Failed to update order!</div>';

        header('Location:' . SITE_URL . 'admin/update-order.php');
      }
    }
    ?>
  </div>
</div>

<?php include 'inc/footer.php';
