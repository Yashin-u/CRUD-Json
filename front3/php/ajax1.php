<?php
require "config.php";
$first_name = htmlentities($_POST["first_name"], ENT_QUOTES);
$last_name = htmlentities($_POST["last_name"], ENT_QUOTES);
$birth_date = htmlentities($_POST["birth_date"], ENT_QUOTES);
$gender = htmlentities($_POST["gender"], ENT_QUOTES);
$member_since = htmlentities($_POST["member_since"], ENT_QUOTES);



if ($first_name == "" or $last_name == "" or $birth_date == "" or $member_since == ""){

}
else {

    $result = mysqli_query($con, "INSERT INTO `front2_leden` (`first_name`, `last_name`, `birth_date`, `gender`, `member_since`) 
                                        VALUES ('{$first_name}', '{$last_name}', '{$birth_date}', '{$gender}', '{$member_since}')");

    if  ($result) {
        echo "OK";
    }
}

