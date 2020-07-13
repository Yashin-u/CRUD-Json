<?php
// lees het config bestand
require 'config.php';



$data = [];
$result = mysqli_query($con, "SELECT * FROM `front2_leden`");
while ($row = mysqli_fetch_array($result)) {
    $data[] = $row;
}

echo json_encode($data);
