<?php
if(isset($_POST['btn_add'])){
	$email_phone = $_POST['email_phone'];
	$password=$_POST['password'];


	
	$data_add=$db->get('account',array());
	
 
		$db->insert('account',array(
		
			'email_phone'=>$email_phone,
			'password'=>$password,
			'role'=>'user'
			
		));
		// code...
	}

header('location:?controller=trang_chu');

?>