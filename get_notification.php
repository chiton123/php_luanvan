<?php
include "connect.php";

$iduser = $_POST['iduser'];
// $iduser = 33;
class notification{
	function notification($id, $ap_id, $job_id, $type_notification, $type_user, $id_user, $content,$status, $img, $date_read, $ap_status, $ap_note){
		$this->id = $id;
		$this->ap_id = $ap_id;
		$this->job_id = $job_id;
		$this->type_notification = $type_notification;
		$this->type_user = $type_user;
		$this->id_user = $id_user;
		$this->content = $content;
		$this->status = $status;
		$this->img = $img;
		$this->date_read = $date_read;
		$this->ap_status = $ap_status;
		$this->ap_note = $ap_note;
	}
}
$query = "SELECT * FROM application a, notification n, job j, company c where a.ap_id = n.n_id_application and n.n_iduser = '$iduser' and j.j_id = a.ap_jobid and c.c_id = j.j_idcompany and j.j_status_delete = 0 and j.j_status_post = 0 order by n.n_id desc";
$result = mysqli_query($conn, $query);
$mang = array();
while($row = mysqli_fetch_assoc($result)){
	array_push($mang, new notification(
		$row['n_id'],
		$row['ap_id'],
		$row['j_id'],
		$row['n_type_notification'],
		$row['n_type_user'],
		$row['n_iduser'],
		$row['n_content'],
		$row['n_status'],
		$row['c_image'],
		$row['n_read_at'],
		$row['ap_status'],
		$row['ap_note']
	));
}
echo json_encode($mang);



?>