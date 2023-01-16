<?php
$email=get('email');
$kod=get('kod');
if (isset($db)) {
    if (isset($db)) {
        $query = $db->prepare('SELECT user_email,user_code,user_aktivasyon FROM users WHERE 
                                                         user_email=? AND
                                                         user_code=? AND
                                                         user_aktivasyon=0
                                                         ');
        $users= $query->execute([$email,$kod]);
        if($users){
            $query = $db->prepare('UPDATE users SET user_aktivasyon=1  WHERE 
                                                         user_email=? AND
                                                         user_code=? AND
                                                         
                                                         ');
            $row= $query->execute([$email,$kod]);
            if($row){
                User::login($users);
                $success='Aktivasyon işlemi başarili';
                header( site_url());
            }
            else{
                $error='Geçersiz url ya da zaten aktivasyon işlemi yaptiniz';
                header( site_url());
            }
        }
    }


}

