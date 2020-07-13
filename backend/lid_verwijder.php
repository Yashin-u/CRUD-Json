<?php
// lees het config-bestand
require_once 'config.php';
require_once 'session.inc.php';

// haal het band id uit de url
$id = $_GET['id'];

// is het ID een nummer?
if (is_numeric($id)) {

// lees alle bands uit de tabel
$result = mysqli_query($con, "SELECT * FROM back2_leden WHERE id = $id");

	//is er een lid gevonden met dit ID?
	if (mysqli_num_rows($result) == 1) {
		//ja, lees het lid uit de dataset
		$row = mysqli_fetch_array($result);
	}


	else {
		echo "Geen lid gevonden.";
		exit;
	}
} else {
// het ID was geen nummer
	echo "Onjuist ID.";
	exit;
}

?>

<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Verwijderen</title>
	</head>

<body>
	
	<h1>lid verwijderen</h1>
	
		<p>
			Weet je zeker dat je lid
			<strong><?php echo $row['first_name']?></strong>
			wilt verwijderen?
		</p>
	
		<p>
			<a href="lid_verwijder_verwerk.php?id=<?php echo $id; ?>">Ja, verwijderen</a>

			<a href="lid_uitlees.php">Nee, terug</a>
		</p>
	
</body>
	
</html>