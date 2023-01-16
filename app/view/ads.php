<?php require view('/static/header')?>
<div style="height:120px">
    <?php if(isset($rows)):?>
</div>
<div class="container p-2">
    <div class="row mt-5 justify-content-md-center">
        <div class="row">
            <div class="col-12" style="float: left">
                <h5 class="col-6" style="float: left">İlanlar</h5>
                <form style="float: right" action="" method="get">
                    <div class="input-group">
                        <div class="form-outline">
                            <input type="search" placeholder="search" value="" id="form1" name="search" class="form-control" />
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
            <br>
            <br>
            <hr />

        </div>
        <div class="col-12 ">
            <div class="row justify-content-md-center">
                <?php foreach ($rows as $row): ?>
                    <div class="card col-3 m-1">
                        <img src="<?=public_url('upload/images/' .$row['advert_image'] )?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?=$row['advert_name']?></h5>
                            <p class="card-text"><?=$row['advert_description']?></p>
                            <p class="card-text"><?=$row['advert_address']?></p>
                            <p class="card-text"><?php
                                if ($row['advert_school_id']==1):?>
                                <?='Lise'?></p>
                            <?php else:?>
                            <?= 'Üniversite'?>
                            <?php endif;?>
                            <a href="<?=site_url('application?id='.$row['advert_id'])?>" class="btn btn-primary">Başvur</a>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>

    <?php endif;?>






    <?php require view('/static/footer')?>
