<?php
    //Start Session
    session_start();

     //Create Constants to Store Non Repeating Values
     //define('SITEURL', 'http://localhost:8080/Superlove-Food-Order/');

     define('SITEURL', 'https://superlove-bistro.herokuapp.com/');

     define('LOCALHOST', 'SITEURL');
     define('DB_USERNAME', 'root');
     define('DB_PASSWORD', '');
     define('DB_NAME', 'superlove-food-order');
     
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //Database Connection
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //SElecting Database

     //$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db); 
  ?>

