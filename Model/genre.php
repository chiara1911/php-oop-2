

<?php

class Genre
{

public $name;



public function __construct($name){
    $this->name = $name;
}
}
$genreList = file_get_contents(__DIR__ ."/genre_db.json");
// var_dump($genreList);
$genre = json_decode($genreList, true);

$genres=[];
foreach($genre as $el){
    $genres[] = new Genre($el);
}
// var_dump($genres);


?>