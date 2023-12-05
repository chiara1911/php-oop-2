<div class="col-12 col-md-4 col-lg-3">
    <div class="card d-flex align-items-center m-2">
        <img src="<?= $image ?>" class="card-img-top my-ratio" alt="<?= $title ?>">
        <div class="card-body ">
            <h5><?= $original_title ?></h5>
            <p><?= $title ?></p>
            <div>
            <p><?= $custom?></p>
            <!-- <p><?= $genre?></p> -->
            <img src="./img/<?= $language?>.svg" alt="<?= $language?>" class="flag">
            </div>
         <div>
          quantità   <?= $quantity?>  $  <?= $price?>
          <?php if ($sconto > 0) { ?>
                    <div>Sconto :
                        <?= $sconto ?>
                    </div>
                <?php } ?>
         </div>
        
            
        </div>
    </div>
</div>