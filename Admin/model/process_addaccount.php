<?php
include 'model/database.php';

    $emailphone = $_POST['email_phone'];
    $pass= $_POST['password'];
    
    

    
    // Bước 02:
    $sql = "INSERT INTO account (email_phone, password)
    VALUES ('$emailphone','$password')";

    echo $sql;
    $result = mysqli_query($conn,$sql);
    // Bước 03:
    if($result > 0){
        header("Location:controller/C_trang_chu.php");
    }else{
        echo "Lỗi!";
    }


    //Bước 04: Đóng kết nối
    mysqli_close($conn);


?>