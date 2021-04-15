<?php

include 'inc/topbar.php';
?>

<!-- MAIN SECTION -->
<div class="main-content p-1">
  <div class="wrapper mb-5">
    <h1>Dashboard</h1>

    <?php
    if (isset($_SESSION['login'])) {
      echo $_SESSION['login'];
      unset($_SESSION['login']);
    }
    ?>

    <div class="col-4 text-center">
      <?php
      $sql = "SELECT * FROM category";
      $result = $conn->query($sql);
      $count = mysqli_num_rows($result);
      ?>
      <h2><?php echo $count; ?></h2>
      Categories
    </div>

    <div class="col-4 text-center">
      <?php
      $sql2 = "SELECT * FROM food";
      $result2 = $conn->query($sql2);
      $count2 = mysqli_num_rows($result2);
      ?>
      <h2><?php echo $count2; ?></h2>
      Food
    </div>

    <div class="col-4 text-center">
      <?php
      $sql3 = "SELECT * FROM order_table";
      $result3 = $conn->query($sql3);
      $count3 = mysqli_num_rows($result3);
      ?>
      <h2><?php echo $count3; ?></h2>
      Total Orders
    </div>

    <div class="col-4 text-center">
      <?php
      // get total revenue

      // aggregate function in sql
      $sql4 = "SELECT SUM(total) AS Total FROM order_table WHERE status='Delivered' ";
      $result4 = $conn->query($sql4) or exit(mysqli_error($conn));

      // get value
      $row4 = mysqli_fetch_assoc($result4);

      // get total revenue
      $total_revenue = $row4['Total'];

      ?>
      <h2>$<?php echo $total_revenue; ?></h2>
      Revenue Generated
    </div>

    <div class="clearfix"></div>
  </div>
</div>

<?php include 'inc/footer.php';
