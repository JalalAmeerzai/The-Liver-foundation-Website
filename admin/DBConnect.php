<?php
    session_start();
    $connection = mysqli_connect("localhost", "root", "","tlf-database");
 
    // Check connection
    if($connection === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

?>
