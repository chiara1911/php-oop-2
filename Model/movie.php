

<!-- definire classe movie -->

<?php

include __DIR__ ."/genre.php";

class Movie
{
    // dichiarati elementi della classe Movie
    public $id;
    public $original_title;
    public $title;
    public $poster_path;
    public $original_language; 
 public Genre $genre;

   

// costrutto

 function __construct($id, $original_title, $title, $poster_path, $original_language, Genre $genre )
{
    $this->id = $id;
    $this->original_title = $original_title;
    $this->title = $title;
    $this->poster_path = $poster_path;
    $this->original_language = $original_language;
    $this->genre = $genre;

}
function printCard(){
    $image = $this->poster_path;
    $title = $this->title;
    $original_title = $this->original_title;
    $language = $this->original_language;
$genre = $this->genre->name;
    include __DIR__ ."/../View/card.php";
    
}

}


$movieList = file_get_contents(__DIR__ ."/movie_db.json");
$movieEl = json_decode($movieList, true);
$movies =[];
$action = new Genre('Action');
// $rand_genre = $genres[rand(0, count($genres) - 1)];
// $genre_random=[]
foreach ($movieEl as $el)
{
$movies [] = new Movie($el["id"], $el["original_title"], $el["title"], $el["poster_path"], $el["original_language"], $action) ;
}


// var_dump($movies);

?>