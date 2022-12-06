
<?php 
    include ('admin/config/constants.php');    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superlove Bistro</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!-- -------------------------------- Navbar Section -------------------------------- -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="<?php echo SITEURL; ?>"><img src="images/Superlove.png" alt="" class="img-responsive"></a>
            </div>
            <div class="menu text-right">
                <ul>
                <li>
                    <a href="<?php echo SITEURL; ?>">Home</a>
                </li>
                <li>
                    <a href="<?php echo SITEURL; ?>categories.php">Categories</a>
                </li>
                <li>
                    <a href="<?php echo SITEURL; ?>foods.php">Foods</a>
                </li>
                <li>
                    <a href="<?php echo SITEURL; ?>contact.php">Contact</a>
                </li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div> 
    </section>