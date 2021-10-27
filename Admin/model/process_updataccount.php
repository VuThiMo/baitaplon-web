<?php  
    include 'database.php'; 


           $mailphone=$_POST['email_phone'];
           $pass= $_POST['password'];
            $sql="UPDATE account set mail_phone='$mailphone', password='$pass'
             where password='$pass'";

            $result = mysqli_query($conn,$sql);
    // Bước 03:
           if($result > 0)
            header("Location:controller/C_trang_chu.php");
              else
                    echo ("lỗi");
                         
 ?>