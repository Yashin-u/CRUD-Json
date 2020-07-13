<?php

header('Cache-Control: no-cache'); // HTTP 1.1; for IE
header('Pragma: no-cache'); // HTTP 1.0; for Netscape
// and old IEs
header('Expires: Wed, 11 Feb 1998 10:40:21 GMT');

$id = htmlentities($_POST["id"], ENT_QUOTES);



if ($_FILES["file"]["name"] != '') {
    $test = explode('.', $_FILES["file"]["name"]);
    $ext = end($test);
    $name = $id . '.' . $ext;
    $location = './upload/' . $name;
    move_uploaded_file($_FILES["file"]["tmp_name"], $location);

    header("Refresh:1; url=../js/json.js");

    header("Refresh:2; url=upload/".$id.".jpg");

}





