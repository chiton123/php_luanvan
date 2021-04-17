<?php
include "connect.php";

$iduser = $_POST['iduser'];
$status = $_POST['status'];
// $iduser = 33;



$query = "UPDATE user set u_mode = '$status' where u_id = '$iduser'";
$data = mysqli_query($conn, $query);
if($data){
	echo "success";
}else{
	echo "fail";
}





?>