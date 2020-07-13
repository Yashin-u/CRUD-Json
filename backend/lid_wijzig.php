<?php
// lees het config-bestand
require_once 'config.php';
require_once 'session.inc.php';

// lees het css bestand
echo "<link rel='stylesheet' href='style.css'/>";

// haal het band id uit de url
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
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>wijzig lid</title>
</head>

<body>
<h1>wijzig lid gegevens</h1>
<form action="lid_wijzig_verwerk.php" method="post" enctype="multipart/form-data">

	<p>
        <label for="id">Lid ID</label>
        <input type="number" name="id" readonly="readonly" value="<?php echo $id; ?>">
	</p>

    <p>
        <label for="birth_date">Geboortedatum:</label>
        <input value="<?php echo $row['birth_date']; ?>" type="date" name="birth_date">
    </p>

	<p>
	<label for="first_name">Voornaam lid:</label>
	<input type="text" name="first_name" required="required"
	value="<?php echo $row['first_name']; ?>">
	</p>

    <p>
        <label for="last_name">Achternaam lid:</label>
        <input type="text" name="last_name" required="required"
               value="<?php echo $row['last_name']; ?>">
    </p>

    <p>
        <label for="gender">Geslacht:</label>
        <select required="required" value="<?php echo $row['gender']; ?>" name="gender">
            <option value="M">M</option>
            <option value="F">F</option>
        </select>
    </p>

    <p>
        <label for="member_since">Lid sinds:</label>
        <input value="<?php echo $row['member_since']; ?>" type="date" name="member_since">
    </p>

	<p>
	<input type="submit" name="submit">
	<button onclick="history.back();return false;">Annuleren</button>
	</p>

</form>
</body>
</html>