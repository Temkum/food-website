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

<!-- FOOD SEARCH -->
<section class="food-search">
    <div class="container">

        <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

        <form action="#" class="order">
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
                    <p class="food-price">$<?php echo $price; ?></p>

                    <div class="order-label">Quantity</div>
                    <input type="number" name="qty" class="input-responsive" value="1" required>

                </div>

            </fieldset>

            <fieldset>
                <legend>Delivery Details</legend>
                <div class="order-label">Full Name</div>
                <input type="text" name="full-name" placeholder="E.g. Vijay Thapa" class="input-responsive" required>

                <div class="order-label">Phone Number</div>
                <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                <div class="order-label">Email</div>
                <input type="email" name="email" placeholder="E.g. hi@vijaythapa.com" class="input-responsive" required>

                <div class="order-label">Address</div>
                <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
            </fieldset>

        </form>

    </div>
</section>

<?php include 'include/footer.php'; ?>