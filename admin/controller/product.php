<?php
if(session('user_role_id')==1) {
    if (isset($db)) {
        $query = $db->prepare('SELECT * FROM products WHERE product_isdelete=0 ORDER BY product_id DESC');
    }
    $query->execute();
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    $query = $db->prepare('SELECT * FROM users ');
    $query->execute();
    $users = $query->fetchAll(PDO::FETCH_ASSOC);
    require admin_view('product');
}else{
    require view('index');
}
