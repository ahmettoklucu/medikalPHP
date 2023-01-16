<?php require admin_view('/static/header');
if(isset($row)):?>
</div>
    <div class="container">
        <div class="row justify-content-md-center mt-4">
            <div class="col-md-4">
                <form action="" method="post">
                    <h3 class="mb-3">Kullanıcı Düzenle</h3>
                    <div class="form-group">
                        <label for="name">Adınız</label>
                        <input type="text" required value="<?= post('user_name')?post('user_name'):$row['user_name']?>" class="form-control" name="user_name" id="name" placeholder="Adınızı yazın..">
                    </div>
                    <div class="form-group">
                        <label for="surename">Soyadınız</label>
                        <input type="text" required value="<?=post('user_sure_name')?post('user_sure_name'):$row['user_sure_name'] ?>" class="form-control" name="user_sure_name" id="sure_name" placeholder="Soyadınızı yazın..">
                    </div>
                    <div class="form-group">
                        <label for="email">E-posta Adresiniz</label>
                        <input type="text" required value="<?=post('user_email')?post('user_email'):$row['user_email']?> "class="form-control" name="user_email" id="email"placeholder="E-posta adresinizi yazın..">
                    </div>
                    <div class="form-group">
                        <label for="user_role_id">Yetki</label>
                    <select id="user_role_id" name="user_role_id" class="form-control -">
                        <?php if (isset($rows)):
                        foreach ($rows as $item):?>
                            <option value="<?=$item['role_id']?>"
                                <?= $item['role_id']==$row['user_role_id']?'selected':'' ?>>
                                <?=$item['role_name']?>
                            </option>
                        <?php endforeach;endif; ?>
                    </select>
                    </div>
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
                    <input type="hidden" name="submit" value="1">
                    <button  type="submit" class="col-12 btn btn-primary">Düzenle</button>
                </form>
            </div>
        </div>
    </div>
<?php endif;?>
<?php require admin_view('/static/footer');?>