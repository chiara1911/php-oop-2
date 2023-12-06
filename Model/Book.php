
<?php
include __DIR__ . "/Product.php";
include __DIR__ ."/Genre.php";
include __DIR__ . "/../View/cardBook.php";
class Book extends Product
{
  
    private int $id;
    private string $image;
    private string $title;
    private array $authors;

    private string $overview;
    private array $genres;

    public function __construct($id, $image, $title, $authors, $overview, array $genres, $price, $quantity)
    {

        parent::__construct($price, $quantity);

        $this->id = $id;
        $this->image = $image;
        $this->title = $title;
        $this->authors = $authors;
        $this->overview = $overview;
        $this->genres = $genres;

    }
    public function getAuthors()
    {

        $template = "<p>";
        for ($n = 1; $n < count($this->authors); $n++) {
            $template .= '<span>' . $this->authors[$n] . ' - </span>';
        }
        $template .= "<p>";
        return $template;
    }
    private function formatGenres()
    {

        $template = "<p>";
        for ($n = 0; $n < count($this->genres); $n++) {
            $template .= $this->genres[$n]->drawGenre();
        }
        $template .= "</p>";
        return $template;
    }
    public function formatCard()
    {
        $itemCard = [
            'sconto' => $this->getDiscount(),
            'image' => $this->image,
            'title' => strlen($this->title) > 28 ? substr($this->title, 0, 28) . '...' : $this->title,
            'content' => substr($this->overview, 0, 100) . '...',
            'custom' => $this->getAuthors(),
            'genre' => $this->formatGenres(),
            'price' => $this->price,
            'quantity' => $this->quantity
        ];
        return $itemCard;

    }
    // function printCard()
    // {
    //     $title = $this->title;
    //     $description = $this->longDescription;
    //     $image = $this->thumbnailUrl;
    //     // $authors = $this->authors;
    //     $price = $this->price;
    //     $quantity = $this->quantity;
    //     // $genres = $this->formatGenres();
    // 
    // }
    public static function fetchAll()
    {
        $BookList = file_get_contents(__DIR__ . "/books_db.json");
        
        $BookEl = json_decode($BookList, true);

        $Books = [];
        $genres = Genre::fetchAll();
        foreach ($BookEl as $item) {
            $rand_genre = [];
            $rand_genre[] = $genres[rand(0, count($genres) - 1)];
            $quantity = rand(0, 35);
            $price = rand(5, 50);
            $Books[] = new Book($item['_id'], $item['thumbnailUrl'], $item['title'], $item['authors'], $item['longDescription'], $rand_genre, $price, $quantity);
        }
        return $Books;
    }
}


?>
