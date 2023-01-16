<?php
if (session('user_role_id')) {
    $id = get('id');
    if (!$id) {
        header('Location:' . site_url('index'));
        exit();
    }
    if (isset($db)) {
        $query = $db->prepare('SELECT * FROM ads WHERE user_id=?');
        $query->execute([$id]);
        $row = $query->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            header('Location' . site_url());
            exit();
        }
        $advert_isdelete = true;
        $query = $db->prepare("UPDATE ads SET 
                                                user_isdelete= ?
                                                WHERE ads.advert_id=?");
        $result = $query->execute([$advert_isdelete, $id]);
    }
    require site_view('index');
}else{
    require  require view('404');
}