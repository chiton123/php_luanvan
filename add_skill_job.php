<?php
include "connect.php";

$json = $_POST['jsonarray'];
$data = json_decode($json,true);


$timestamp = date('Y-m-d H:i:S', time());
foreach ($data as $value) {
	$idjob = $value['idjob'];
	$idskill = $value['idskill'];
	$query = "INSERT INTO job_skill values (null, '$idjob', '$idskill', '$timestamp', '$timestamp')";
	$result = mysqli_query($conn, $query);
}



?>