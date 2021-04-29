<?php
include "connect.php";

$job_id = $_POST['job_id'];

$position = $_POST['position'];
$address = $_POST['address'];
$benefit = $_POST['benefit'];
$description = $_POST['description'];
$requirement = $_POST['requirement'];
$number = $_POST['number'];
$salary_min = $_POST['salary_min'];
$salary_max = $_POST['salary_max'];
$start = $_POST['start'];
$end = $_POST['end'];
$idarea = $_POST['idarea'];
$idprofession = $_POST['idprofession'];
$idexperience = $_POST['idexperience'];
$idKindJob = $_POST['idKindJob'];

// $job_id = 34;

// $position = 'System Engineer/ Database Administrator';
// $address = 'Đường D1, Khu công nghệ cao, phường Tân Phú, Quận 9, TPHCM';
// $benefit = 'Premium healthcare package for you and family.
// Attractive salary and good benefits will be exchanged directly at the interview.
// 13th month salary, annual salary review.
// 2 -5 months’ salary bonus based on performance.
// Working for one of the biggest payment system in the world, co-working with other international finance institution system to deliver the smoothly payment experience to customer.
// Opportunity to frequently travel to China and South East Asia countries.
// Join a young, friendly and dynamic team in an international and professional working environment.';
// $description ='
// Middleware, PAAS, IAAS daily operation and maintenance, including: network, IDC, NTP, DNS, YUM, ECS, OS, SLB, OSS, AFS.
// SAAS layer operation and maintenance work, such as capacity expansion, shrinking, application release, machine failure and so on.
// Carry out PAAS and IAAS fault detection capability (monitoring, alarm), emergency handling.';
// $requirement = 'You have 5+ years’ experience in a role as System Engineer, or Software Engineer, or Database Administrator (DBA) who excited by working on improving the reliability.
// You have good knowledge on networks, hardware, IAAS, PAAS, etc.
// You have strong interests on diving into different system architectures and understand the system limitation and are curious to solve the problems with systematic methodologies.
// You are organized with your work and would love to share your thoughts and solutions with the team via documentations and presentations.
// You have coding experience in high concurrent, high available environment with any languages like Java/ Golang/ Python/ Shell, etc.';
// $number = 3;
// $salary_min =15000000;
// $salary_max = 20000000;
// $start = '2021-04-12 21:00:24';
// $end = '2021-07-12 21:00:24';
// $idarea =63;
// $idprofession = 24;
// $idexperience = 2;
// $idKindJob = 1;

$timestamp = date('Y-m-d H:i:S', time());
$query = "UPDATE job set j_name = '$position', j_address = '$address', j_benefit = '$benefit',
j_description = '$description', j_requirement = '$requirement', j_number = '$number', j_salary_min = '$salary_min', j_salary_max = '$salary_max',j_start_date = '$start', j_end_date = '$end', j_idtype = '$idKindJob', j_idprofession = '$idprofession',j_idarea = '$idarea', j_experience = '$idexperience', date_update = '$timestamp' where j_id = '$job_id'";
$result = mysqli_query($conn, $query);
if($result){
	echo "success";
}else {
	echo "fail";
}



?>