<?php
## database logingegevens ##
$db_hostname = 'localhost'; // Deze laat je zo staan!
$db_username = '84122_front'; // hier komt jouw FTP username
$db_password = 'Iliyas741';
//--> Bijv. :: https://passwordsgenerator.net/
$db_database = '84122_FRONT'; // Je kan maximaal 5 databases aanmaken op https://pma.ict-lab.nl/



## Onderstaande gegevens hoef je niet aan te passen, maar de variabel $con moet je in je verdere scripts gebruiken, 
## of deze hernoemen welke variabelenaam jouw voorkeur heeft:

## maak de database-verbinding ##
$con = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);


## controleer connectie ##
if ($con -> connect_errno) {
    printf("Connect failed: %s\n", $con -> connect_error);
    exit();
}

##  Nu zorg ik ervoor dat de bovenstaande user/pass niet later op de pagina ##
##  waar deze ge-included wordt, uitgelezen kan worden. ##
unset($DB_user, $DB_password);
?>