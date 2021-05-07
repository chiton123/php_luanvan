<?php
include "connect.php";
$iduser = $_POST['iduser'];
// $iduser = 33;

class user{
	function user($id,$idposition, $position, $name, $birthday, $gender, $address, $email, $introduction,$phone, $status, $mode){
		$this->id = $id;
		$this->idposition = $idposition;
		$this->position = $position;
		$this->name = $name;
		$this->birthday = $birthday;
		$this->gender = $gender;
		$this->address = $address;
		$this->email = $email;
		$this->introduction = $introduction;
		$this->phone = $phone;
		$this->status = $status;
		$this->mode = $mode;
	}
}

// Lấy vị trí
function getPosition($iduser){
	global $conn;
	$query1 = "SELECT * FROM user u, position p WHERE u.u_idposition = p.po_id and u.u_id = '$iduser'";
	$resutl1 = mysqli_query($conn, $query1);
	if(mysqli_num_rows($resutl1)){
		$r = mysqli_fetch_array($resutl1);
		$position = $r['po_name'];
	}else{
		$position = "";
	}
	return $position;
}

$query = "SELECT * FROM user u where u_id = '$iduser'";
$data = mysqli_query($conn, $query);
$mang = array();
while($row = mysqli_fetch_assoc($data)){
	array_push($mang, new user(
		$row['u_id'],
		$row['u_idposition'],
		getPosition($row['u_id']),
		$row['u_name'],
		$row['u_birthday'],
		$row['u_gender'],
		$row['u_address'],
		$row['u_email'],
		$row['u_introduction'],
		$row['u_phone'],
		$row['u_status'],
		$row['u_mode']
	));
}
echo json_encode($mang);

?>