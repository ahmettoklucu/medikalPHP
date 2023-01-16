<?php
if (session('user_role_id')==2){
    $id = get('id');
    if (!$id) {
        header('Location:' . admin_url('index'));
        exit();
    }
    if (isset($db)) {
        $query = $db->prepare('SELECT * FROM products WHERE product_id=?');
        $query->execute([$id]);
        $row = $query->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            header('Location' . admin_url());
            exit();
        }
        $user_isdelete = true;
        $query = $db->prepare("UPDATE products SET 
                                                product_isdelete= ?
                                                WHERE products.product_id=?");
        $result = $query->execute([$user_isdelete, $id]);

    }
    require view('index');
}else{
    require view('404');
}
