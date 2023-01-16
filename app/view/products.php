<?php require view('/static/header')?>
<div style="height:120px">
<?php if(isset($rows)):?>
</div>
<div class="container p-2">
    <div class="row mt-5 justify-content-md-center">
        <div class="row">
        <div class="col-12" style="float: left">
            <h5 class="col-6" style="float: left">Cihazlar</h5>
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
                <div class="card col-2 m-1" >
                    <img class="card-img-top m-1" src="<?=public_url('upload/images/' .$row['product_image'] )?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?=$row['product_name']?></h5>
                        <button style="text-align: center" class="btn btn-primary" href="<?=site_url('detail-product?id='.$row['product_id'])?>">İncele</button>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
</div>

    <?php endif;?>






<?php require view('/static/footer')?>
