<?php
include "connect.php";
// kind : 0 : thuc tap, 1: tu xa, 2: ban thoi gian, 3 toan thoi gian, 4 da ung tuyen, 5 quan tam, 6 moi nhat, 7 phu hop

$kind = $_POST['kind'];
// $kind = 7;
$page = $_GET['page'];
$checkarea = 0;
$area = "";
$checkskill = 0;
$skill = "";
$checkprofession = 0;
$profession = "";
if($kind == 7){
	$checkarea = $_POST['checkarea'];
	$area = $_POST['area'];
	$checkskill = $_POST['checkskill'];
	$skill = $_POST['skill'];
	$checkprofession = $_POST['checkprofession'];
	$profession = $_POST['profession'];

	// $checkarea = 1;
	// $area = '(59,62,63,5,7)';
	// $checkskill = 1;
	// $skill = '(1,2,3,4,5)';
	// $checkprofession = 1;
	// $profession = '(1,24,25)';
}


// $kind = 4;
// $page = $_GET['page'];
// $iduser = 0;
// if($kind == 5){
// 	$iduser = 27;
// }

$start = ((int)$page - 1) * 4;

class job{
	function job($id, $name, $idcompany,$id_recruiter, $img, $address, $idtype, $idprofession, $start_date, $end_date, $salary_min, $salary_max, $idarea, $area, $experience, $number, $description, $requirement, $benefit, $status,$company_name, $type_job )
	{
		$this->id = $id;
		$this->name = $name;
		$this->idcompany = $idcompany;
		$this->id_recruiter = $id_recruiter;
		$this->img = $img;
		$this->address = $address;
		$this->idtype = $idtype;
		$this->idprofession = $idprofession;
		$this->start_date = $start_date;
		$this->end_date = $end_date;
		$this->salary_min = $salary_min;
		$this->salary_max = $salary_max;
		$this->idarea = $idarea;
		$this->area = $area;
		$this->experience = $experience;
		$this->number = $number;
		$this->description = $description;
		$this->requirement = $requirement;
		$this->benefit = $benefit;
		$this->status = $status;
		$this->company_name = $company_name;
		$this->type_job = $type_job;
	}

}
$mang = array();
$query = "SELECT * FROM job j, company c, area a, typeofwork t, experience e where j.j_idcompany = c.c_id and a.ar_id = j.j_idarea and t.t_id = j.j_idtype and j.j_experience = e.e_id and j.j_status_delete = 0 and j.j_status_post = 0";


$queryToanTG  = " and t.t_id = 1";
$queryBanTG   = " and t.t_id = 2";
$queryThucTap = " and t.t_id = 3";
$queryLamTuXa = " and t.t_id = 4";

$queryMoiNhat = " order by j_id desc";

$queryPhuHop = "SELECT * FROM job j, company c, area a, typeofwork t, experience e, job_skill jk where j.j_idcompany = c.c_id and a.ar_id = j.j_idarea and t.t_id = j.j_idtype and j.j_experience = e.e_id
and j.j_status_delete = 0 and j.j_status_post = 0";

// area
if($checkarea == 1){
	$queryArea = " and j.j_idarea in " . $area;
	$queryPhuHop = $queryPhuHop . $queryArea;
}
// profession
if($checkprofession == 1){
	$queryProfession = " and j.j_idprofession in " . $profession;
	$queryPhuHop = $queryPhuHop . $queryProfession;
}
// skill
if($checkskill == 1){
	$querySkill = " and jk.js_idjob = j.j_id and jk.js_idskill in " . $skill;
	$queryPhuHop = $queryPhuHop . $querySkill;
}


if($kind == 0){
	$query = $query . $queryThucTap;
}

if($kind == 1){
	$query = $query . $queryLamTuXa;
}

if($kind == 2){
	$query = $query . $queryBanTG;
}

if($kind == 3){
	$query = $query . $queryToanTG;
}


if($kind == 6){
	$query = $query . $queryMoiNhat;
}

if($kind == 7){
	$query = $queryPhuHop;
}


$load = " LIMIT $start,4";


$query = $query . $load;
$data = mysqli_query($conn, $query);
while($row = mysqli_fetch_assoc($data)){
	array_push($mang, new job(
		$row['j_id'],
		$row['j_name'],
		$row['j_idcompany'],
		$row['c_idrecruiter'],
		$row['c_image'],
		$row['j_address'],
		$row['j_idtype'],
		$row['j_idprofession'],
		$row['j_start_date'],
		$row['j_end_date'],
		$row['j_salary_min'],
		$row['j_salary_max'],
		$row['j_idarea'],
		$row['ar_name'],
		$row['e_name'],
		$row['j_number'],
		$row['j_description'],
		$row['j_requirement'],
		$row['j_benefit'],
		$row['j_status'],
		$row['c_name'],
		$row['t_name']
	));

}
echo json_encode($mang);




?>