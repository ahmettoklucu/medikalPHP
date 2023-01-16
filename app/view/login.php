<!doctype html>
<html lang="en">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <meta charset="UTF-8">
    <title>Document</title>
    <link href="<?= public_url('vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
    <link href="<?= public_url('vendor/animate.css/animate.min.css') ?>" rel="stylesheet">
    <link href="<?= public_url('vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= public_url('vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
    <link href="<?= public_url('vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
    <link href="<?= public_url('vendor/glightbox/css/glightbox.min.css') ?>" rel="stylesheet">
    <link href="<?= public_url('vendor/remixicon/remixicon.css') ?>" rel="stylesheet">
    <link href="<?= public_url('vendor/swiper/swiper-bundle.min.css') ?>" rel="stylesheet">

    <!--styles-->
    <link rel="stylesheet" href="<?=public_url('styles/main.css')?>">

    <!--scripts-->
    <script src="<?=public_url('scripts/jquery-1.12.2.min.js')?>"></script>
    <script src="https://cdn.ckeditor.com/4.5.7/basic/ckeditor.js')?>"></script>
    <script src="<?=public_url('scripts/admin.js')?>"></script>
    <script>
        var guvenlik1;
        var onloadCallback = function(){
            guvenlik1 = grecaptcha.render('guvenlik1', {
                'sitekey': '6Ldd_6sjAAAAAI16saEvBxQXYT3q_TLHeCFL89ss',
            });
        };
    </script>
    <script src='https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit&hl=tr' async defer></script>


</head>
<body>
<div class="login-screen">
    <form action="" method="post">
        <ul>
            <li>
                <label for="user_email">E-Mail</label>
                <input requirede type="text" name="user_email"  id="user_email">
            </li>
            <li>
                <label for="user_password">Şifre</label>
                <input required type="password" name="user_password" id="user_password">
            </li>

            <div id="guvenlik1" name="g-recaptcha-response"></div> <br>
            <li>
                <input type="hidden" name="submit" value="1">
                <button type="submit">Giriş</button>
            </li>
        </ul>
    </form>
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
    <div class="login-links">
        <a href="#" class="lost-password">
            Şifreni mi Unuttun?
        </a>
        <a href="<?=site_url('register')?>">
            Yeni Hesap Oluştur
        </a>
        <a href="<?=site_url('index')?>">
            <span class="fa fa-long-arrow-left">Anasayfa</span>
        </a>
    </div>

</div>
<script>
    function onClick(e) {
        e.preventDefault();
        grecaptcha.ready(function() {
            grecaptcha.execute('6LeccKsjAAAAAFcA2y4NU5-vIXq6m1ebo6r3uQLN', {action: 'login'}).then(function(token) {
                console.log(token)
                document.getElementById("token").value=token;
            });
        });
    }
</script>


</body>
