<?php require view('/static/header')?>
    <div style="height: 150px">

    </div>
    </div>
    <div class="container">
        <div class="row justify-content-md-center mt-4">
            <div class="col-md-4">
                <form action="" method="post" enctype="multipart/form-data">
                    <h3 class="mb-3"><?php if(isset($row)):?>
                     <?=$row['advert_name'] ?></h3>
                     <p><?=$row['advert_description']?></p>
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
                        <label for="application_cv">CV</label>
                        <input type="File" required value="<?=post('application_cv')?>"class="form-control" name="application_cv" id="application_cv">
                    <input type="hidden" name="submit" value="1">
                    <button  type="submit" class="col-12 btn btn-primary">BAŞVUR</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <?php endif;?>
<?php require view('/static/footer')?>