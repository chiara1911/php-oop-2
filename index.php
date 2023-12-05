<?php

include __DIR__ ."/View/header.php";
include __DIR__ ."/Model/Movie.php";
$movies = Movie::fetchAll();

?>

<div class="row">
<p>film <?php foreach($movies as $movie) {
    $movie -> printCard();
  }?></p>
</div>
  
   
    <?php
include __DIR__ ."/View/footer.php"
    ?>