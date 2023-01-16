<?php
if(session('user_role_id')==5) {
$product_user_id=$_SESSION['user_id'];
$product_isdelete=0;
if (isset($db)) {
    $query=$db->prepare('SELECT * FROM products WHERE product_user_id=? && 
                                                            product_isdelete=?');
}
$query->execute([$product_user_id,$product_isdelete]);
$rows=$query->fetchAll(PDO::FETCH_ASSOC);
require view('myproduct');
}
else{
    view('404');
}
