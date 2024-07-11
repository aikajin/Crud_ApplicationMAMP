<?php

    $db = mysqli_connect("localhost", "php", "1234", "crud_db");
    if (!$db) {
        echo mysqli_connect_error();
    }    
?>