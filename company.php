<?php
include "connect.php";

$idcompany = $_POST['idcompany'];
// $idcompany = 1;
class company{
	function company($id, $name, $introduction, $address, $idarea, $idowner, $image, $image_background, $website, $size, $number_job, $vido, $kinhdo){
		$this->id = $id;
		$this->name = $name;
		$this->introduction = $introduction;
		$this->address = $address;
		$this->idarea = $idarea;
		$this->idowner = $idowner;
		$this->image = $image;
		$this->image_background = $image_background;
		$this->website = $website;
		$this->size = $size;
		$this->number_job = $number_job;
		$this->vido = $vido;
		$this->kinhdo = $kinhdo;
	}
}
function getNumberJob($idcompany){
	global $conn;
	$query4 = "SELECT * FROM job WHERE j_idcompany = '$idcompany' and j_status_delete = 0 and 
	j_status_post = 0";
	$resutl4 = mysqli_query($conn, $query4);
	if($resutl4){
		$work = mysqli_num_rows($resutl4);
		//echo "s: " . $work;
	}
	return $work;
}
$query = "SELECT * FROM company where c_id = '$idcompany'";
$data = mysqli_query($conn, $query);
$mang = array();
while($row = mysqli_fetch_assoc($data)){
	array_push($mang, new company(
		$row['c_id'],
		$row['c_name'],
		$row['c_introduction'],
		$row['c_address'],
		$row['c_idarea'],
		$row['c_idrecruiter'],
		$row['c_image'],
		$row['c_image_background'],
		$row['c_website'],
		$row['c_size'],
		getNumberJob($row['c_id']),
		$row['latitude'],
		$row['longitude']));

}
echo json_encode($mang);




?>