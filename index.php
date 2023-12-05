<?php

include __DIR__ ."/View/header.php";
include __DIR__ ."/Model/movie.php";

?>

<div class="row">
<p>film <?php foreach($movies as $el) {
    $el -> printCard();
  }?></p>
</div>
  
   
    <?php
include __DIR__ ."/View/footer.php"
    ?>