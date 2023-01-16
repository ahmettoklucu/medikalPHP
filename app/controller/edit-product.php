<?php
if (session('user_role_id')==5) {
    $id = get('id');
    if (!$id) {
        header('Location:' . site_url('index'));
        exit();
    }
    if (isset($db)) {
        $query = $db->prepare('SELECT * FROM products WHERE product_id=?');
        $query->execute([$id]);
        $row = $query->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            header('Location' . site_url());
            exit();
        }
        if ($row['product_user_id'] != session('user_id')) {
            header('Location' . site_url());
            exit();
        }
    }

    if (post('submit')) {
        $query = $db->prepare('SELECT * FROM products WHERE product_id=?');
        $query->execute([$id]);
        $oldrows = $query->fetch(PDO::FETCH_ASSOC);
        image_delete($oldrows['product_image']);
        image_delete($oldrows['product_image1']);
        image_delete($oldrows['product_image2']);
        image_delete($oldrows['product_image3']);
        image_delete($oldrows['product_image4']);
        image_delete($oldrows['product_video']);
        $product_name = post('product_name') ? post('product_name') : $row['product_name'];
        $product_description = post('product_description') ? post('product_description') : $row['product_description'];
        $product_image = $_FILES['product_image'];
        $product_image1 = $_FILES['product_image1'];
        $product_image2 = $_FILES['product_image2'];
        $product_image3 = $_FILES['product_image3'];
        $product_image4 = $_FILES['product_image4'];
        $product_video = $_FILES['product_video'];
        $product_user_id = 0;
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
                    $query = $db->prepare("UPDATE products SET  
                                                    product_name= ? ,
                                                    product_description= ? ,
                                                    product_user_id = ? ,
                                                    product_image=?,
                                                    product_image1= ? ,
                                                    product_image2=?,
                                                    product_image3=?,
                                                    product_image4=?,
                                                    product_video=?
                                                    WHERE products.product_id=?
                     ");
                    $asonuc = $query->execute([$product_name, $product_description, $product_user_id, $result1['dosya'], $result2['dosya'], $result3['dosya'], $result4['dosya'], $result5['dosya'], $result6['dosya'], $id]);
                    $success = 'Cihaz güncellendi ile eklendi.';
                    header('Refresh:2;url=' . site_url());
                } else {
                    image_delete($result1['dosya']);
                    image_delete($result2['dosya']);
                    image_delete($result3['dosya']);
                    image_delete($result4['dosya']);
                    image_delete($result5['dosya']);
                    video_delete($result6['dosya']);
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
    require view('edit-product');
}else{
    require view('404');
}
