<?php include 'include/navbar.php'; ?>

<!-- FOOD SEARCH -->
<section class="food-search text-center">
    <div class="container">
        <!-- display search keyword -->
        <?php
        error_reporting(0);
        $search = $_POST['search'];
        ?>
        <h2>Foods on your search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>
    </div>
</section>

<!-- FOOD MENU -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>
        <?php
        $search = $_POST['search'];

        // query based on search keyword
        $sql = "SELECT * FROM food WHERE title LIKE '%$search%' OR description LIKE '%$search%' ";

        $result = $conn->query($sql) or exit(mysqli_error($conn));

        $count = mysqli_num_rows($result);

        if ($count > 0) {
            # get food
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];
                $image_name = $row['image_name'];
        ?>
                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <?php if ($image_name == '') {
                            # img not available
                            echo '<div class="alert alert-warning" role="alert">Image not available!</div>';
                        } else {
                            # code...
                        ?>
                            <img src="<?php SITE_URL; ?>images/food/<?php echo $image_name; ?>" alt="<?php echo $title; ?>" class="img-responsive img-curve">
                        <?php
                        }
                        ?>
                    </div>

                    <div class="food-menu-desc">
                        <h4><?php echo $title; ?></h4>
                        <p class="food-price">$<?php echo $price; ?></p>
                        <p class="food-detail"><?php echo $description; ?></p>
                        <br>

                        <a href="#" class="btn btn-primary">Order Now</a>
                    </div>
                </div>
        <?php
            }
        } else {
            # food not available
            echo '<div class="alert alert-warning" role="alert">Food not found!</div>';
        }
        ?>
        <div class="clearfix"></div>
    </div>
</section>

<?php include 'include/footer.php'; ?>