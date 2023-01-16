<?php
if(session('user_role_id')==5){
    if (isset($db)) {
        $query = $db->prepare('SELECT * FROM school');
    }
    $rows=$query->execute();
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    if(post('submit')) {
        $advert_name = post('advert_name');
        $advert_address = post('advert_address');
        $advert_description = post('advert_description');
        $advert_user_id = session('user_id');
        $advert_image = $_FILES['advert_image'];
        $advert_image1 = $_FILES['advert_image1'];
        $advert_image2 = $_FILES['advert_image2'];
        $advert_image3 = $_FILES['advert_image3'];
        $advert_image4 = $_FILES['advert_image4'];
        $advert_school_id = post('advert_school_id');
        $sonuc = [];
        if (!isset($sonuc['hata']))
        {
            if ($advert_image['error'] == 4){
                $result1='Ana resim boş geçilemez.';
            }

            $result1=images_control($advert_image);
            $result2=images_control($advert_image1);
            $result3=images_control($advert_image2);
            $result4=images_control($advert_image3);
            $result5=images_control($advert_image4);

            if(empty($result1['hata'])&&empty($result2['hata'])&&empty($result3['hata'])&&empty($result4['hata'])&&empty($result5['hata'])&&empty($result6['hata']))
            {

                if (isset($db)) {
                    $query=$db->prepare("INSERT INTO ads SET 
                                                    advert_name= ? ,
                                                    advert_address=?,
                                                    advert_description= ? ,
                                                    advert_image = ? ,
                                                    advert_image1=?,
                                                    advert_image2= ? ,
                                                    advert_image3=?,
                                                    advert_image4=?,
                                                    advert_user_id=?,
                                                    advert_school_id=?
                     ");
                    $asonuc=$query->execute([$advert_name,$advert_address,$advert_description,$result1['dosya'],$result2['dosya'],$result3['dosya'],$result4['dosya'],$result5['dosya'],$advert_user_id,$advert_school_id]);
                    $success='İlan başari ile oluşruldu.';
                    header('Refresh:2;url='.site_url());
                }
                else{
                    $error=$result1['hata'];
                    $error=$result2['hata'];
                    $error=$result3['hata'];
                    $error=$result4['hata'];
                    $error=$result5['hata'];
                }
            }
        }
    }
    require view('add-ads');
}else{
    require view('404');
}



