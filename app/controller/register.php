<?php
if(post('submit')){


    $user_name=post('user_name');
    $user_sure_name=post('user_sure_name');
    $user_email=post('user_email');
    $user_password=post('user_password');
    $password_again=post('password_again');
    $code=md5(rand(0,1000));
    if (!filter_var($user_email,FILTER_VALIDATE_EMAIL))
    {
        $error='Lütfen E-mail adresinizi giriniz.';
    }
    elseif ($user_password !=$password_again)
    {
        $error='Girdiğiniz şifreler birbiriyle uyuşmuyor';
    }
    elseif (!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/",$user_password))
    {
        $error="Şifrede büyük harf, küçük harf, rakam , özel karakter içermeli ve en az 10 karakterden olmalıdır.";
    }
    else
    {
        if (isset($db)) {
           $row=User::UserExist($user_email);
            if($row){
                $error='Bu e-posta adresi zaten kullanılıyor. Lütfen giriş yapınız.';
            }else{
                if (isset($db)){
                    $url=$user_name.'/'.$user_sure_name;
                    $roleid=3;
                    $subject='Kullanıcı Aktivasyon işlemi';
                    $messege='Lütfen hesabınızı aktive etmek için aşağıdaki linke tiklayın:'.
                        site_url('/aktivasyon?email='.$user_email.'&kod='.$code);
                    $result= mailsend($user_email,$user_name,$user_sure_name,$subject,$messege);
                    if ($result==true){
                        $result=User::Register([$user_name,$user_sure_name,$user_email,password_hash($user_password,PASSWORD_DEFAULT) ,selflink($url),$roleid,$code]);
                        if($result)
                        {
                            $success='Üyeliğiniz başarıyla oluşturuldu. Mailinizden aktivasyon işlemini gerçekleştirmeniz gerekmektedir.';
                            header('Refresh:2;url=' . site_url());
                        }
                        else
                        {
                            $error='Bir sorun oluştu,Lütfen daha sonra tekrar deneyiniz.';
                        }
                    }
                    else{
                        $error=$result;
                    }
                }else{
                    $error='Bir sorun oluştu,Lütfen daha sonra tekrar deneyiniz.';
                }
            }
        }
    }
}
require view('register');