<div class="col-12 col-md-4 col-lg-3 mb-5">
    <div class="card  h-100 ">
        <img src="<?= $image ?>" class="card-img-top my-ratio" alt="<?= $title ?>">
        <div class="card-body ">
            <?php if (isset($original_title)) {
            ?><h5><?= $original_title ?></h5>
            <?php } ?>
            <p><?= $title ?></p>
            <div>
                <p><?= $custom ?></p>
                <?php if (isset($language)) {
            ?><img src="./img/<?= $language ?>.svg" alt="<?= $language ?>" class="flag">
            <?php } ?>
                
            </div>
            <div>
                quantità <?= $quantity ?> prezzo : $ <?= $price ?>
                <?php if ($sconto > 0) { ?>
                    <div>Sconto :
                        <?= $sconto ?>
                    </div>
                <?php } ?>
            </div>
            <?php if (isset($custom2)) {
            ?><small><?= $custom2 ?></small>
            <?php } ?>

        </div>
    </div>
</div>