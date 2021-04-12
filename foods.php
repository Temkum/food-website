<?php include 'include/navbar.php'; ?>

<!-- FOOD SEARCH -->
<section class="food-search text-center">
    <div class="container">

        <form action="food-search.html" method="POST">
            <input type="search" name="search" placeholder="Search for Food.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>

<!-- FOOD MENU -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>
        <?php
        $sql = "SELECT * FROM food WHERE active='Yes' ";

        $result = $conn->query($sql) or exit(mysqli_error($conn));

        $count = mysqli_num_rows($result);

        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $title = $row['title'];
                $description = $row['description'];
                $price = $row['price'];
                $image_name = $row['image_name'];
        ?>
                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <?php if ($image_name == '') {
                            # no image
                            echo '<div class="alert alert-warning" role="alert">Image not available!</div>';
                        } else {
                        ?>
                            <img src="<?php echo SITE_URL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
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
            echo '<div class="alert alert-danger" role="alert">Food not available!</div>';
        }
        ?>

        <div class="clearfix"></div>
    </div>
</section>

<?php include 'include/footer.php'; ?>