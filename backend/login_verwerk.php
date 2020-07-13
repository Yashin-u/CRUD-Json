<?php
session_start();
require 'config.php';

$token = bin2hex(openssl_random_pseudo_bytes(32));
$_SESSION['token'] = $token;
$username = $_POST ['username'];
$password = $_POST ['password'];
$pass = htmlspecialchars($password);
$afzender = $_SERVER['HTTP_REFERER'];
$final = md5($pass);

$query = "SELECT * FROM back2_users WHERE username = '$username' AND password = '$final'";

if($afzender == "https://84122.ict-lab.nl/periode1/backend/index.php") {
    print_r('afzender klopt volledig');
    if(isset($_POST['submit']) && isset($_POST['password']) && isset($_POST['username'])) {
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $_SESSION['username'] = $row['username'];
            header('location: home.php');
            echo "ingelogd";
        } else {
            echo "Probeer opnieuw";
            header('Refresh: 2; index.php');

        }
    }
    else{
        print_r('er is geen info doorgestuurd');
    }

}

else {
    print_r('afzender klopt niet');
    }

$token1 = $_POST['tokenVeld'];
$token2 = $_POST['tokenVeld'];

