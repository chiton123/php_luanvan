<?php
include "connect.php";
// $iduser = 8;

$iduser = $_POST['iduser'];
$status = $_POST['status'];

$timestamp = date('Y-m-d H:i:S', time());

$query = "UPDATE user set u_status = '$status', date_update = '$timestamp' where u_id = '$iduser'";
// $query = "UPDATE user set u_name = '$name',u_address = '$address', u_gender = '$gender', u_email = '$email' where u_id = '$iduser'";
$result = mysqli_query($conn, $query);
if($result){
	echo "success";
}else {
	echo "fail";
}


?>