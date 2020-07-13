<?php

header('Cache-Control: no-cache'); // HTTP 1.1; for IE
header('Pragma: no-cache'); // HTTP 1.0; for Netscape
// and old IEs
header('Expires: Wed, 11 Feb 1998 10:40:21 GMT');

require 'config.php';
require_once 'session.inc.php';



if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0){

    if ($_FILES['foto']['type'] == "image/jpg" ||
        $_FILES['foto']['type'] == "image/jpeg" ||
        $_FILES['foto']['type'] == "image/pjpeg"){

        $map = __DIR__ . "/img/";
        $bestand = $_POST['id'] . '.jpg';

        move_uploaded_file($_FILES['foto']['tmp_name'], $map . $bestand);



    }
    else {
        echo "Het bestand is van het verkeerde type.";
    }

}
else {
    echo "er ging iets fout bij het uploaden";
}
header("Refresh:1; url=lid_afbeelding.php?id=" . $_POST['id']);

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Album uitlees</title>
<style>

</style>
</head>

<body>
</body>
</html>