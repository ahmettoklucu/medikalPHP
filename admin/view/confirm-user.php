<?php require admin_view('/static/header');
$i=0;
?>

    <table class="table table-bordered table-hover col-12" style="overflow-x: auto;">
        <thead>
        <th scope="col">
            NO
        </th>
        <th scope="col">
            İSİM
        </th>
        <th scope="col">
            SOYİSİM
        </th>
        <th scope="col">
            EMAİL
        </th>
        <th scope="col">
            KAYIT TARİHİ
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
                        <?=$row['user_name']?>
                    </td>
                    <td>
                        <?=$row['user_sure_name']?>
                    </td>
                    <td>
                        <?=$row['user_email']?>
                    </td>
                    <td>
                        <?=$row['user_date']?>
                    </td>
                    <td>
                        <a href="<?=admin_url('edit-user?id='.$row['user_id'])?>" class="btn btn-primary btn-sm">DÜZENLE</a>
                        <a href="<?=admin_url('delete-user?id='.$row['user_id'])?>"class="btn btn-warning btn-sm">SİL</a>
                        <a href="<?=admin_url('detail-user?id='.$row['user_id'])?>"class="btn btn-success btn-sm">DETAY</a>
                    </td>
                </tr>
            <?php endforeach; ?>

    </tbody>
    </table>







<?php require admin_view('/static/footer')?>