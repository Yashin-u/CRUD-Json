<?php
require_once 'config.php';
require_once 'session.inc.php';

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>index</title>
    <link type="text/css" rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="lid_toevoeg.php">Een lid toevoegen</a>
        <a href="lid_uitlees.php">Leden uitlezen</a>
        <a href="loguit.php">Uitloggen</a>
    </div>

    <div id="main">
        <button class="openbtn" onclick="openNav()">☰</button>
    </div>
</body>
<script>
    function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
        document.getElementById("main").style.marginRight = "250px";
    }

    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginRight= "0";
    }
</script>
</html>