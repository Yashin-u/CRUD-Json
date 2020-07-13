<?php
require 'config.php';
require_once 'session.inc.php';
echo "<link rel='stylesheet' href='css/style.css'/>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>

<body>
<form action="lid_toevoeg_verwerk.php" method="post" enctype="multipart/form-data">
    <ul>
        <h1>Album Toevoegen:</h1>

        <li>Voornaam:</li>
        <li><input type="text" name="first_name" required="required"></li>

        <li>Achternaam:</li>
        <li><input type="text" name="last_name" required="required"></li>

        <li>Geboortedatum:</li>
        <li><input type="date" name="birth_date" required="required"></li>

        <li>Geslacht:</li>
        <li><input type="radio" name="gender" value="M" checked> Man</li>
        <li><input type="radio" name="gender" value="F"> Vrouw</li>

        <li>Lid sinds:</li>
        <li><input type="date" name="member_since" required="required"></li>


        <input type="submit" name="submit">

    </ul>

</form>

</body>
</html>