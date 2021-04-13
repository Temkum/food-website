<?php include 'include/navbar.php'; ?>

<!-- Categories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore food categories</h2>

        <?php
        // display all active categories
        $sql = "SELECT * FROM category WHERE active='Yes' ";

        $result = $conn->query($sql) or exit(mysqli_error($conn));

        $count = mysqli_num_rows($result);

        // count rows
        if ($count > 0) {
            # return categories
            while ($row = mysqli_fetch_assoc($result)) {
                # code...
                $id = $row['id'];
                $title = $row['title'];
                $image_name = $row['image_title'];
        ?>
                <a href="<?php echo SITE_URL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                    <div class="box-3 float-container">
                        <?php
                        if ($image_name == "") {
                            # img N/A
                            echo '<div class="alert alert-warning" role="alert">Image not available.</div>';
                        } else {
                            # return img
                        ?>
                            <img src="<?php echo SITE_URL; ?>images/category/<?php echo $image_name; ?>" alt="<?php echo $title; ?>" class="img-responsive img-curve">
                        <?php
                        }
                        ?>


                        <h3 class="float-text text-white"><?php echo $title; ?></h3>
                    </div>
                </a>
        <?php
            }
        } else {
            # N/A
            echo '<div class="alert alert-warning" role="alert">Image not available.</div>';
        }
        ?>

        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->

<?php include 'include/footer.php'; ?>