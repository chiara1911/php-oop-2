<?php

include __DIR__ ."/View/header.php";
include __DIR__ ."/Model/Movie.php";
$movies = Movie::fetchAll();

?>

<div class="row">
 <?php foreach($movies as $movie) {
    $movie -> printCard();
  }?>
</div>
  
   
    <?php
include __DIR__ ."/View/footer.php"
    ?>