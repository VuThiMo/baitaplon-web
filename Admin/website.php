<?php
// http://localhost/baitaplon-web/admin/website.php
// lấy từ session thông tin DB hiển thị trang web người dùng
session_start();
$_SESSION["account"] = 'namnd2';
require('./model/M_Account.php');
$MAccount = new M_Account();
// kiểm tra trên url có biên controller ko?
if(isset($_GET['website'])){
	// lấy giá trị của website
	$website=$_GET['website'];
}
// nếu ko có về trang chủ
else{
	$website='login';
}
$result = $MAccount->getAccountByEmailPhone($_SESSION["account"]);
echo $result[0]['email_phone'];
echo $result[0]['password'];



?>