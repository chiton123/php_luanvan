<?php
include "connect.php";

$iduser = $_POST['iduser'];
$company = $_POST['company'];
$position = $_POST['position'];
$start = $_POST['start'];
$end = $_POST['end'];
$description = $_POST['description'];
$timestamp = date('Y-m-d H:i:S', time());
$query = "INSERT INTO candidate_experience values (null, '$iduser', '$company', '$position', '$start'
,'$end','$description', '$timestamp', '$timestamp')";
$result = mysqli_query($conn , $query);

if($result){
	$query1 = "SELECT * FROM candidate_experience where date_create = '$timestamp'";
	$result1 = mysqli_query($conn, $query1);
	if($result1){
		$r = mysqli_fetch_array($result1);
		echo $r['0'];
	}else{
		echo "fail";
	}
}else{
	echo "fail";
}



?>