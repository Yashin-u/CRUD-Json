<?php

require_once 'config.php';

$id = htmlentities($_POST["id"], ENT_QUOTES);


    $result = mysqli_query($con,  "DELETE FROM front2_leden WHERE id = $id");

    if ($result) {
        echo "OK";
    }