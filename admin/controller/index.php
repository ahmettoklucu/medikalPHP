<?php
if(session('user_role_id')==1)
{
    require admin_view('index');
}else{
    require view('index');
}

