<?php
// gọi hàm get
// chuyển bảng cần lấy vào hàm get
// truyền vào tên bảng và điều kiện
// lưu dữ liệu vào biến product

if(isset($_GET['keyword'])){
	$keyword=$_GET['keyword'];
	$account=$db->get_like('account','email_phone',$keyword);
	
}
else{
$account=$db->get('account',array());
}


require_once('./view/V_trangchu.php');


?>