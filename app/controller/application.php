<?php
$id = get('id');
if (isset($db)) {
    $query = $db->prepare('SELECT * FROM ads WHERE advert_id=?');
    $query->execute([$id]);
    $row = $query->fetch(PDO::FETCH_ASSOC);
    if (!$row) {
        header('Location' . site_url());
        exit();
    }
    else{
        require view('application');
    }
}
if (session('user_role_id')) {

    if (post('submit')) {
        $advert_id = post($id);
        $application_user_id = session('user_id');
        $application_cv = $_FILES('application_cv');
        $sonuc = [];
        if (!isset($sonuc['hata'])) {
            if ($application_cv['error'] == 4) {
                $result1 = 'CV boş geçilemez.';
            }
            $result1 = pdf_control($application_cv);
            if (empty($result1['hata'])) {
                if (isset($db)) {
                    $query = $db->prepare("INSERT INTO products SET 
                                                    advert_id= ? ,
                                                    user_id= ? ,
                                                    application_cv = ? ,
                    ");
                    $asonuc = $query->execute([$advert_id, $application_user_id, $result1['dosya']]);
                    $success = 'Başariyla başvuruldu.';
                } else {
                    $error = $result1['hata'];
                }
            }
        }
    }
}



