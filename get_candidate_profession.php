<?php
include "connect.php";

$iduser = $_POST['iduser'];
// $iduser = 33;

class profession{
	function profession($id, $name){
		$this->id = $id;
		$this->name = $name;
	}
}

$query = "SELECT * FROM profession p, candidate_profession cp where p.p_id = cp.cp_idprofession and cp_iduser = '$iduser'";
$data = mysqli_query($conn, $query);
$mang = array();
while($row = mysqli_fetch_assoc($data)){
	array_push($mang, new profession(
		$row['p_id'],
		$row['p_name'] ));
}
echo json_encode($mang);




?>