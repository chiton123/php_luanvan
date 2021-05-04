<?php
include "connect.php";

$idcompany = $_POST['idcompany'];
$name = $_POST['name'];
$address = $_POST['address'];
$size = $_POST['size'];
$website = $_POST['website'];
$idarea = $_POST['idarea'];
$introduction = $_POST['introduction'];
$timestamp = date('Y-m-d H:i:S', time());

// $idcompany = 3;
// $name = 'TIKI CORPORATION';
// $address = 'Tòa nhà Viettel, 285 Cách Mạng Tháng Tám, Phường 12, Quận 10, Hồ Chí Minh';
// $size = '1000+ nhân viên';
// $website = 'https://tuyendung.tiki.vn/';
// $idarea = 1;
// $introduction = 'Tiki viết tắt của "Tìm kiếm & Tiết kiệm", hiện là trang mua sắm trực tuyến đáng tin cậy nhất trong lĩnh vực thương mai điện tử tại Việt Nam.

// Tiki còn được biết đến với dịch vụ TikiNow mang đến trải nghiệm nhận hàng nhanh trong 2 giờ duy nhất tại Việt Nam hiện nay. Tiki hiện đang cung cấp hơn 500,000 sản phẩm của hơn 6,500 thương hiệu uy tín, đáp ứng nhu cầu mua sắm đa dạng của khách hàng từ Sách, Sản phẩm điện tử, Dịch vụ số, Hàng gia dụng, Mẹ & Bé, Thời trang, Làm đẹp & Chăm sóc sức khỏe, cho đến Bách hóa online.

// Với tầm nhìn: "Trang thương mại điện tử tin cậy nhất Việt Nam" và sứ mệnh: "Mang trải nghiệm mua sắm trực tuyến tốt nhất đến khách hàng". Sau hơn 8 năm hoạt động với những bước phát triển nhanh chóng, Tiki tự hào đứng trong Top 10 doanh nghiệp có ảnh hưởng lớn nhất đối với việc phát triển Internet Việt Nam trong suốt thập kỷ vừa qua (2007-2017) do Hiệp hội Internet Việt Nam bình chọn. ';
// $timestamp = date('Y-m-d H:i:S', time());



$query = "UPDATE company set c_name = '$name', c_address = '$address', c_introduction = '$introduction', 
c_idarea = '$idarea', c_size = '$size', c_website = '$website', date_update = '$timestamp' where c_id = '$idcompany'";
// $query = "UPDATE user set u_name = '$name',u_address = '$address', u_gender = '$gender', u_email = '$email' where u_id = '$iduser'";
$result = mysqli_query($conn, $query);
if($result){
	echo "success";
}else {
	echo "fail";
}


?>