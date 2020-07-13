<?php
require 'config.php';
require_once 'session.inc.php';

if (isset($_POST["submit"])){

    $id = $_GET['id'];
    $result = mysqli_query($con, "SELECT id FROM back2_leden WHERE id = " . $id );



    $birth_date = $_POST['birth_date'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $member_since = $_POST['member_since'];




    $query = "INSERT INTO back2_leden (birth_date, first_name, last_name, gender, member_since)
           VALUES ( '$birth_date', '$first_name', '$last_name', '$gender', '$member_since')";

    if ($member_since < $birth_date){
            echo "lid kan niet";
        }

    else {
        if (mysqli_query($con, $query)) {
            echo "Album $first_name is toegevoegd!<br/>";
        } //anders
        else {
            echo "Fout bij het toevoegen van $first_name </br>";
            print_r($query);
        }
    }
    print_r($query);
}

echo "<p><a href='home.php'>TERUG</a></p>";
?>
