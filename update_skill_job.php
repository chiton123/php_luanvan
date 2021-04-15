<?php
include "connect.php";
$idjob = $_POST['idjob'];
$json = $_POST['jsonarray'];
$data = json_decode($json,true);


$timestamp = date('Y-m-d H:i:S', time());
$querydelete = "DELETE FROM job_skill WHERE js_idjob = '$idjob'";
$resultdelete = mysqli_query($conn ,$querydelete);
if($resultdelete){
	foreach ($data as $value) {
		$idjob = $value['idjob'];
		$idskill = $value['idskill'];
		$query = "INSERT INTO job_skill values (null, '$idjob', '$idskill', 
		'$timestamp', '$timestamp')";
		$result = mysqli_query($conn, $query);
	}
}





?>