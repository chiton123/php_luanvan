<?php
include "connect.php";

$idjob = $_POST['idjob'];
// $idjob = 49;

class skill{
	function skill($id, $name){
		$this->id = $id;
		$this->name = $name;
	}
}

$query = "SELECT * FROM skill s, job_skill j where s.sk_id = j.js_idskill and j.js_idjob = '$idjob'";
$data = mysqli_query($conn, $query);
$mang = array();
while($row = mysqli_fetch_assoc($data)){
	array_push($mang, new skill(
		$row['sk_id'],
		$row['sk_name'] ));
}
echo json_encode($mang);




?>