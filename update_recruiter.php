<?php
include "connect.php";
// $iduser = 8;
// $name = 'tuanabc';
// $address = 'abcae';
// $gender = 0;
// $email = 'tuan@gmail.com';
// $phone = '932938282';
// $position = 'dba';
// $birthday = '1988-12-20';
// $introduction = 'hhaa';

$idrecruiter = $_POST['idrecruiter'];
$name = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$introduction = $_POST['introduction'];
$timestamp = date('Y-m-d H:i:S', time());

$query = "UPDATE recruiter set r_name = '$name', r_address = '$address', r_email = '$email', r_phone = '$phone', r_introduction = '$introduction', date_update = '$timestamp' where r_id = '$idrecruiter'";
// $query = "UPDATE user set u_name = '$name',u_address = '$address', u_gender = '$gender', u_email = '$email' where u_id = '$iduser'";
$result = mysqli_query($conn, $query);
if($result){
	echo "success";
}else {
	echo "fail";
}


?>