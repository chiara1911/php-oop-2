

<?php

include __DIR__ ."/View/header.php";
include __DIR__ ."/Model/Book.php";
$Books = Book::fetchAll();
?>

<div class="container">
<div class="row">
  <?php foreach($Books as $book) {
    $book -> printCard( $book->formatCard());
  }?>
</div> 
</div> 
</div>

