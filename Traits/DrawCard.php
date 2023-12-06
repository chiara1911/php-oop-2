<?php


trait DrawCard{
    public function printCard($item){
        extract($item);
        include __DIR__ ."/../View/card.php";
}}
?>