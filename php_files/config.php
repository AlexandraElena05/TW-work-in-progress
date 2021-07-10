<?php

   // session_start();

    $connection = mysqli_connect('localhost', 'root', 'admin', 'what_food');
    if(!$connection) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    
?>