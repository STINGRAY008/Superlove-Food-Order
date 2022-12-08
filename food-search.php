<?php include('partials-front/menu.php'); ?>

    <!-- Food Search Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">

        <?php 
            //Get the search keyword
            $search = $_POST['search'];
        ?>
            
            <h2>Foods on your search <a href="#" class="text-orange">"<?php echo $search;?>"</a></h2>

        </div>
    </section>
    <!-- Food Search Section Ends Here -->



    <!-- Food Menu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
                
                //SQL Query to get foods based on search keyword
                $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

                //Execute the query
                $res = mysqli_query($conn, $sql);

                //Count rows
                $count = mysqli_num_rows($res);

                //Check whether food available or not
                if($count>0)
                {
                    //Food available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the values like id, title, image_name
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];

                        ?>
                         <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php
                                    //Check whether image available or not
                                    if($image_name=="")
                                    {
                                        //Image not available
                                        echo "<div class='error'>Image not available.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicken Hawaiian Pizza" class="img-responsive2 img-curve">;
                                        <?php
                                    }
                                ?>
                                
                            </div>
                            <div class="food-menu-desc">
                                <h4><?php echo $title; ?></h4>
                                <p class="food-price">&#8369 <?php echo $price ?></p>
                                <p class="food-detail">
                                    <?php echo $description; ?>
                                </p>
                                <br>
                                <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn primary-btn">Order Now</a>
                            </div>
                            <div class="clearfix"></div>
                            </div>
                        <?php
                    }
                }
                else
                {
                    //Food not available
                    echo "<div class 'error'>Food not found.</div>";
                }
            
            ?>

            <div class="clearfix"></div>  

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>