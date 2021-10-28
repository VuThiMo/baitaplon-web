<?php
if(isset($_POST['btn_add'])){
	$email_phone = $_POST['email_phone'];
	$password=$_POST['password'];
   $id=null;

	
	$data_add=$db->get('account',array());
	
 
		$db->insert('account',array(
			'id'=>$id,
			'email_phone'=>$email_phone,
			'password'=>$password
			
			
		));
		// code...
	}

header('location:?controller=trang_chu');

?>