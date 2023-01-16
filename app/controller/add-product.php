<?php
if(session('user_role_id')==2) {
    if (post('submit')) {
        $product_name = post('product_name');
        $product_deacription = post('product_deacription');
        $product_image = $_FILES['product_image'];
        $product_image1 = $_FILES['product_image1'];
        $product_image2 = $_FILES['product_image2'];
        $product_image3 = $_FILES['product_image3'];
        $product_image4 = $_FILES['product_image4'];
        $product_video = $_FILES['product_video'];
        $product_user_id = session('user_id');
        $sonuc = [];
        if (!isset($sonuc['hata'])) {
            if ($product_image['error'] == 4) {
                $result1 = 'Ana resim boş geçilemez.';
            }

            $result1 = images_control($product_image);
            $result2 = images_control($product_image1);
            $result3 = images_control($product_image2);
            $result4 = images_control($product_image3);
            $result5 = images_control($product_image4);
            $result6 = videos_control($product_video);

            if (empty($result1['hata']) && empty($result2['hata']) && empty($result3['hata']) && empty($result4['hata']) && empty($result5['hata']) && empty($result6['hata'])) {

                if (isset($db)) {
                    $query = $db->prepare("INSERT INTO products SET 
                                                    product_name= ? ,
                                                    product_description= ? ,
                                                    product_user_id = ? ,
                                                    product_image=?,
                                                    product_image1= ? ,
                                                    product_image2=?,
                                                    product_image3=?,
                                                    product_image4=?,
                                                    product_video=?
                     
                     
                     ");
                    $asonuc = $query->execute([$product_name, $product_deacription, $product_user_id, $result1['dosya'], $result2['dosya'], $result3['dosya'], $result4['dosya'], $result5['dosya'], $result6['dosya']]);
                    $success = 'Cihaz başari ile eklendi.';
                    header('Refresh:2;url='.site_url());
                } else {
                    $error = $result1['hata'];
                    $error = $result2['hata'];
                    $error = $result3['hata'];
                    $error = $result4['hata'];
                    $error = $result5['hata'];
                    $error = $result6['hata'];
                }
            }
        }


    }
    require view('add-product');
}else{
    require view('404');
}

