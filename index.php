<?php include('partials-front/menu.php'); ?>

<!-- -------------------------------- Food Search Section -------------------------------- -->
    <section class="food-search text-center" >
        <div class="container">
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food..." required>
                <input type="submit" name="submit" value="Search" class="btn primary-btn">
            </form>
        </div>    
    </section>

    <?php 
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }
    ?>

<!-- -------------------------------- Categories Section -------------------------------- -->
     <section class="categories">
        <div class="container">
            <!-- <h2 class="text-center">Explore Foods</h2> -->
            <a href="<?php echo SITEURL; ?>categories.php"><h2 class="text-center">Explore Foods</h2></a>

            <?php
                //Create SQL Query to display categories from Database
                $sql = "SELECT * FROM tbl_category WHERE featured='Yes' AND active='Yes' LIMIT 3";
                //Execute the Query
                $res = mysqli_query($conn, $sql);
                //Count rows to check whether the category is available or not
                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    //Categories available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the values like id, title, image_name
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];

                        ?>
                        <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                            <div class="box-3 float-container" >
                                <?php
                                    if($image_name=="")
                                    {
                                        //Display Message
                                        echo "<div class='error'>Image not available.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name ?>" alt="pizza" class="img-responsive1 img-curve">
                                        <?php
                                    }
                                ?>
                                <h3 class="float-text text-white"><?php echo $title; ?></h3>
                            </div>                      
                        </a>

                        <?php
                    }
                }
                else
                {
                    //Categories not available
                    echo "<div class='error'>Category not added.</div>";

                }
            ?>

            <div class="clearfix"></div>
        </div> 
    </section>

<!-- -------------------------------- Food Menu Section -------------------------------- -->
    <section class="food-menu">
        <div class="container">
            <!-- <h2 class="text-center">Food Menu</h2> -->
            <a href="<?php echo SITEURL; ?>foods.php"><h2 class="text-center">Food Menu</h2></a>

            <?php
                //Create SQL Query to display food from Database
                $sql2 = "SELECT * FROM tbl_food WHERE featured='Yes' AND active='Yes' LIMIT 4";
                //Execute the Query
                $res2 = mysqli_query($conn, $sql2);
                //Count rows to check whether the food is available or not
                $count2 = mysqli_num_rows($res2);

                if($count2>0)
                {
                    //Foods available
                    while($row=mysqli_fetch_assoc($res2))
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
                    echo "<div class='error'>Food not available.</div>";

                }
            ?>
           
        <div class="clearfix"></div>
        <p class="text-center">
            <a href="<?php echo SITEURL; ?>foods.php?food_id=<?php echo $id; ?>"> <b>See All Foods</b></a>
        </p>
    </section>

<?php include('partials-front/footer.php'); ?>