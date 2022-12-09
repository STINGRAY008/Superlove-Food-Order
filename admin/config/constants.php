<?php
    //Start Session
    session_start();

    /* //Creste Constants to Store Non Repeating Values
    //define('SITEURL', 'http://localhost:8080/Superlove-Food-Order/');
    define('SITEURL', 'https://superlove-food-order.000webhostapp.com/');

    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'superlove-food-order'); */




    /* //Creste Constants to Store Non Repeating Values
    define('SITEURL', 'http://localhost:8080/Superlove-Food-Order/');
    //define('SITEURL', 'https://superlove-food-order.000webhostapp.com/');

    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'superlove-food-order'); */

    define('SITEURL', 'us-cdbr-east-06.cleardb.net/index.php');
    define('LOCALHOST', 'us-cdbr-east-06.cleardb.net');
    define('DB_USERNAME', 'ba73ee959e105c');
    define('DB_PASSWORD', 'd7bad640');
    define('DB_NAME', 'heroku_773fcef69bc6fe9 '); 

  /*   mysql://ba73ee959e105c:d7bad640@us-cdbr-east-06.cleardb.net/heroku_773fcef69bc6fe9?reconnect=true

        Username:
        Password:
        Host:us-cdbr-east-06.cleardb.net

        DB_name: heroku_773fcef69bc6fe9 */

        $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $cleardb_server = $cleardb_url["host"];
        $cleardb_username = $cleardb_url["user"];
        $cleardb_password = $cleardb_url["pass"];
        $cleardb_db = substr($cleardb_url["path"],1);
        $active_group = 'default';
        $query_builder = TRUE;
 


//$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //Database Connection
   //$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //Selecting Database

  // Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
?>

?>