<?php
if (session('user_role_id')){

    if (post('submit')) {
        $id=session('user_id');
        if (isset($db)) {
            $query = $db->prepare('SELECT * FROM users WHERE user_id=?');
        }
        $query->execute([
            $id,
        ]);
        $user= $query->fetch(PDO::FETCH_ASSOC);
        $oldpassword=post('old-password');
        $password=post('password');
        $password_again=post('password-again');
        $password_verify=password_verify($oldpassword,$user['user_password']);
        if ($password_verify){
            if ($password_again!=$password){
                $error='şifreler birbir ile uyuşmamaktadir';
            }else
            {
                if (!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/",$password))
                {
                    $error="Şifrede büyük harf, küçük harf, rakam , özel karakter içermeli ve en az 10 karakterden olmalıdır.";
                }
                else {
                    if (isset($db)) {
                        $query = $db->prepare("UPDATE users SET  
                                                    user_password=?
                                                    WHERE users.user_id=?
                     ");
                        $row = $query->execute([password_hash($password, PASSWORD_DEFAULT), $id]);
                        $success='Şifreniz başari ile güncellendi';
                    }
                    else{
                        $error='bir sorun oluştu tekrar deneyiniz';
                    }
                }
            }
        }
            else{
            $error='Lütfen şifrenizi kontrol ediniz.';
        }
    }
    require view('edit-password');
}else{
    require view('404');
}