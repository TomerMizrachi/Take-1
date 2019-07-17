<?php
    //create a my SQL DB connection
    $dbhost = "182.50.133.168";
    $dbuser = "studDB19a";
    $dbpass = "stud19DB1!";
    $dbname = "studDB19a";

    $connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

    //testing db connection

    if(mysqli_connect_errno()){
        die("DB connection failed: " . mysqli_connect_error(). " (" . mysqli_connect_errno(). ")");
    }
    // echo "success!";

    // mysqli_close($connection);
?>
