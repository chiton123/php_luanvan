<?php
require "connect.php";
$idposition = $_POST['idposition'];
$checkarea = $_POST['checkarea'];
$area = $_POST['area'];

// $idposition = 0;
// $area = '(1,2,3)';
class user{
	function user($iduser,$idposition, $position, $idcv, $user_id_f, $username, $birthday, $gender, $address, 
		$email, $introduction,$phone, $mode, $experience, $study, $idarea, $area){
		$this->iduser = $iduser;
		$this->idposition = $idposition;
		$this->position = $position;
		$this->idcv = $idcv;
		$this->user_id_f = $user_id_f;
		$this->username = $username;
		$this->birthday = $birthday;
		$this->gender = $gender;
		$this->address = $address;
		$this->email = $email;
		$this->introduction = $introduction;
		$this->phone = $phone;
		$this->mode = $mode;
		$this->experience = $experience;
		$this->study = $study;
		$this->idarea = $idarea;
		$this->area = $area;
	}
}

function getExperience($iduser){
	global $conn;
	$company = "";
	$query1 = "SELECT * FROM candidate_experience WHERE ce_iduser = '$iduser'";
	$resutl1 = mysqli_query($conn, $query1);
	if($resutl1){
		while($row = mysqli_fetch_assoc($resutl1)){
			$company = $company . $row['ce_company'] . " - " . $row['ce_position'] . ".";
		}
		
	}
	return $company;
}


function getStudy($iduser){
	global $conn;
	$school = "";
	$query1 = "SELECT * FROM candidate_study WHERE cs_iduser = '$iduser'";
	$resutl1 = mysqli_query($conn, $query1);
	if($resutl1){
		while($row = mysqli_fetch_assoc($resutl1)){
			$school = $school . $row['cs_school'] . " - " . $row['cs_major'] . ".";
		}
		
	}
	return $school;
}


$mang = array();
$query = "SELECT * FROM user u, position p, cv c, candidate_area ca, area a WHERE u.u_id = ca.ca_iduser
	and c.cv_iduser = u.u_id and c.cv_main = 1 and u.u_idposition = p.po_id and ca.ca_idarea = a.ar_id
	and u.u_status = 0";
$queryPosition = " and u.u_idposition = '$idposition'";

$queryArea = " and ca.ca_idarea in " . $area;
if($idposition != 0){
	$query = $query . $queryPosition;
}
if($checkarea == 1){
	$query = $query . $queryArea;
}



$data = mysqli_query($conn, $query);
while($row = mysqli_fetch_assoc($data)){
	array_push($mang, new user(
		$row['u_id'],
		$row['u_idposition'],
		$row['po_name'],
		$row['cv_id'],
		$row['u_id_firebase'],
		$row['u_name'],
		$row['u_birthday'],
		$row['u_gender'],
		$row['u_address'],
		$row['u_email'],
		$row['u_introduction'],
		$row['u_phone'],
		$row['u_mode'],
		getExperience($row['u_id']),
		getStudy($row['u_id']),
		$row['ca_idarea'],
		$row['ar_name'],
	));
}
echo json_encode($mang);



?>