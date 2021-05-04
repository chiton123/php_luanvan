<?php
include "connect.php";

class recruiter{
	function recruiter($id, $name,  $address, $email, $introduction,$phone, $status){
		$this->id = $id;
		$this->name = $name;
		$this->address = $address;
		$this->email = $email;
		$this->introduction = $introduction;
		$this->phone = $phone;
		$this->status = $status;
	}
}


$query = "SELECT * FROM recruiter";
$data = mysqli_query($conn, $query);
$mang = array();
while($row = mysqli_fetch_assoc($data)){
	array_push($mang, new recruiter(
		$row['r_id'],
		$row['r_name'],
		$row['r_address'],
		$row['r_email'],
		$row['r_introduction'],
		$row['r_phone'],
		$row['r_status'],
	));
}
echo json_encode($mang);

?>