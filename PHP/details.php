<?php
    // Database details
    define('HOST','localhost');
    define('USER','root');
    define('PASS','');
    define('DB','sdcuc');

    $conn = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
?>
