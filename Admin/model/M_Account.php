<?php
require('database.php');
class M_Account {

    public function getAccountByEmailPhone($email_phone){
        $db = new database();
        $condition = array(
            'email_phone' => $email_phone
        );
        return $db->get('account', $condition);
    }

    public function createAccount($email_phone, $phone){
        $db = new database();
        $data = array(
            'email_phone' => $email_phone, 
            'password' => $phone
        );
        return $db->insert('account', $data);
    }

}


?>