

<?php

class Genre
{

public $name;



public function __construct($name){
    $this->name = $name;
}
// public function drawGenre (){
//     return "<span class ="
// }

public static function fetchAll(){
    $genreString = file_get_contents(__DIR__ ."/genre_db.json");
    // var_dump($genreList);
    $genreList = json_decode($genreString, true);
    
    $genres=[];
    foreach($genreList as $item){
        $genres[] = new Genre($item);
    }
    return $genres;
}
}



?>