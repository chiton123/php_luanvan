<?php
include "connect.php";
$iduser = $_POST['iduser'];
$json = $_POST['jsonarray'];
$data = json_decode($json,true);


$timestamp = date('Y-m-d H:i:S', time());
$querydelete = "DELETE FROM candidate_profession WHERE cp_iduser = '$iduser'";
$resultdelete = mysqli_query($conn ,$querydelete);
if($resultdelete){
	foreach ($data as $value) {
		$iduser = $value['iduser'];
		$idprofession = $value['idprofession'];
		$query = "INSERT INTO candidate_profession values (null, '$iduser', '$idprofession', 
		'$timestamp', '$timestamp')";
		$result = mysqli_query($conn, $query);
	}
}





?>