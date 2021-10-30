<?php
if(isset($_POST['btn_add'])){
	
	$content=$_POST['content'];


	
	$data_addtemplate=$db->get('theme',array());
	
 
		$db->insert('theme',array(
		
			
			'content'=>$content
						
		));
		// code...
	}

header('location:?controller=template');

?>