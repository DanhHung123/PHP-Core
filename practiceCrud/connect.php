<?php
    define('server','localhost');
    define('userName', 'root');
    define('passwwork','');
    define('data','music');

    $link = mysqli_connect(server,userName,passwwork,data);

    if ($link === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
?>