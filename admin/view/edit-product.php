<?php require admin_view('/static/header');
if(isset($row)):?>
    </div>
    <div class="container">
        <div class="row justify-content-md-center mt-4">
            <div class="col-md-4">
                <form action="" method="post" enctype="multipart/form-data">
                    <h3 class="mb-3">Kullanıcı Düzenle</h3>
                    <?php
                    if ($err = error()): ?>
                        <div class="alert alert-danger" role="alert">
                            <?=$err?>
                        </div>
                    <?php endif; ?>
                    <?php if ($success = success()): ?>
                        <div class="alert alert-success" role="alert">
                            <?=$success?>
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label for="product_name">Cihaz Adı:</label>
                        <input type="text" required value="<?= post('product_name')?post('product_name'):$row['product_name']?>" class="form-control" name="product_name" id="product_name">
                    </div>
                    <div class="form-group">
                        <label for="product_deacription">Cihaz Açıklama</label>
                        <textarea type="text"  rows="8" cols="80" required class="form-control" name="product_description" id="product_description">
                            <?= post('product_description')?post('product_description'):$row['product_description']?>
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="product_image">Anaresim</label>
                        <input type="File" required value="<?=post('product_image')?>"class="form-control" name="product_image" id="product_image">
                    </div>
                    <div class="form-group">
                        <label for="product_image1">1.Resim</label>
                        <input type="File" value="<?=post('product_image1')?>"class="form-control" name="product_image1" id="product_image1">
                    </div>
                    <div class="form-group">
                        <label for="product_image2">2.Resim</label>
                        <input type="File" value="<?=post('product_image2')?>"class="form-control" name="product_image2" id="product_image2">
                    </div>
                    <div class="form-group">
                        <label for="product_image3">3.Resim</label>
                        <input type="File" value="<?=post('product_image3')?>"class="form-control" name="product_image3" id="product_image3">
                    </div>
                    <div class="form-group">
                        <label for="product_image4">4.Resim</label>
                        <input type="File" value="<?=post('product_image4')?>"class="form-control" name="product_image4" id="product_image4">
                    </div>
                    <div class="form-group">
                        <label for="product_video">Video</label>
                        <input type="File" value="<?=post('product_video')?>"class="form-control" name="product_video" id="product_video">
                    </div>
                    <div class="form-group">
                        <label for="product_user_id">Kullanıcı</label>
                    <select id="product_user_id" name="product_user_id" class="form-control -">
                        <?php if (isset($users)):
                        foreach ($users as $item):?>
                            <option value="<?=$item['user_id']?>"
                                <?= $item['user_id']==$row['product_user_id']?'selected':'' ?>>
                                <?=$item['user_name'] . ' '.$item['user_sure_name'] ?>
                            </option>
                        <?php endforeach;endif; ?>
                    </select>
                    </div>

                    <input type="hidden" name="submit" value="1">
                    <button  type="submit" class="col-12 btn btn-primary">Oluştur</button>
                </form>
            </div>
        </div>
    </div>







<?php require admin_view('/static/footer'); endif;?>