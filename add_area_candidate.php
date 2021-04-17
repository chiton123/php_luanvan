<?php
include "connect.php";
$iduser = $_POST['iduser'];
$json = $_POST['jsonarray'];
$data = json_decode($json,true);


$timestamp = date('Y-m-d H:i:S', time());
$querydelete = "DELETE FROM candidate_area WHERE ca_iduser = '$iduser'";
$resultdelete = mysqli_query($conn ,$querydelete);
if($resultdelete){
	foreach ($data as $value) {
		$iduser = $value['iduser'];
		$idarea = $value['idarea'];
		$query = "INSERT INTO candidate_area values (null, '$iduser', '$idarea', 
		'$timestamp', '$timestamp')";
		$result = mysqli_query($conn, $query);
	}
}





?>