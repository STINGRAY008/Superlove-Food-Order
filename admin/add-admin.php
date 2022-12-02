<?php include ('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br><br>

        <?php
            if(isset($_SESSION['add'])) //Checking whether the session is set or not
            {
                echo $SESSION['add']; //Display the session message is set
                unset($_SESSION['add']); //Remove session message
            }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" placeholder="Enter your name"></td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" placeholder="Enter your username"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" placeholder="Enter your password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-primary">
                    </td>
                </tr>
            </table>
        </form>

    </div>
</div>

<?php include ('partials/footer.php'); ?>

<?php
// Process the value from form and save it in database
// Check whether the submit button is clicked or not
if(isset($_POST['submit']))
{
    //Button Clicked
    // echo "Button Clicked";

    //1. Get the Data from form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); //Password Encryption with MD5

    //2. SQL Query to save the data into database
    $sql = "INSERT INTO tbl_admin SET
        full_name='$full_name',
        username='$username',
        password='$password'
    ";

    //3. Execute Query and Save Data in Database
    //$conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error()); //Database Connection
    //$db_select = mysqli_select_db($conn, 'superlove-food-order') or die(mysqli_error()); //Selecting Database

    $res = mysqli_query($conn, $sql) or die(mysqli_error());

    //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
    if($res==TRUE)
    {
        //Data Inserted
        //echo "Data Inserted";
        //Cteate a Session Variable to Display Message
        $_SESSION['add'] = " <div class='success'>Admin Added Successfully</div>";
        //Redirect Page to Manage admin
        header ("location:".SITEURL.'admin/manage-admin.php');
    }
    else
    {
        //Failed to Insert Data
        //echo "Failed to Insert Data";
        //Cteate a Session Variable to Display Message
        $_SESSION['add'] = "<div class='error'>Failed to Add Admin</div>";
        //Redirect Page to Add Admin
        header ("location:".SITEURL.'admin/add-admin.php');
    }

}
?>
