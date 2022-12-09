<?php 
    include ('./config/constants.php'); 
    include ('login-check.php');
    
?>

<html>
    <head>
        <title>Superlove Bistro - Home Page</title>
        <link rel="stylesheet" href="../css/admin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body>
        <!---------------------------------- Menu Section ---------------------------------->
        <div class="menu text-center">
            <div class="wrapper">
                <ul>
                    <li> <a href="index.php">Home</a></li>
                    <li> <a href="manage-admin.php">Admin</a></li>
                    <li> <a href="manage-category.php">Category</a></li>
                    <li> <a href="manage-food.php">Food</a></li>
                    <li> <a href="manage-order.php">Order</a></li>
                    <li> <a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>