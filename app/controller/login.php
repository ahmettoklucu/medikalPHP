<?php
    if(post('submit')){
        $user_email=post('user_email');
        $user_password=post('user_password');
        $recaptcha=post('g-recaptcha-response');
        if (isset($db)) {
            $row=User::UserExist($user_email);
            if ($row){
                $password_verify=password_verify($user_password,$row['user_password']);
                if ($password_verify){
                    if (!$recaptcha){
                        $error='ben robot değilim seçeneğine tiklayın';
                    }
                    else{
                        $ch = curl_init();
                        curl_setopt_array($ch, [
                            CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify',
                            CURLOPT_POST => true,
                            CURLOPT_POSTFIELDS => 'secret=6Ldd_6sjAAAAAKaw7UMzTyc-1wyDPFiqRH-hntNd&response=' . $recaptcha,
                            CURLOPT_RETURNTRANSFER => true
                        ]);
                        $output = curl_exec($ch);
                        curl_close($ch);

                        $result = json_decode($output, true);
                        if ($result['success'] === false){
                            $error= 'Ben robot değilim seçeneğini işaretleyin!';
                        } else {
                            $success='Başarıyla giriş yaptınız.';
                            User::login($row);
                            header('Refresh:2;url='.site_url());
                        }
                    }
                }else{
                    $error='Lütfen şifrenizi kontrol ediniz.';
                }
            }
            else{
                $error='E-Mail adresini yanlış girdiniz lütfen kontrol ediniz.';
            }
        }

    }
    require view('login');
