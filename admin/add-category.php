<?php include ('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br><br>

        <?php
            if(isset($_SESSION['add'])) 
            {
                echo $_SESSION['add']; 
                unset($_SESSION['add']); 
            }

            if(isset($_SESSION['upload'])) 
            {
                echo $_SESSION['upload']; 
                unset($_SESSION['upload']); 
            }
        ?>

        <br><br>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title">
                    </td>
                </tr>
                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
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
                        <input type="submit" name="submit" value="Add Category" class="btn-primary">
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
                // echo "Button Clicked";

                //1. Get the Data from Category form
                $title = $_POST['title'];

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
                //Check whether the image is selected or not and set the value for image name accordingly
                //print_r($_FILES['image']);
                //die(); //Break the code here

                if(isset($_FILES['image']['name']))
                {
                    //Upload the image
                    //To upload image we need image name, source path and destination path
                    $image_name = $_FILES['image']['name'];

                    //Upload the image only if image is selected
                    if($image_name != "")
                    {

                        //Auto Rename our image
                        //Get the extension of our image(jpg, png, gif, etc) e.g. "special.food.jpg"
                        $ext = end(explode('.', $image_name));

                        //Rename the image
                        $image_name = "Food_Category_".rand(000, 999).'.' .$ext;
                    

                        $source_path = $_FILES['image']['tmp_name'];

                        $_destination_path = "../images/category/".$image_name;

                        //Upload the image
                        $upload = move_uploaded_file($source_path, $_destination_path);

                        //Check the image is uploaded or not
                        //And if the image is not uploaded then we will stop the process and redirect with error message
                        if($upload==false)
                        {
                            //Set mesaage
                            $_SESSION['upload'] = "<div class='error'>Failed to upload image.</div>";
                            //Redirect to Add Category Page
                            header ("location:".SITEURL.'admin/add-category.php');
                            //Stop the process
                            die();
                        }
                    }               
                                       
                }
                else
                {
                    //Don't upload image and set the image_name value as blank
                    $image_name="";
                }

                //2. SQL Query to save the data into database
                    $sql = "INSERT INTO tbl_category SET
                    title='$title',
                    image_name= '$image_name',
                    featured='$featured',
                    active='$active'
                    ";
                //3. Execute Query and Save Data in Database
                    $res = mysqli_query($conn, $sql);  //or die(mysqli_error());

                //4. Check whether the query executed or not and the data added or not
                    if($res==true)
                    {
                        //Query executed and category added
                        $_SESSION['add'] = "<div class='success'>Category Added Successfully.</div>";
                        //Redirect Page to Manage Category Page
                        header ("location:".SITEURL.'admin/manage-category.php');
                    }
                    else
                    {
                        //Failed to add Category
                        $_SESSION['add'] = "<div class='error'>Failed to add Category.</div>";
                        //Redirect Page to Manage Category Page
                        header ("location:".SITEURL.'admin/add-category.php');
                    }
            }
        ?>
    </div>    
</div>


<?php include ('partials/footer.php'); ?>