<?php
if(session('user_role_id')==1) {
    if (isset($db)) {
        $query = $db->prepare('SELECT * FROM applications WHERE application_isdelete=0 ORDER BY application_id  DESC');
        $query->execute();
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        $query = $db->prepare('SELECT * FROM users ');
        $query->execute();
        $users = $query->fetchAll(PDO::FETCH_ASSOC);
        $query = $db->prepare('SELECT * FROM ads ');
        $query->execute();
        $ads = $query->fetchAll(PDO::FETCH_ASSOC);
        require admin_view('applications');
    }

}else{
    require view('index');
}