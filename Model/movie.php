<!-- definire classe movie -->

<?php

include __DIR__ . "/Genre.php";
include __DIR__ . "/Product.php";
include __DIR__ . "/../Traits/DrawCard.php";
class Movie extends Product
{
    // dichiarati elementi della classe Movie
    use DrawCard;
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
        for ($n = 0; $n < count($this->genres); $n++) {
            $template .= '<span>' . $this->genres[$n]->name . ' </span> ';
        }
        $template .= "</p>";
        return $template;
    }
    public function printCard()
    {
        $error = '';
        if (ceil($this->vote_average) < 7) {
            try {
                $this->setDiscount(10);
            } catch (Exception $e) {
                $error = 'Eccezione:' . $e->getMessage();
            }
        }
        $sconto = $this->getDiscount();
        $image = $this->poster_path;
        $title = strlen($this->title) > 28 ? substr($this->title, 0, 28) . '...' : $this->title;
        $original_title = $this->original_title;
        $content = substr($this->vote_average, 0, 100) . '...';
        $custom = $this->getVote();
        $custom2 = $this->formatGenres();
        $price = $this->price;
        $quantity = $this->quantity;
        $language = $this->original_language;
        include __DIR__ . '/../View/card.php';
    }


    public static function fetchAll()
    {

        $movieList = file_get_contents(__DIR__ . "/movie_db.json");
        $movieEl = json_decode($movieList, true);
        $movies = [];
        $genres = Genre::fetchAll();
        foreach ($movieEl as $el) {
            $moviegenres = [];
            $quantity = rand(0, 35);
            $price = rand(5, 50);

            while (count($moviegenres) < count($el["genre_ids"])) {

                $index = rand(0, count($genres) - 1);

                $rand_genre = $genres[$index];

                if (!in_array($rand_genre, $moviegenres)) {
                    $moviegenres[] = $rand_genre;
                }
            }
            $movies[] = new Movie($el["id"], $el["original_title"], $el["title"], $el["poster_path"], $el["original_language"],  $moviegenres, $el["vote_average"],   $quantity, $price);
        }




        return $movies;
    }
} ?>