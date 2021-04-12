<?php include 'include/navbar.php'; ?>

<!-- Food search Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <form action="food-search.html" method="POST">
            <input type="search" name="search" placeholder="Search for Food.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>

<!-- CATEGORY -->
<section class="categories">
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
                <a href="category-foods.html">
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

<!-- Food menu section -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

        <div class="food-menu-box">
            <div class="food-menu-img">
                <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
            </div>

            <div class="food-menu-desc">
                <h4>Food Title</h4>
                <p class="food-price">$2.3</p>
                <p class="food-detail">
                    Made with Italian Sauce, Chicken, and organice vegetables.
                </p>
                <br>

                <a href="order.html" class="btn btn-primary">Order Now</a>
            </div>
        </div>

        <div class="food-menu-box">
            <div class="food-menu-img">
                <img src="images/menu-burger.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
            </div>

            <div class="food-menu-desc">
                <h4>Smoky Burger</h4>
                <p class="food-price">$2.3</p>
                <p class="food-detail">
                    Made with Italian Sauce, Chicken, and organice vegetables.
                </p>
                <br>

                <a href="#" class="btn btn-primary">Order Now</a>
            </div>
        </div>

        <div class="food-menu-box">
            <div class="food-menu-img">
                <img src="images/menu-burger.jpg" alt="Chicke Hawain Burger" class="img-responsive img-curve">
            </div>

            <div class="food-menu-desc">
                <h4>Nice Burger</h4>
                <p class="food-price">$2.3</p>
                <p class="food-detail">
                    Made with Italian Sauce, Chicken, and organice vegetables.
                </p>
                <br>

                <a href="#" class="btn btn-primary">Order Now</a>
            </div>
        </div>

        <div class="food-menu-box">
            <div class="food-menu-img">
                <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
            </div>

            <div class="food-menu-desc">
                <h4>Food Title</h4>
                <p class="food-price">$2.3</p>
                <p class="food-detail">
                    Made with Italian Sauce, Chicken, and organice vegetables.
                </p>
                <br>

                <a href="#" class="btn btn-primary">Order Now</a>
            </div>
        </div>

        <div class="food-menu-box">
            <div class="food-menu-img">
                <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
            </div>

            <div class="food-menu-desc">
                <h4>Food Title</h4>
                <p class="food-price">$2.3</p>
                <p class="food-detail">
                    Made with Italian Sauce, Chicken, and organice vegetables.
                </p>
                <br>

                <a href="#" class="btn btn-primary">Order Now</a>
            </div>
        </div>

        <div class="food-menu-box">
            <div class="food-menu-img">
                <img src="images/menu-momo.jpg" alt="Chicke Hawain Momo" class="img-responsive img-curve">
            </div>

            <div class="food-menu-desc">
                <h4>Chicken Steam Momo</h4>
                <p class="food-price">$2.3</p>
                <p class="food-detail">
                    Made with Italian Sauce, Chicken, and organice vegetables.
                </p>
                <br>

                <a href="#" class="btn btn-primary">Order Now</a>
            </div>
        </div>

        <div class="clearfix"></div>
    </div>

    <p class="text-center">
        <a href="#">See All Foods</a>
    </p>
</section>
<!-- Food Menu Section Ends Here -->

<?php include 'include/footer.php';
