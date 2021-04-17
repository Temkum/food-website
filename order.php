<?php include 'include/navbar.php'; ?>

<?php
// check id
if (isset($_GET['food_id'])) {
    # get food details
    $food_id = $_GET['food_id'];

    $sql = "SELECT * FROM food WHERE id='$food_id' ";

    $result = $conn->query($sql) or exit(mysqli_error($conn));

    $count = mysqli_num_rows($result);

    if ($count == 1) {
        # get data from db
        $row = mysqli_fetch_assoc($result);

        $title = $row['title'];
        $price = $row['price'];
        $image_name = $row['image_name'];
    } else {
        # food N/A
        header('Location: ' . SITE_URL);
    }
} else {
    # code...
    header('Location: ' . SITE_URL);
}

?>

<!-- ORDER FOOD -->
<section class="food-search">
    <div class="container">

        <h2 class="text-center text-white">Fill this form to place your order.</h2>

        <form action="" class="order" method="POST">
            <fieldset>
                <legend>Selected Food</legend>

                <div class="food-menu-img">
                    <?php
                    if ($image_name == '') {
                        # code...
                        echo '<div class="alert alert-warning" role="alert">Image not available!</div>';
                    } else {
                    ?>
                        <img src="<?php echo SITE_URL; ?>images/food/<?php echo $image_name; ?>" alt="<?php echo $title; ?>" class="img-responsive img-curve">
                    <?php
                        # code...
                    }

                    ?>

                </div>

                <div class="food-menu-desc">
                    <h3><?php echo $title; ?></h3>
                    <input type="hidden" name="food" value="<?php echo $title; ?>">

                    <p class="food-price">$<?php echo $price; ?></p>
                    <input type="hidden" name="price" value="<?php echo $price; ?>">

                    <div class="order-label">Quantity</div>
                    <input type="number" name="qty" class="input-responsive" value="1" required>

                </div>

            </fieldset>

            <fieldset>
                <legend>Delivery Details</legend>
                <div class="order-label">Full Name</div>
                <input type="text" name="full-name" placeholder="Kum Jude" class="input-responsive" required>

                <div class="order-label">Phone Number</div>
                <input type="tel" name="contact" placeholder="237 675-827-455" class="input-responsive" required>

                <div class="order-label">Email</div>
                <input type="email" name="email" placeholder="judekum14@gmail.com" class="input-responsive" required>

                <div class="order-label">Address</div>
                <textarea name="address" rows="10" placeholder="Street, City, Country" class="input-responsive" required></textarea>

                <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
            </fieldset>
        </form>

        <?php
        //submit event
        if (isset($_POST['submit'])) {
            # code...
            $food = $_POST['food'];
            $price = $_POST['price'];
            $quantity = $_POST['qty'];

            $total = $price * $quantity;

            $order_date = date("Y-m-d h:i:sa");

            $status = 'Ordered'; // ordered, processing, delivered, cancelled

            $customer_name = $_POST['full-name'];
            $customer_contact = $_POST['contact'];
            $customer_email = $_POST['email'];
            $customer_address = $_POST['address'];

            // save to db
            $sql2 = "INSERT INTO order_table (food, price, qty, total, order_date, status, customer_name, customer_contact, customer_email, customer_address) VALUES ('$food', '$price', '$quantity', '$total', '$order_date', '$status', '$customer_name', '$customer_contact', '$customer_email', '$customer_address') ";

            $result2 = $conn->query($sql2) or exit(mysqli_error($conn));

            if ($result2 == true) {
                # code...
                $_SESSION['order'] = '<div class="success text-center width">Order placed successfully!</div>';

                header('Location: ' . SITE_URL);
                exit;
            } else {
                # failed to insert
                $_SESSION['order'] = '<div class="error text-center width">Failed to order food!</div>';
            }
        }
        ?>
    </div>
</section>

<?php include 'include/footer.php'; ?>