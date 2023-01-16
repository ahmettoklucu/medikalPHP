<?php require view('/static/header');?>
<?php if(isset($row)):?>
    <div style="height: 150px">

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
                        <label for="product_name">İlan Adı:</label>
                        <input type="text" required value="<?= post('advert_name')?post('advert_name'):$row['advert_name']?>" class="form-control" name="advert_name" id="advert_name">
                    </div>
                    <div class="form-group">
                        <label for="product_deacription">İlan Adresi</label>
                        <textarea type="text"  rows="8" cols="80" required class="form-control" name="product_description" id="product_description">
                            <?= post('advert_description')?post('advert_description'):$row['advert_description']?>
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="product_description">İlan Açıklama</label>
                        <textarea type="text"  rows="8" cols="80" required class="form-control" name="advert_address" id="advert_address">
                            <?= post('advert_address')?post('advert_address'):$row['advert_address']?>
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="product_image">Anaresim</label>
                        <input type="File" required value="<?=post('advert_image')?>"class="form-control" name="advert_image" id="advert_image">
                    </div>
                    <div class="form-group">
                        <label for="product_image1">1.Resim</label>
                        <input type="File" value="<?=post('advert_image1')?>"class="form-control" name="advert_image1" id="advert_image1">
                    </div>
                    <div class="form-group">
                        <label for="product_image2">2.Resim</label>
                        <input type="File" value="<?=post('advert_image2')?>"class="form-control" name="advert_image2" id="advert_image2">
                    </div>
                    <div class="form-group">
                        <label for="product_image3">3.Resim</label>
                        <input type="File" value="<?=post('advert_image3')?>"class="form-control" name="advert_image3" id="advert_image3">
                    </div>
                    <div class="form-group">
                        <label for="product_image4">4.Resim</label>
                        <input type="File" value="<?=post('advert_image4')?>"class="form-control" name="advert_image4" id="advert_image4">
                    </div>
                    <div class="form-group">
                        <label for="advert_school_id">Okul</label>
                        <select id="advert_school_id" name="advert_school_id" class="form-control -">
                            <?php if (isset($schools)):
                                foreach ($schools as $item):?>
                                    <option value="<?=$item['school_id']?>"
                                        <?= $item['school_id']==$row['advert_school_id']?'selected':'' ?>>
                                        <?=$item['school_name']?>
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
<?php endif; ?>
<?php require view('/static/footer');?>
