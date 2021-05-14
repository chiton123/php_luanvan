<?php
include "connect.php";

$email = $_POST['email'];

// $email = 'hai@gmail.com';


$query = "SELECT * FROM user WHERE u_email = '$email'";

$result = mysqli_query($conn, $query);

$number = mysqli_num_rows($result);

if($number > 0){
    echo "success";
}else{
    echo "fail";
}





?>