<?php include('partials-front/menu.php'); ?>

     <!-- -------------------------------- Food Search Section -------------------------------- -->
    <section class="food-search text-center" >
        <div class="container">
            <form action="food-search.html" method="POST">
                <input type="search" name="search" placeholder="Search for Food..." required>
                <input type="submit" name="submit" value="Search" class="btn primary-btn">
            </form>
        </div>    
    </section>

     <!-- -------------------------------- Categories Section -------------------------------- -->
     <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

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
                        <a href="category-foods.html">
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
            <h2 class="text-center">Food Menu</h2>
            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/pizza-1.avif" alt="Chicken Hawaiian Pizza" class="img-responsive2 img-curve">

                </div>
                <div class="food-menu-desc">
                    <h4>Food Title</h4>
                    <p class="food-price">&#8369 320.00</p>
                    <p class="food-detail">Made with Italian Sauce, Chicken and Organic Vegetables</p>
                    <br>
                    <a href="order.html" class="btn primary-btn">Order Now</a>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/burger-2.avif" alt="Chicken Hawaiian Pizza" class="img-responsive2 img-curve">

                </div>
                <div class="food-menu-desc">
                    <h4>Smoked Burger</h4>
                    <p class="food-price">&#8369 320.00</p>
                    <p class="food-detail">Made with Italian Sauce, Chicken and Organic Vegetables</p>
                    <br>
                    <a href="#" class="btn primary-btn">Order Now</a>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/burger.avif" alt="Chicken Hawaiian Pizza" class="img-responsive2 img-curve">

                </div>
                <div class="food-menu-desc">
                    <h4>Cheese Burger</h4>
                    <p class="food-price">&#8369 320.00</p>
                    <p class="food-detail">Made with Italian Sauce, Chicken and Organic Vegetables</p>
                    <br>
                    <a href="#" class="btn primary-btn">Order Now</a>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/pizza-1.avif" alt="Chicken Hawaiian Pizza" class="img-responsive2 img-curve">

                </div>
                <div class="food-menu-desc">
                    <h4>Food Title</h4>
                    <p class="food-price">&#8369 320.00</p>
                    <p class="food-detail">Made with Italian Sauce, Chicken and Organic Vegetables</p>
                    <br>
                    <a href="#" class="btn primary-btn">Order Now</a>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/pizza-1.avif" alt="Chicken Hawaiian Pizza" class="img-responsive2 img-curve">

                </div>
                <div class="food-menu-desc">
                    <h4>Food Title</h4>
                    <p class="food-price">&#8369 320.00</p>
                    <p class="food-detail">Made with Italian Sauce, Chicken and Organic Vegetables</p>
                    <br>
                    <a href="#" class="btn primary-btn">Order Now</a>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/dumpling.avif" alt="Chicken Hawaiian Pizza" class="img-responsive2 img-curve">

                </div>
                <div class="food-menu-desc">
                    <h4>Chicken Steam Dumpling</h4>
                    <p class="food-price">&#8369 320.00</p>
                    <p class="food-detail">Made with Italian Sauce, Chicken and Organic Vegetables</p>
                    <br>
                    <a href="#" class="btn primary-btn">Order Now</a>
                </div>
                <div class="clearfix"></div>
            </div>
           
            <div class="clearfix"></div>
        </div> 
        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>

    <?php include('partials-front/footer.php'); ?>