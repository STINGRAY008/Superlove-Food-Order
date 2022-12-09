<?php include('./config/constants.php'); ?>

<html>
    <head>
        <title>Login - Food Order System</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
        <div class="login">
            <h1 class="text-center">Login</h1>
            <br><br>

            <?php
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }

            if(isset($_SESSION['no-login-message']))
            {
                echo $_SESSION['no-login-message'];
                unset ($_SESSION['no-login-message']);
            }
            ?>
            <form action="" method="POST" class="login-form">
                Username: <br>
                <input type="text" name="username" placeholder="Enter Username"> <br><br>

                Password: <br>
                <input type="password" name="password" placeholder="Enter Password"> <br><br>

                <button type="submit" name="submit" value="Login" class="btn-primary">Login</button>
                <!-- <input type="submit" name="submit" value="Login"> -->
            <br><br><br>    
            </form>

            <p class="text-center">Created By: <a href=""><br>Gina Rodolfo and<br> Charlotte Joyce Batawang</a></p>
        </div>
    </body>
</html>

<?php
    //Check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //Process for Login
        //1. Get the Data from Login Form
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        //2. SQL to check whether the user with username and password exist or not
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        //3. Execute the Query
        $res = mysqli_query($conn, $sql);

        //4. Count rows to check whether the user exista or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //User available and login success
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $username; //To check whether the user is loggedin or not and logout woll unset it
            //Redirect to Homepage/Dashboard
            header('location:' .SITEURL. 'admin/');
        }
        else
        {
            //User not available and login failed
            $_SESSION['login'] = "<div class='error'>Username or password did not match.</div>";
            //Redirect to Homepage/Dashboard
            header('location:' .SITEURL. 'admin/login.php');
        }
    }

?>