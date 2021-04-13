<?php include 'include/navbar.php'; ?>

<?php
// check if id is passed or not
if (isset($_GET['category_id'])) {
    # get category id
    $category_id = $_GET['category_id'];

    // get title based on category id
    $sql = "SELECT title FROM category WHERE id='$category_id' ";

    $result = $conn->query($sql) or exit(mysqli_error($conn));

    // get value from db
    $row = mysqli_fetch_assoc($result);

    // get title
    $category_title = $row['title'];
} else {
    # category not passed
    header('Location:' . SITE_URL);
}

?>

<!-- FOOD SEARCH -->
<section class="food-search text-center">
    <div class="container">

        <h2>Foods under <a href="#" class="text-white">"<?php echo $category_title; ?>"</a></h2>

    </div>
</section>

<!-- FOOD MENU -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>
        <?php
        // get query based on selected category
        $sql2 = "SELECT * FROM food WHERE category_id='$category_id' ";
        $result2 = $conn->query($sql2) or exit(mysqli_error($conn));
        $count2 = mysqli_num_rows($result2);
        if ($count2 > 0) {
            while ($row2 = mysqli_fetch_assoc($result2)) {
                $id = $row2['id'];
                $title = $row2['title'];
                $price = $row2['price'];
                $description = $row2['description'];
                $image_name = $row2['image_name'];

        ?>
                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <?php
                        if ($image_name == '') {
                            # code...
                            echo '<div class="alert alert-warning" role="alert">Image not available.</div>';
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

                        <a href="<?php echo SITE_URL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                    </div>
                </div>

        <?php
            }
        } else {
            # code...
            echo '<div class="alert alert-warning" role="alert">Food not available.</div>';
        }

        ?>

        <div class="clearfix"></div>
    </div>

</section>


<?php include 'include/footer.php'; ?>