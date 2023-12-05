<!-- definire classe movie -->

<?php

include __DIR__ . "/Genre.php";
include __DIR__ ."/Product.php";
class Movie extends Product
{
    // dichiarati elementi della classe Movie
    public $id;
    public $original_title;
    public $title;
    public $poster_path;
    public $original_language;
    public $vote_average;
    public array $genres;



    // costrutto

    function __construct($id, $original_title, $title, $poster_path, $original_language, $genres, $vote_average, $price, $quantity)
    {
        parent::__construct($price, $quantity); 
        $this->id = $id;
        $this->original_title = $original_title;
        $this->title = $title;
        $this->poster_path = $poster_path;
        $this->vote_average = $vote_average;
        $this->original_language = $original_language;
        $this->genres = $genres;
    }
    function printCard()
    {
        $sconto = $this->setDiscount($this->title);
  
        $image = $this->poster_path;
        $title = $this->title;
        $original_title = $this->original_title;
        $language = $this->original_language;
        $custom = $this->getVote();
        $price = $this->price;
        $quantity = $this->quantity;
        // $genres = $this->formatGenres();
        include __DIR__ . "/../View/card.php";
    }
    public function getVote()
    {
        $vote = ceil($this->vote_average / 2);
        $template = "<p>";
        for ($n = 1; $n <= 5; $n++) {
            $template .= $n <= $vote ? '<i class="fa-solid fa-star"></i>' : '<i class="fa-regular fa-star"></i>';
        }
        $template .= "</p>";
        return $template;
    }
    public function formatGenres()
    {

        $template = "<p>";
        for ($n = 1; $n <= count($this->genres); $n++) {
            $template .= '<span>' . $this->genres[$n]->name . '- </span>';
        }
        $template .= "</p>";
        return $template;
    }
    public static function fetchAll()
    {

        $movieList = file_get_contents(__DIR__ . "/movie_db.json");
        $movieEl = json_decode($movieList, true);
        $movies = [];
        $action = new Genre('Action');
        // $rand_genre = $genres[rand(0, count($genres) - 1)];
        // $genre_random=[]
        $genres = Genre::fetchAll();
        foreach ($movieEl as $el) {
            // $moviegenres = [];
           
            // for ($i = 0; $i < count($el['genre_ids']); $i++) {
            //     $index = rand(0, count($genres) - 1);
            //     $rand_genre = $genres[$index];
            //     $moviegenres[] = $rand_genre;
            // }
            $quantity = rand (0,100);
            $price = rand(5,200);
            $movies[] = new Movie($el["id"], $el["original_title"], $el["title"], $el["poster_path"], $el["original_language"], $genres, $el["vote_average"],   $quantity, $price);
        }
        return $movies;
    }
 
}



Movie::fetchAll()


// var_dump($movies);

?>