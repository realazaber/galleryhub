<?php
    $_connection = mysqli_connect("localhost", "root", "", "artworks");

    if ($_connection -> connect_errno) {
        echo "Connect failed";
    }
    else {
        //echo "Successful connection";
    }
?>