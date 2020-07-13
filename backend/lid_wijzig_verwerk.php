<?php
// lees het config-bestand
require_once 'config.php';
require_once 'session.inc.php';

// lees alle formuliervelden
$id = $_POST['id'];
$birth_date = $_POST['birth_date'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$gender = $_POST['gender'];
$member_since = $_POST['member_since'];

if (is_numeric($id) &&
    strlen($id) > 0)
{
    $query = "UPDATE back2_leden
		SET 
		birth_date = '$birth_date',
		first_name = '$first_name',
		last_name = '$last_name',
		gender = '$gender',
		member_since = '$member_since'
		WHERE id = $id";


        if (mysqli_query($con, $query))
        {

            echo "lid $first_name is gewijzigd!<br/>";
        }
        //anders
        else {
            echo "Fout bij het wijzigen van $first_name </br>";
        }

}
echo "<p><a href='lid_uitlees.php'>TERUG</a></p>";
?>