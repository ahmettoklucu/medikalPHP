<?php
if (session('user_role_id')==1){
    if (!route(1))
    {
        $route[1]='index';

    }
    if (!file_exists(admin_controller(route(1)))){
        $route[1]='index';
    }
    $menus=[
        'UnConfirmUser'=>[
            'title'=>"Onaysız Kullanıcılar",
            'url'=>admin_url('unconfirm-user')
        ],
        'ConfirmUser'=>[
            'title'=>"Onaylı Kullanıcılar",
            'url'=>admin_url('confirm-user')
        ],
        'product'=>[
            'title'=>"Cihazlar",
            'url'=>admin_url('product')
        ],
        'applications'=>[
            'title'=>"Başvurular",
            'url'=>admin_url('applications')
        ],

    ];

    require admin_controller(route(1));
}else{
    require view('404');
}




