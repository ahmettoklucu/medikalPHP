<?php
function admin_controller($controllerName){
    $controllerName=strtolower($controllerName).'.php';
    return PATH.'/admin/controller/'.$controllerName;
}
function admin_view($viewName){
    $viewName=strtolower($viewName);
    return PATH.'/admin/view/'.$viewName.'.php';
}
function admin_url($url=false){
    return URL.'/admin/'.$url;
}
function admin_public_url($url=false){
    return URL.'/admin/public/'.$url;
}