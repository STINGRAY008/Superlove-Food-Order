<?php
 //Include Constants File
 include('./config/constants.php');
 
if(isset($_GET['id']))//AND isset($_GET['image_name']) )
{
    //Process to delete
    //echo "Process to Delete";

    //1. Get the ID and Image Name
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

    //2. Remove the image if available
    //Check whether the image is available or not and delete only if available
    if($image_name !="")
    {
        //It has image and need to remove from folder
        //Get the image path
        $path = "../images/food/".$image_name;

        //Remove image file from folder
        $remove = unlink($path);

         //Check whether the image is removed or not
         if($remove==false)
         {
             //Failed to remove image
             $_SESSION['upload'] = "<div class='error'>Failed to Remove Image File.</div>";
             header ("location:".SITEURL.'admin/manage-food.php');

             //Stop the Process
             die();
         }
    }     
    //3. Delete the food from Database
    $sql = "DELETE FROM tbl_food WHERE id=$id";
    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //Check whether the query executed or not and set the session message respectively
    //4. Redirect to Manage Food with Session Message
    if($res==true)
    {
        //Food Deleted
        $_SESSION['delete'] = "<div class='success'>Food deleted successsfully.</div>";
        header ("location:".SITEURL.'admin/manage-food.php');
    }
    else
    {
        //Failed to Delete Food
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Food.</div>";
        header ("location:".SITEURL.'admin/manage-food.php');
    }
}
else
{
    //Redirect to Manage Food Page
    //echo "Redirect";
    $_SESSION['unauthorize'] = "<div class= 'error'>Unauthorized Access.</div>";
    header ('location:'.SITEURL.'admin/manage-food.php');
}
?> 