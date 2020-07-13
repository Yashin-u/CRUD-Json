<?php
// lees het config-bestand
require_once 'config.php';
require_once 'session.inc.php';

// haal het band id uit de url
$id = $_GET['id'];

// is het ID een nummer?
if (is_numeric($id)) {
	//verwijder het lid uit de database
	$result = mysqli_query($con,  "DELETE FROM back2_leden WHERE id = $id");

	
	//controleer het resultaat
	if ($result) {
		// alles OK, stuur naar de homepage
		echo "Lid is verwijderd!";
		echo "<p><a href='lid_uitlees.php'>TERUG</a></p>";
	exit;
	} else {
		echo 'Er ging wat mis met het verwijderen!';
	}
} else {
// het ID was geen nummer
	echo "Onjuist ID.";
	exit;
}
?>