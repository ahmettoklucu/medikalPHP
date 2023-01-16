<?php require view('/static/header');?>
<div style="height: 110px">

</div>
    <div class="container">
        <div class="row justify-content-md-center mt-4">
            <div class="col-md-4">
                <form action="" method="post">
                    <h3 class="mb-3">Kayıt Ol</h3>
                    <div class="form-group">
                        <label for="name">Adınız</label>
                        <input type="text" required value="<?=post('user_name')?>" class="form-control" name="user_name" id="name"placeholder="Adınızı yazın..">
                    </div>
                    <div class="form-group">
                        <label for="surename">Soyadınız</label>
                        <input type="text" required value="<?=post('user_sure_name')?>" class="form-control" name="user_sure_name" id="sure_name" placeholder="Soyadınızı yazın..">
                    </div>
                    <div class="form-group">
                        <label for="email">E-posta Adresiniz</label>
                        <input type="text" required value="<?=post('user_email')?> "class="form-control" name="user_email" id="email"placeholder="E-posta adresinizi yazın..">
                    </div>
                    <div class="form-group">
                        <label for="password">Şifreniz</label>
                        <input type="password" required class="form-control" name="user_password" id="user_password" placeholder="***">
                    </div>
                    <div class="form-group">
                        <label for="password-again">Şifreniz (Tekrar)</label>
                        <input type="password" required class="form-control" name="password_again" id="password_again" placeholder="***">
                    </div>
                    <?php if ($err = error()): ?>
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
                    <button  type="submit" class="col-12 btn btn-primary">Kayıt Ol</button>
                </form>
            </div>
        </div>
    </div>
<div style="height: 100px">

</div>
<?php require view('/static/footer');?>