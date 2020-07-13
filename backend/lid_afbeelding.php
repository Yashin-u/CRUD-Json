<?php
require 'config.php';
require_once 'session.inc.php';

$id = $_GET['id'];

// lees alle bands uit de tabel
$result = mysqli_query($con, "SELECT * FROM back2_leden WHERE id = $id");

//is er een lid gevonden met dit ID?
if (mysqli_num_rows($result) == 1)
{
//ja, lees het lid uit de dataset
    $row = mysqli_fetch_array($result);
} else {
    echo "Geen lid gevonden.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>

<body>
<form action="lid_afbeelding_verwerk.php" method="post" enctype="multipart/form-data">
    <ul>
        <h1>afbeelding Toevoegen:</h1>

        <p>
            <label for="id">Lid ID</label>
            <input type="number" name="id" readonly="readonly" value="<?php echo $id; ?>">
        </p>


        <li>Afbeelding</li>
        <input type="file" name="foto" accept="image/*">

        <input type="submit" name="submit">

    </ul>

</form>

<img src="img/<?php echo $id;?>.jpg" draggable='false' class='zoom'/>

<a href="lid_uitlees.php">Ga Terug</a>

</body>
</html>
