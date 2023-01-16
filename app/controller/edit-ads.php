<?php
if (session('user_role_id')==5) {
    $id = get('id');
    if (!$id) {
        header('Location:' . site_url('index'));
        exit();
    }
    if (isset($db)) {
        $query = $db->prepare('SELECT * FROM ads WHERE advert_id=?');
        $query->execute([$id]);
        $row = $query->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            header('Location' . site_url());
            exit();
        }
        if ($row['advert_user_id'] != session('user_id')) {
            header('Location' . site_url());
            exit();
        }
        $query = $db->prepare('SELECT * FROM school');
        $query->execute();
        $schools = $query->fetchAll(PDO::FETCH_ASSOC);
    }

    if (post('submit')) {
        $query = $db->prepare('SELECT * FROM ads WHERE advert_id = ?');
        $query->execute([$id]);
        $oldrows = $query->fetch(PDO::FETCH_ASSOC);
        image_delete($oldrows['advert_image']);
        image_delete($oldrows['advert_image1']);
        image_delete($oldrows['advert_image2']);
        image_delete($oldrows['advert_image3']);
        image_delete($oldrows['advert_image4']);
        $advert_name = post('advert_name') ? post('advert_name') : $row['advert_name'];
        $advert_description = post('advert_description') ? post('advert_description') : $row['advert_description'];
        $advert_image = $_FILES['advert_image'];
        $advert_image1 = $_FILES['advert_image1'];
        $advert_image2 = $_FILES['advert_image2'];
        $advert_image3 = $_FILES['advert_image3'];
        $advert_image4 = $_FILES['advert_image4'];
        $advert_school_id = post('advert_school_id') ? post('advert_school_id') : $row['advert_school_id'];
        $sonuc = [];
        if (!isset($sonuc['hata'])) {
            if ($advert_image['error'] == 4) {
                $result1 = 'Ana resim boş geçilemez.';
            }
            $result1 = images_control($advert_image);
            $result2 = images_control($advert_image1);
            $result3 = images_control($advert_image2);
            $result4 = images_control($advert_image3);
            $result5 = images_control($advert_image4);

            if (empty($result1['hata']) && empty($result2['hata']) && empty($result3['hata']) && empty($result4['hata']) && empty($result5['hata']) && empty($result6['hata'])) {
                if (isset($db)) {
                    $query = $db->prepare("UPDATE ads SET  
                                                    advert_name= ? ,
                                                    advert_description= ? ,
                                                    advert_school_id = ? ,
                                                    advert_image=?,
                                                    advert_image1= ? ,
                                                    advert_image2=?,
                                                    advert_image3=?,
                                                    advert_image4=?
                                                    WHERE advert_id=?
                     ");
                    $asonuc = $query->execute([$advert_name, $advert_description, $advert_school_id, $result1['dosya'], $result2['dosya'], $result3['dosya'], $result4['dosya'], $result5['dosya'], $id]);
                    $success = 'Başvuru güncellendi ile eklendi.';
                    header('Refresh:2;url=' . site_url());
                } else {
                    image_delete($result1['dosya']);
                    image_delete($result2['dosya']);
                    image_delete($result3['dosya']);
                    image_delete($result4['dosya']);
                    image_delete($result5['dosya']);
                    $error = $result1['hata'];
                    $error = $result2['hata'];
                    $error = $result3['hata'];
                    $error = $result4['hata'];
                    $error = $result5['hata'];
                }
            }
        }
    }
    require view('edit-ads');
}else{
    require view('404');
}
