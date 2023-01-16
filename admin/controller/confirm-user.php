<?php
if(session('user_role_id')==1) {
    if (isset($db)) {
        $query = $db->prepare('SELECT * FROM users WHERE user_role_id=2 && user_isdelete=0 ORDER BY user_id DESC ');
    }
    $query->execute();
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    require admin_view('confirm-user');
}else{
    require view('index');
}