<?php require view('/static/header');
$i=0;
?>
    <div style="height: 150px">

    </div>
    <a class="btn btn-success" href="<?=site_url('add-ads')?>">İlan ekle</a>
    <table class="table table-bordered table-hover col-12" style="overflow-x: auto;">
        <thead>
        <th scope="col">
            NO
        </th>
        <th scope="col">
            İlan İsmi
        </th>
        <th scope="col">
            İsim Soyisim
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
                        <?=$row['advert_name']?>
                    </td>
                    <td>
                        <?php if (isset($users))
                            foreach ($users as $user):
                                if ($user['user_id']==$row['advert_user_id']):?>
                                    <?=$user['user_name'].' '.$user['user_sure_name']?>
                                <?php endif;
                            endforeach;?>
                    </td>
                    <td>
                        <img style="height:150px;width:150px" src="<?=public_url('upload/images/'.$row['advert_image'])?>">
                    </td>

                    <td>
                        <a href="<?=site_url('edit-ads?id='.$row['advert_id'])?>" class="btn btn-primary btn-sm">DÜZENLE</a>
                        <a href="<?=site_url('delete-ads?id='.$row['advert_id'])?>"class="btn btn-warning btn-sm">SİL</a>
                        <a href="<?=site_url('detail-ads?id='.$row['advert_id'])?>"class="btn btn-success btn-sm">DETAY</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>







<?php require view('/static/footer')?>