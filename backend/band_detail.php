<?php
// lees het config bestand
require_once 'config.php';

// lees het css bestand
echo "<link rel='stylesheet' href='style.css'/>";

// haal het band id uit de url
$bandID = $_GET['ID_band'];

// lees alle bands uit de tabel
$result = mysqli_query($con, "SELECT * FROM back12_bands WHERE ID_band = " . $bandID);

?>

<?php
echo "<table>";

echo "<tr>";

echo "<td>Naam band</td>";
echo "<td>Land van herkomst</td>";
echo "<td>Aantal leden</td>";
echo "<td>Muzieksoort</td>";
echo "<td>Extra info</td>";

echo "</tr>";

while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['naam'] . "</td>";
    echo "<td>" . $row['land'] . "</td>";
    echo "<td>" . $row['aantalLeden'] . "</td>";
    echo "<td>" . $row['muzieksoort'] . "</td>";
    echo "<td>" . $row['info'] . "</td>";

    echo "</tr>";

}

echo "</table>";

echo "<a href='band_uitlees.php'>Ga terug</a>";

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Band uitlees</title>
    <style>

    </style>
</head>

<body>
</body>
</html>