<?php
include "connect.php";

$idcompany = $_POST['idcompany'];
$iduser = $_POST['iduser'];


$query = "SELECT * FROM evaluation where ev_idcompany = '$idcompany' and ev_iduser = '$iduser'";

$result = mysqli_query($conn, $query);

$number = mysqli_num_rows($result);
// khi nó xóa -> status = 1 thì mới dc ứng tuyển lại nhe
if($number > 0){
	echo "yes";
}else{
	echo "no";
}


?>