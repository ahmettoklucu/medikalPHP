<?php
if(session('user_role_id')==1) {
    $id = get('id');
    if (!$id) {
        header('Location:' . admin_url('index'));
        exit();
    }
    if (isset($db)) {
        $query = $db->prepare('SELECT * FROM applications WHERE user_id=?');
        $query->execute([$id]);
        $row = $query->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            header('Location' . admin_url());
            exit();
        }
    }
    if (post('submit')) {
        $application_status = post('application_status') ? post('application_status') : $row['application_status'];
                    if (isset($db)) {
                        $query = $db->prepare("UPDATE applications SET 
                                                application_status= ? ,
                                                WHERE applications.application_id=?");
                        $result = $query->execute([$application_status, $id]);
                        if ($result) {
                            $success = 'Başvuru başarıyla oluşturuldu.';

                            header('Refresh:2;url=' . site_url('admin'));
                        } else {
                            $error = 'Bir sorun oluştu,Lütfen daha sonra tekrar deneyiniz.';
                        }
                    } else {
                        $error = 'Bir sorun oluştu,Lütfen daha sonra tekrar deneyiniz.';


                    }


    }

}else{
    require view('index');
}
