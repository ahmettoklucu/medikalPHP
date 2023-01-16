<?php require admin_view('/static/header');
if(isset($row)):?>
    </div>
    <div class="container">
        <div class="row justify-content-md-center mt-4">
            <div class="col-md-4">
                <form action="" method="post" enctype="multipart/form-data">
                    <h3 class="mb-3">Başvuru</h3>
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
                        <label for="application_status">Aktif</label>
                        <select id="application_status" name="application_status" class="form-control -">
                            <option value="0">Pasif</option>
                            <option value="1">Onaysiz</option>
                        </select>
                    </div>
                    <input type="hidden" name="submit" value="1">
                    <button  type="submit" class="col-12 btn btn-primary">Oluştur</button>
                </form>
            </div>
        </div>
    </div>
    <?php require admin_view('/static/footer'); endif;?>