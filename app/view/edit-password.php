<?php require view('/static/header')?>
    <div style="height:120px">
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
                        <label for="old-password">Eski Şifre</label>
                        <input type="password" required  class="form-control" name="old-password" id="old-password">
                    </div>
                    <div class="form-group">
                        <label for="password">Yeni Şifre</label>
                        <input type="password" required class="form-control" name="password" id="password">
                    </div>
                    <div class="form-group">
                        <label for="password-again">Yeni Şifre Tekrar</label>
                        <input type="password" required  class="form-control" name="password-again" id="password-again">
                    </div>

                    <input type="hidden" name="submit" value="1">
                    <button  type="submit" class="col-12 btn btn-primary">Oluştur</button>

            </div>
        </div>
    </div>
    <?php require view('/static/footer')?>