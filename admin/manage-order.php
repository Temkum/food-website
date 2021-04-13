<?php include 'inc/topbar.php'; ?>

<!-- MAIN SECTION -->
<div class="main-content">
  <div class="wrapper">
    <h2 class="mb-4">Manage Orders</h2>

    <!-- add category -->
    <a class="btn btn-outline-primary mb-4" href="#" role="button">Add Order</a>

    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Food</th>
          <th scope="col">Price</th>
          <th scope="col">Quantity</th>
          <th scope="col">Total</th>
          <th scope="col">Date ordered</th>
          <th scope="col">Status</th>
          <th scope="col">Customer name</th>
          <th scope="col">Customer contact</th>
          <th scope="col">Customer email</th>
          <th scope="col">Customer address</th>
          <th scope="col">Action</th>
        </tr>
      </thead>

      <tbody>
        <!-- display to admin UI -->
        <?php
        // get orders from db
        $sql = "SELECT * FROM order_table ORDER BY id DESC"; //display latest orders first

        $result = $conn->query($sql) or exit(mysqli_error($conn));

        $count = mysqli_num_rows($result);

        $sn = 1; //create initial serial number

        if ($count > 0) {
          # code...
          while ($row = mysqli_fetch_assoc($result)) {
            // get order details
            $id = $row['id'];
            $food = $row['food'];
            $price = $row['price'];
            $quantity = $row['qty'];
            $total = $row['total'];
            $order_date = $row['order_date'];
            $status = $row['status'];
            $customer_name = $row['customer_name'];
            $customer_contact = $row['customer_contact'];
            $customer_email = $row['customer_email'];
            $customer_address = $row['customer_address'];
        ?>
            <tr>
              <th scope="row"><?php echo $sn++; ?></th>
              <td><?php echo $food; ?></td>
              <td><?php echo $price; ?></td>
              <td><?php echo $quantity; ?></td>
              <td><?php echo $total; ?></td>
              <td><?php echo $order_date; ?></td>
              <td><?php echo $status; ?></td>
              <td><?php echo $customer_name; ?></td>
              <td><?php echo $customer_contact; ?></td>
              <td><?php echo $customer_email; ?></td>
              <td><?php echo $customer_address; ?></td>
              <td>
                <a href="" class="btn btn-info btn-sm mx-2">Update order</a>
              </td>
            </tr>
        <?php
          }
        } else {
          # no orders
          echo '<td class="alert alert-info text-center" role="alert" >No placed order!</td>';
        }
        ?>

      </tbody>
    </table>

    <div class="clearfix"></div>
  </div>
</div>
<?php include 'inc/footer.php';
