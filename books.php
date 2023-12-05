

<?php

include __DIR__ ."/View/header.php";
include __DIR__ ."/Model/Book.php";

?>



<div class="container">
<div class="row">
 <?php foreach($Books as $book){
    $book-> printCard();

  }?></span>
</div> 
</div>