<?php
include "connect.php";

// status_post: đang hiển thị: 0, chờ xác thực : 1, 2: từ chối
// status: dừng tuyển hay k

$position = $_POST['position'];
$idcompany = $_POST['idcompany'];
$address = $_POST['address'];
$benefit = $_POST['benefit'];
$description = $_POST['description'];
$requirement = $_POST['requirement'];
$number = $_POST['number'];
$salary_min = $_POST['salary_min'];
$salary_max = $_POST['salary_max'];
$start = $_POST['start'];
$end = $_POST['end'];
$idarea = $_POST['idarea'];
$idprofession = $_POST['idprofession'];
$idexperience = $_POST['idexperience'];
$idKindJob = $_POST['idKindJob'];

// $position = 'aaa';
// $address = 'aaa';
// $benefit = 'aaa';
// $description ='aaa';
// $requirement = 'aaa';
// $number = 3;
// $salary_min =200;
// $salary_max =300;
// $start = '2021-02-12 21:00:24';
// $end = '2021-02-12 21:00:24';
// $idarea =1;
// $idprofession = 2;
// $idexperience = 2;
// $idKindJob = 2;
// $idcompany = 1;

$timestamp = date('Y-m-d H:i:S', time());
$query = "INSERT INTO job values (null, '$position', '$idcompany','$idKindJob','$idprofession','$salary_min', '$salary_max', '$idarea','$address', '$idexperience', '$number', '$start', '$end',
	'$description', '$requirement', '$benefit', 0, 0, 1,'', '$timestamp', '$timestamp')";
$result = mysqli_query($conn, $query);
if($result){
	$query1 = "SELECT * FROM job WHERE j_idcompany = '$idcompany' and date_create = '$timestamp'";
	$result1 = mysqli_query($conn, $query1);
	if($result1){
		$r = mysqli_fetch_row($result1);
		$idjob = $r['0'];
		echo "success" . $idjob;
	}else{
		echo "fail";
	}
	
}else {
	echo "fail";
}



?>