<div class="col-12 col-md-4 col-lg-3">
    <div class="card d-flex  align-items-center m-2 ">
        <img src="<?= $image ?>" class="card-img-top my-ratio" alt="<?= $title ?>">
        <div class="card-body overflow-y-scroll h-50  ">
            
            <p><?= $title ?></p>
            <div>
       <span><?= $description?></span>
      
       <p>prezzo : <?= $price?> &euro;</p>
       <p>quantità in magazzino: <?= $quantity?> </p>
            </div>                        
        </div>
    </div>
</div>