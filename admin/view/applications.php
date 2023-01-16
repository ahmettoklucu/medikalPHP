<?php require admin_view('/static/header');
$i=0;
?>

    <table class="table table-bordered table-hover col-12" style="overflow-x: auto;">
        <thead>
        <th scope="col">
            NO
        </th>
        <th scope="col">
            Firma İsmi
        </th>
        <th scope="col">
            İsim Soyisim
        </th>
        <th scope="col">
            CV
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
                        <?php if (isset($ads))
                            foreach ($ads as $advert):
                                if ($advert['advert_id']==$row['advert_id']):?>
                                    <?=$advert['advert_name']?>
                                <?php endif;
                            endforeach;?>
                    </td>
                    <td>
                        <?php if (isset($users))
                            foreach ($users as $user):
                                if ($user['user_id']==$row['user_id']):?>
                                    <?=$user['user_name'].' '.$user['user_sure_name']?>
                                <?php endif;
                            endforeach;?>
                    </td>
                    <td>
                        <a style="height:150px;width:150px" href="<?=public_url('upload/cv/'.$row['application_cv'])?>" download>
                            CV İndir<a>
                    </td>

                    <td>
                        <a href="<?=admin_url('edit-application?id='.$row['application_id'])?>" class="btn btn-primary btn-sm">DÜZENLE</a>
                        <a href="<?=admin_url('delete-application?id='.$row['application_id'])?>"class="btn btn-warning btn-sm">SİL</a>
                        <a href="<?=admin_url('detail-application?id='.$row['application_id'])?>"class="btn btn-success btn-sm">DETAY</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>







<?php require admin_view('/static/footer')?>