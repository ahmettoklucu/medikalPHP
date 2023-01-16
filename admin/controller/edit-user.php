<?php
if(session('user_role_id')==1) {
    $id = get('id');
    if (!$id) {
        header('Location:' . admin_url('index'));
        exit();
    }
    if (isset($db)) {
        $query = $db->prepare('SELECT * FROM users WHERE user_id=?');
        $query->execute([$id]);
        $row = $query->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            header('Location' . admin_url());
            exit();
        }
        $query = $db->prepare('SELECT * FROM roles');
        $query->execute();
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    }
    if (post('submit')) {
        $user_name = post('user_name') ? post('user_name') : $row['user_name'];
        $user_sure_name = post('user_sure_name') ? post('user_sure_name') : $row['user_sure_name'];
        $user_email = post('user_email') ? post('user_email') : $row['user_email'];
        $user_role_id = post('user_role_id') ? post('user_role_id') : $row['user_role_id'];
        if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
            $error = 'Lütfen E-mail adresinizi giriniz.';
        } else {
            if (isset($db)) {
                $query = $db->prepare('SELECT * FROM users WHERE user_email=? &&user_id !=?');
                $query->execute([
                    $user_email,
                    $id
                ]);
                $row = $query->fetch(PDO::FETCH_ASSOC);
                if ($row) {
                    $error = 'Bu e-posta adresi zaten kullanılıyor. Lütfen giriş yapınız.';
                } else {
                    if (isset($db)) {
                        $url = $user_name . '/' . $user_sure_name;
                        $query = $db->prepare("UPDATE users SET 
                                                user_name= ? ,
                                                user_sure_name= ? ,
                                                user_email = ? ,
                                                user_url= ? ,
                                                user_role_id=? 
                                                WHERE users.user_id=?");
                        $result = $query->execute([$user_name, $user_sure_name, $user_email, $url, $user_role_id, $id]);
                        if ($result) {
                            $success = 'Üyeliğiniz başarıyla oluşturuldu.';

                            header('Refresh:2;url=' . site_url('admin'));
                        } else {
                            $error = 'Bir sorun oluştu,Lütfen daha sonra tekrar deneyiniz.';
                        }
                    } else {
                        $error = 'Bir sorun oluştu,Lütfen daha sonra tekrar deneyiniz.';
                    }

                }
            }

        }
    }
    require admin_view('edit-user');
}else{
    require view('index');
}