<?php require view('/static/header');
$i=0;
?>
<div style="height: 150px">

</div>
<a class="btn btn-success" href="<?=site_url('add-ads')?>">İlan ekle</a>
    <table class="table table-bordered table-hover col-10" style="overflow-x: auto;">
        <thead>
        <th scope="col">
            NO
        </th>
        <th scope="col">
            Cihaz İsmi
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
                        <img style="height:150px;width:150px" src="<?=public_url('upload/images/'.$row['product_image'])?>">
                    </td>

                    <td>
                        <a href="<?=site_url('edit-product?id='.$row['product_id'])?>" class="btn btn-primary btn-sm">DÜZENLE</a>
                        <a href="<?=site_url('delete-product?id='.$row['product_id'])?>"class="btn btn-warning btn-sm">SİL</a>
                        <a href="<?=site_url('detail-product?id='.$row['product_id'])?>"class="btn btn-success btn-sm">DETAY</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>







<?php require view('/static/footer')?>