<?php
include "connect.php";
// 0: candidate, 1: recruiter

$iduser = $_POST['iduser'];

// $iduser = 27;

$query = "SELECT * FROM user where u_id = '$iduser'";
$result = mysqli_query($conn, $query);

$r = mysqli_fetch_array($result);
$mode = $r['u_mode'];

echo $mode;



?>