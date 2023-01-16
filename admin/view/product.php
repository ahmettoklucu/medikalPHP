<?php require admin_view('/static/header');
$i=0;
?>

    <table class="table table-bordered table-hover col-12" style="overflow-x: auto;">
        <thead>
        <th scope="col">
            NO
        </th>
        <th scope="col">
            Cihaz İsmi
        </th>
        <th scope="col">
            Kulanıcı
        </th>
        <th scope="col">
            Resim
        </th>
        <th scope="col"></th>
        </thead>
        <tbody>
        <?php if (isset($rows))
            foreach ($rows as $row): ?>
                <?php $i=$i+1;?>
                <tr>
                    <th scope="row">
                        <?=$i?>
                    </th>
                    <td>
                        <?=$row['product_name']?>
                    </td>
                    <td>
                <?php if (isset($users))
                    foreach ($users as $user):
                        if ($user['user_id']==$row['product_user_id']):?>
                        <?=$user['user_name'].' '.$user['user_sure_name']?>
                        <?php endif;
                    endforeach;?>
                    </td>
                    <td>
                        <img style="height:150px;width:150px" src="<?=public_url('upload/images/'.$row['product_image'])?>">
                    </td>
                   
                    <td>
                        <a href="<?=admin_url('edit-product?id='.$row['product_id'])?>" class="btn btn-primary btn-sm">DÜZENLE</a>
                        <a href="<?=admin_url('delete-product?id='.$row['product_id'])?>"class="btn btn-warning btn-sm">SİL</a>
                        <a href="<?=admin_url('detail-product?id='.$row['product_id'])?>"class="btn btn-success btn-sm">DETAY</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>







<?php require admin_view('/static/footer')?>