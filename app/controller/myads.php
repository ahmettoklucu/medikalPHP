<?php
if(session('user_role_id')==5) {
    if (isset($db)) {
        $user_id=session('user_id');
        $query = $db->prepare('SELECT * FROM ads WHERE advert_isdelete=0 && advert_user_id=? ORDER BY advert_id DESC');
    }
    $query->execute([$user_id]);
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    $query = $db->prepare('SELECT * FROM users ');
    $query->execute();
    $users = $query->fetchAll(PDO::FETCH_ASSOC);
    require view('myads');
}else{
    site_url();
}