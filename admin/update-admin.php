<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br><br>

        <?php
             //1. Get the ID of Selected Admin 
             $id=$_GET['id'];

             //2. Create SQL Query to Get the Details
             $sql="SELECT * FROM tbl_admin WHERE id=$id";

             //Execute the Query
             $res=mysqli_query($conn, $sql);

             //Check whether the query is executed or not
             if($res==true)
             {
                //Check whether data is available or not
                $count = mysqli_num_rows($res);
                //Check whether we have admin data or not
                if($count==1)
                {
                    //Get the Details
                    echo "Admin Available";
                }
                else
                {
                    //Redirect to Manage Admin Page
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
             }

        
        ?>

        <form action="" method="POST">
        <table class="tbl-30">
            <tr>
                <td>Full Name: </td>
                <td>
                    <input type="text" name="full_name" value="">
                </td>
            </tr>
            <tr>
                <td>Username: </td>
                <td>
                    <input type="text" name="username" value="">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="text" name="submit" value="Update Admin" class="btn-secondary">

                </td>
            </tr>
        </table>
    </form>
    </div>
    

  
</div>


<?php include('partials/footer.php'); ?>