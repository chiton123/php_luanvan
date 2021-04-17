<?php
include "connect.php";

$iduser = $_POST['iduser'];
// $iduser = 33;

class area{
	function area($id, $name){
		$this->id = $id;
		$this->name = $name;
	}
}

$query = "SELECT * FROM area a, candidate_area c where a.ar_id = c.ca_idarea and ca_iduser = '$iduser'";
$data = mysqli_query($conn, $query);
$mang = array();
while($row = mysqli_fetch_assoc($data)){
	array_push($mang, new area(
		$row['ar_id'],
		$row['ar_name'] ));
}
echo json_encode($mang);




?>