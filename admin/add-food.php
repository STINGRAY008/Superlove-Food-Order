<?php include ('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
       <h1>Add Food</h1>
       <br> <br>

       <?php
            if(isset($_SESSION['upload'])) 
            {
                echo $_SESSION['upload']; 
                unset($_SESSION['upload']); 
            }
        ?>

       <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" placeholder="Title of the Food">
                    </td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Description of the food"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>
                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Category:</td>
                    <td>
                        <select name="category">

                            <?php
                                //Create PHP Code to display categories from Database
                                //1. Create SQL to get all active categories from database
                                $sql = "SELECT * FROM tbl_category WHERE active = 'Yes'";

                                //Executing Query
                                $res = mysqli_query($conn, $sql);

                                //Count Rows to check whether we have categories or not
                                $count = mysqli_num_rows($res);

                                //If count is greater than zero, we have categories else we do not have categories
                                if($count>0)
                                {
                                    //We have categories
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        //get the details of categories
                                        $id = $row['id'];
                                        $title = $row['title'];

                                        ?>
                                        <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                                        <?php
                                        
                                    }
                                }
                                else
                                {
                                    //We do not have category
                                    ?>
                                    <option value="0">No Category Found</option>
                                    <?php

                                }

                                //2. Display on Dropdown
                            
                            ?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Food" class="btn-primary">
                    </td>
                </tr>
                
            </table>
        </form>

            <?php
                // Process the value from form and save it in database
                // Check whether the submit button is clicked or not
                if(isset($_POST['submit']))
                {
                    //Button Clicked
                    //echo "Button Clicked";

                    //1. Get the data from form
                    $title = $_POST['title'];
                    $description = $_POST['description'];
                    $price = $_POST['price'];
                    $category = $_POST['category'];

                    //For Radio Input, we need to check whether the button is selected or not
                    if(isset($_POST['featured']))
                    {
                        //Get the value from form
                        $featured = $_POST['featured'];
                    }
                    else
                    {
                        //Set the Default Value
                        $featured = "No";
                    }

                    if(isset($_POST['active']))
                    {
                        //Get the value from form
                        $active = $_POST['active'];
                    }
                    else
                    {
                        //Set the Default Value
                        $active = "No";
                    }

                    //2. Upload the Image if selected
                    //Check whether the select image is clicked or not and upload the image only if the image is selected
                    if(isset($_FILES['image']['name']))
                    {
                        //Get the details of the selected image
                        $image_name = $_FILES['image']['name'];

                        //Check whether the image is selected or not and upload image only if selected
                        if($image_name!="")
                        {
                            //Image is selected
                            //A. Rename the image
                            //Get the extension of our image(jpg, png, gif, etc) e.g. "special.food.jpg"
                                $ext = end(explode('.', $image_name));

                                //Rename the image
                                $image_name = "Food-Name-".rand(000, 999)."." .$ext;

                            //B. Upload the image
                            //Get the source path and destination path

                                //Source path is the current location of the image
                                $src = $_FILES['image']['tmp_name'];

                                //Destination path for the image to be uploaded
                                $dst = "../images/food/".$image_name;

                             //Upload the image
                                $upload = move_uploaded_file($src, $dst);

                                //Check the image is uploaded or not
                                //And if the image is not uploaded then we will stop the process and redirect with error message
                                if($upload==false)
                                {
                                    //Set mesaage
                                    $_SESSION['upload'] = "<div class='error'>Failed to upload image.</div>";
                                    //Redirect to Add Category Page
                                    header ("location:".SITEURL.'admin/add-food.php');
                                    //Stop the process
                                    die();
                                }   
                        }
                    }
                    else
                    {
                        $image_name = ""; //Setting default value as blank
                    }
                    //3. Insert into Database

                    //SQL Query to save the data into database
                    $sql2 = "INSERT INTO tbl_food SET
                        title='$title',
                        description = '$description',
                        price= $price,
                        image_name= '$image_name',
                        category_id= $category,
                        featured='$featured',
                        active='$active'
                    ";

                    //Execute Query and Save Data in Database
                    $res2 = mysqli_query($conn, $sql2); //or die(mysqli_error());

                    //4. Redirect with message to Manage Food Page
                    //Check whether data is inserted or not
                    if($res2 == true)
                    {
                        //Data inserted successfully
                        $_SESSION['add'] = "<div class='success'>Food Added Successfully.</div>";
                        //Redirect Page to Manage Category Page
                        header ("location:".SITEURL.'admin/manage-food.php');
                    }
                    else
                    {
                        //Failed to insert data
                        $_SESSION['add'] = "<div class='error'>Failed to Add Food.</div>";
                        //Redirect Page to Manage Category Page
                        header ("location:".SITEURL.'admin/manage-food.php');
                    }
                }    
            ?>
    </div>   
</div>
<?php include ('partials/footer.php'); ?>