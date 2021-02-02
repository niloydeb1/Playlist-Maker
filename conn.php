<?php
    $host = "localhost";
    $username = "root";
    $password = "root";
    $dbName = "playlist_maker";
    // $host = "sql103.epizy.com";
    // $username = "epiz_26807971";
    // $password = "jNRUiprDyrc";
    // $dbName = "epiz_26807971_playlist_maker";

    $mysqli = new mysqli($host, $username, $password, $dbName);

    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    }
?>