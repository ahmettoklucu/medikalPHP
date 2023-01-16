<?php
if(session('user_role_id')==1){
    if (isset($db)) {
        $query = $db->prepare('SELECT * FROM users WHERE user_role_id=2 && user_isdelete=0 ORDER BY user_id DESC ');
    }
    $query->execute();
    $users = $query->fetchAll(PDO::FETCH_ASSOC);
    if(post('submit')) {
        $product_name = post('product_name');
        $product_description = post('product_description');
        $product_image = $_FILES['product_image'];
        $product_image1 = $_FILES['product_image1'];
        $product_image2 = $_FILES['product_image2'];
        $product_image3 = $_FILES['product_image3'];
        $product_image4 = $_FILES['product_image4'];
        $product_video = $_FILES['product_video'];
        $product_user_id=post('product_user_id');
        $sonuc = [];
        if (!isset($sonuc['hata']))
        {
            if ($product_image['error'] == 4){
                $result1='Ana resim boş geçilemez.';
            }

            $result1=images_control($product_image);
            $result2=images_control($product_image1);
            $result3=images_control($product_image2);
            $result4=images_control($product_image3);
            $result5=images_control($product_image4);
            $result6=videos_control($product_video);

            if(empty($result1['hata'])&&empty($result2['hata'])&&empty($result3['hata'])&&empty($result4['hata'])&&empty($result5['hata'])&&empty($result6['hata']))
            {

                if (isset($db)) {
                    $query=$db->prepare("INSERT INTO products SET 
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
                    $asonuc=$query->execute([$product_name,$product_description,$product_user_id,$result1['dosya'],$result2['dosya'],$result3['dosya'],$result4['dosya'],$result5['dosya'],$result6['dosya']]);
                    $success='Cihaz başari ile eklendi.';
                }
                else{
                    image_delete($result1['dosya']);
                    image_delete($result2['dosya']);
                    image_delete($result3['dosya']);
                    image_delete($result4['dosya']);
                    image_delete($result5['dosya']);
                    video_delete($result6['dosya']);
                    $error=$result1['hata'];
                    $error=$result2['hata'];
                    $error=$result3['hata'];
                    $error=$result4['hata'];
                    $error=$result5['hata'];
                    $error=$result6['hata'];
                }
            }
        }
    }
    require admin_view('add-product');
}else{
    require view('index');
}



