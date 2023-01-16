<?php
if (session('user_role_id')){
    if (isset($db)) {
        $sql='SELECT * FROM ads ';
        $search=get('search');
        if (isset($search)){
            $sql .='WHERE advert_name LIKE "%' . $search . '%"';
            if (empty($sql)){
                $sql=$sql;
            }
        }

        $query=$db->prepare($sql);
    }
    $query->execute();
    $rows=$query->fetchAll(PDO::FETCH_ASSOC);
    require view('ads');
}else{
    require view('404');
}

