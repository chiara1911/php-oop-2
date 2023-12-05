<?php


include __DIR__ ."/View/header.php";
include __DIR__ ."/Model/Game.php"

?>

<h1>games</h1>
<div class="container">
<div class="row">
 <?php foreach($Games as $game){
    $game-> printCard();

  }?></span>
</div> 
</div>