<?php

if(isset($_SESSION['ss_admin_nhanvien'])){
	header('location:?controller=trangchu');
}
if(isset($_POST['btn_login'])){
	$email_phone = $_POST['email_phone'];
	$password =$_POST['password'];

	$error = array();

	if($email_phone==''){
		$error['email_phone'] = "Username không được để trống";
	}
	if($password==''){
		$error['password']="password không đc để trống";
	}
	if(!$error){
		$user = $db->get('account', array('email_phone'=>$email_phone));
		
		if(empty($user)){
			$error['email_phone']="Tai khoan không tồn tại";
		}
		else{
			if($password!=$user[0]['password']){
				$error['password']="sai mật khẩu";
			}
		}
	}

	if(!$error){
		$_SESSION['ss_admin_nhanvien']=$user[0]['id'];
		header('location:?controller=trang_chu');
		
		
	}
	
	
}

require_once('./view/V_login.php');




?>

