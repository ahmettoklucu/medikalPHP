<?php
if(session('user_role_id')==1) {
    $id = get('id');
    if (!$id) {
        header('Location:' . admin_url('index'));
        exit();
    }
    if (isset($db)) {
        $query = $db->prepare('SELECT * FROM applications WHERE product_id=?');
        $query->execute([$id]);
        $row = $query->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            header('Location' . admin_url());
            exit();
        }
        $product_isdelete = true;
        $query = $db->prepare("UPDATE applications SET 
                                                application_isdelete= ?
                                                WHERE products.product_id=?");
        $result = $query->execute([$product_isdelete, $id]);

    }

    require admin_view('index');
}else{
    require view('index');
}
