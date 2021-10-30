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
    	$data_admin=$db->get('account',array('id'=>$id));
    	if(isset($_POST['btn_edit'])){
    			$email_phone=$_POST['email_phone'];
    			$password=$_POST['password'];
    			// kiểm tra giá trị người dùng nhập
    			$error=array();
    	if ($email_phone=='') {
    				$error['email_phone']="email or sđt không được để trống";
    			}
    	if ($password=='') {
    				$error['password']="password không được để trống";
                            }
        //update database
    	if (!$error) {
    				$db->update('account',array(
    					'email_phone'=>$email_phone,
    					'password'=>$password
    				),array('id'=>$id));
    				header('location:?controller=trang_chu');
    				
  }
}
    	require_once('./view/V_xuli_admin.php');
    		break;
    		// xóa 
    	    case 'dele':
    	    	$id=$_GET['id'];
             
              $db->delete('account',array('id'=>$id));
                     // chuyển về trang chủ
              header('location:?controller=trang_chu');
              
    	    	
    	    	break;
    	default:
    		header('location:?controller=trang_chu');
    		break;
    

   }
}

?>