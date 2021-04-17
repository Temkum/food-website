<?php include 'include/header.php'; ?>

<!-- FOOD SEARCH -->
<section class="food-search text-center" hidden>
    <div class="container">

        <form action="<?php echo SITE_URL; ?>food-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Food.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>
    </div>
</section>

<!-- display message -->
<?php
if (isset($_SESSION['order'])) {
    echo $_SESSION['order'];
    unset($_SESSION['order']);
}
?>

<!-- FEATURES section -->
<section class="section-features js--section-features" id="features">
    <div class="row">
        <h2>Get food fast &mdash; not fast food</h2>
        <p class="long-copy">
            Hello, we're Omnifood, your new premium food delivery service. We know you're always busy. No time for cooking.
            So let us take care of that, we're really good at it. we promise!
        </p>
    </div>

    <div class="row" js-wp-1>
        <div class="col span-1-of-4 box">
            <i class="ion-ios-infinite-outline icon-big"></i>
            <h3>Up to 365</h3>
            <p>Never cook again. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente voluptatum nemo
                repellendus enim possimus nobis placeat quam molestiae, dolorum adipisci.</p>
        </div>
        <div class="col span-1-of-4 box">
            <i class="ion-ios-stopwatch-outline icon-big"></i>
            <h3>Ready in 20 minutes</h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente voluptatum nemo repellendus enim possimus
                nobis placeat quam molestiae, dolorum adipisci.</p>
        </div>
        <div class="col span-1-of-4 box">
            <i class="ion-ios-nutrition-outline icon-big"></i>
            <h3>100% Organic</h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente voluptatum nemo repellendus enim possimus
                nobis placeat quam molestiae, dolorum adipisci.</p>
        </div>
        <div class="col span-1-of-4 box">
            <i class="ion-ios-cart-outline icon-big"></i>
            <h3>Order anything</h3>
            <p>Never cook again. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente voluptatum nemo
                repellendus enim possimus nobis placeat quam molestiae, dolorum adipisci.</p>
        </div>
    </div>
</section>

<!-- CATEGORY -->
<section class="categories js--section-categories">
    <div class="container">
        <h2 class="text-center">Explore Foods</h2>

        <?php
        // create query to display categories from db
        $sql = "SELECT * FROM category WHERE active='Yes' AND featured='Yes' ";

        $result = $conn->query($sql) or exit(mysqli_error($conn));

        // check if row data is available
        $count = mysqli_num_rows($result);

        if ($count > 0) {
            # code...
            while ($row = mysqli_fetch_assoc($result)) {
                # get values from db
                $id = $row['id'];
                $title = $row['title'];
                $image_name = $row['image_title'];
        ?>
                <a href="<?php echo SITE_URL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                    <div class="box-3 float-container">
                        <?php
                        if ($image_name == "") {
                            # check if img is available for not
                            echo '<div class="alert alert-warning" role="alert">Image not available.</div>';
                        } else {
                            # img available
                        ?>
                            <img src="<?php echo SITE_URL; ?>/images/category/<?php echo $image_name; ?>" alt="<?php echo $title; ?>" class="img-responsive img-curve">
                        <?php
                        }
                        ?>

                        <h3 class="float-text text-white"><?php echo $title; ?></h3>
                    </div>
                </a>
        <?php
            }
        } else {
            # code...
            echo '<div class="alert alert-success" role="alert">No categories added!</div>';
        }
        ?>

        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->

<!-- HOW IT WORKS/steps -->
<section class="section-steps" id="works">
    <div class="row">
        <h2>How it works &mdash; Simple as 1, 2, 3</h2>
    </div>

    <div class="row">
        <div class="col span-1-of-2 steps-box">
            <img src="./images/mockup.jpg" alt="App on iPhone" class="app-screen" class="js-wp-2">
        </div>

        <div class="col span-1-of-2 steps-box">
            <div class="works-step">
                <div>1</div>
                <p>Choose what you want to eat!</p>
            </div>
            <div class="works-step">
                <div>2</div>
                <p>Order your delicious meal using our website. Or you can even call us!</p>
            </div>
            <div class="works-step">
                <div>3</div>
                <p>Enjoy your meal after less than 20 minutes. See you next time!</p>
            </div>

            <a href="#" class="btn-app"><img src="./images/download-app.svg" alt="Apple App"></a>
            <a href="#" class="btn-app"><img src="./images/download-app-android.png" alt="Android App"></a>
        </div>
    </div>
</section>

<!-- FOOD MENU SECTION -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>
        <?php
        // get active and featured food from db
        $sql_food = "SELECT * FROM food WHERE active='Yes' AND featured='Yes' LIMIT 6";

        $result_food = $conn->query($sql_food) or exit(mysqli_error($conn));

        $count_food = mysqli_num_rows($result_food);

        if ($count_food > 0) {
            # food available
            while ($row = mysqli_fetch_assoc($result_food)) {
                # get values
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];
                $image_name = $row['image_name'];
        ?>
                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <?php
                        // check if img is available
                        if ($image_name == '') {
                            # img N/A
                            echo '<div class="alert alert-danger" role="alert">Image not available!</div>';
                        } else {
                        ?>
                            <img src="<?php echo SITE_URL; ?>images/food/<?php echo $image_name; ?>" alt="<?php echo $title; ?>" class="img-responsive img-curve">


                        <?php
                        }

                        ?>
                    </div>

                    <div class="food-menu-desc">
                        <h4><?php echo $title; ?></h4>
                        <p class="food-price">$<?php echo $price; ?></p>
                        <p class="food-detail"><?php echo $description; ?></p>
                        <br>

                        <a href="<?php echo SITE_URL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
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

    <p class="text-center">
        <a href="<?php echo SITE_URL; ?>foods.php">See All Foods</a>
    </p>
</section>
<!-- Food Menu Section Ends Here -->

<?php include 'include/footer.php'; ?>