<?php
if(session('user_role_id')==1) {
    $id = get('id');
    if (!$id) {
        header('Location:' . admin_url('index'));
        exit();
    }
    if (isset($db)) {
        $query = $db->prepare('SELECT * FROM users WHERE user_id=?');
        $query->execute([$id]);
        $row = $query->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            header('Location' . admin_url());
            exit();
        }
        $user_isdelete = true;
        $query = $db->prepare("UPDATE users SET 
                                                user_isdelete= ?
                                                WHERE users.user_id=?");
        $result = $query->execute([$user_isdelete, $id]);

    }

    require admin_view('index');
}
else{
    require view('index');
}