<?php


include __DIR__ ."/View/header.php";
include __DIR__ ."/Model/Game.php";
$Games = Game::fetchAll();

?>
<div class="container">
<div class="row">
 <?php foreach($Games as $game){
    $game-> printCard();

  }?></span>
</div> 
</div>