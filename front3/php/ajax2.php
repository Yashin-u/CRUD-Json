<?php

require_once 'config.php';

$id = htmlentities($_POST["id"], ENT_QUOTES);
$firstname = htmlentities($_POST["firstname"], ENT_QUOTES);
$lastname = htmlentities($_POST["lastname"], ENT_QUOTES);
$birthdate = htmlentities($_POST["birthdate"], ENT_QUOTES);
$gender1 = htmlentities($_POST["gender1"], ENT_QUOTES);
$membersince = htmlentities($_POST["membersince"], ENT_QUOTES);


$query = "UPDATE front2_leden
		SET
		birth_date = '$birthdate',
		first_name = '$firstname',
		last_name = '$lastname',
		gender = '$gender1',
		member_since = '$membersince'
		WHERE id = $id";



if (mysqli_query($con, $query))
{

}
