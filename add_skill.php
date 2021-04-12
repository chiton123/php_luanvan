<?php
include "connect.php";

$iduser = $_POST['iduser'];
$idskill = $_POST['idskill'];
$star = $_POST['star'];
$description = $_POST['description'];
$timestamp = date('Y-m-d H:i:S', time());
$query = "INSERT INTO candidate_skill values (null, '$iduser', '$idskill', '$star', 
'$description', '$timestamp', '$timestamp')";
$result = mysqli_query($conn , $query);
if($result){
	$query1 = "SELECT * FROM candidate_skill WHERE ck_iduser = '$iduser' and date_create = '$timestamp'";
	$result1 = mysqli_query($conn, $query1);
	if($result1){
		$r = mysqli_fetch_row($result1);
		echo $r['0'];
	}else{
		echo "fail";
	}
}else{
	echo "fail";
}



?>