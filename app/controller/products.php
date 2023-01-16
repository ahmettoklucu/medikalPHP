<?php
if(session('user_role_id')) {
    if (isset($db)) {
        $sql = 'SELECT * FROM products ';
        $search = get('search');
        if (isset($search)) {
            $sql .= 'WHERE product_name LIKE "%' . $search . '%"';
            if (empty($sql)) {
                $sql = $sql;
            }
        }

        $query = $db->prepare($sql);
    }
    $query->execute();
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    require view('products');
}
else{
    require view('404');
}
