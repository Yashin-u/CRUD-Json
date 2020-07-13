<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>gebruiker uitlees</title>
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
    function imgError(image) {
        image.onerror = "";
        image.src = "background/error.png";
        return true;
    }

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



<?php
// lees het config bestand
require_once 'config.php';
require_once 'session.inc.php';

// lees het css bestand
echo "<link rel='stylesheet' href='css/style.css'/>";



// lees alle bands uit de tabel
$result = mysqli_query($con, "SELECT * FROM back2_leden");

?>

<?php

echo "<table>";

echo "<tr>";

echo "<td>Id</td>";
echo "<td>Birth date</td>";
echo "<td>First name</td>";
echo "<td>Last name</td>";
echo "<td>Gender</td>";
echo "<td>Member since</td>";
echo "<td>Afbeelding</td>";
echo "<td>Foto wijzigen</td>";
echo "<td>Pas aan</td>";
echo "<td>Verwijder</td>";

echo "</tr>";

while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['birth_date'] . "</td>";
    echo "<td>" . $row['first_name'] . "</td>";
    echo "<td>" . $row['last_name'] . "</td>";
    echo "<td>" . $row['gender'] . "</td>";
    echo "<td>" . $row['member_since'] . "</td>";
    echo "<td><img src='img/" . $row['id'] . '.jpg' . "' onerror=\"imgError(this);\" draggable='false' class='zoom'/></td>";
    echo "<td><a href='lid_afbeelding.php?id=" . $row['id'] . "'>afbeelding</a></td>";
    echo "<td><a href='lid_wijzig.php?id=" . $row['id'] . "'>Wijzig</a></td>";
    echo "<td><a href='lid_verwijder.php?id=" . $row['id'] . "'>verwijder</a></td>";

    echo "</tr>";

}

echo "</table>";


?>
