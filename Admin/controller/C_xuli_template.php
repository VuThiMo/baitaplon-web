<?php
// kiểm tra người dùng có đăng nhập ko?
if(isset($_SESSION['ss_admin_nhanvien'])){
	$user = $db->get('admin', array('id'=>$_SESSION['ss_admin_nhanvien']));
	// kiểm tra người dùng muốn làm gì
    switch ($_GET['method']) {
    	case 'edit':
    	// lấy id trên url
    		$id=$_GET['id'];
    		// lấy dữ liệu người dùng theo id
    		$data_template=$db->get('theme',array('id'=>$id));
    		if(isset($_POST['btn_edit'])){
    			
    			$content=$_POST['content'];
    			// kiểm tra giá trị người dùng nhập
    			$error=array();
    			
    			if ($content=='') {
    				$error['content']="content không được để trống";

    			}
    			//update database
    			if (!$error) {
    				$db->update('theme',array(
    					'content'=>$content
    					
    				),array('id'=>$id));
    				header('location:?controller=template');
    			
          
    				
    			}

    		}
    		require_once('./view/V_xuli_template.php');
    		break;
    	    // xóa 
    	    case 'dele':
    	    	$id=$_GET['id'];
    	    	$db->delete('theme',array('id'=>$id));
    	    	// chuyển về trang chủ
    	    	header('location:?controller=template');
    	    	break;
    	default:
    		header('location:?controller=template');
    		break;
    }
}
else{
	header('location:?controller=login');
}


?>