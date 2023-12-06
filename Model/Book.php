
<?php
include __DIR__ . "/Product.php";
include __DIR__ . "/Genre.php";

class Book extends Product
{

    private int $id;
    private string $image;
    private string $title;
    private array $authors;

    private string $overview;
   

    public function __construct($id, $image, $title, $authors, $overview,  $price, $quantity)
    {

        parent::__construct($price, $quantity);

        $this->id = $id;
        $this->image = $image;
        $this->title = $title;
        $this->authors = $authors;
        $this->overview = $overview;
     
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
  
    // public function formatCard()
    // {
    //     $itemCard = [
    //         'sconto' => $this->getDiscount(),
    //         'image' => $this->image,
    //         'title' => strlen($this->title) > 28 ? substr($this->title, 0, 28) . '...' : $this->title,
    //         'content' => substr($this->overview, 0, 100) . '...',
    //         'custom' => $this->getAuthors(),
    //         'genre' => $this->formatGenres(),
    //         'price' => $this->price,
    //         'quantity' => $this->quantity
    //     ];
    //     return $itemCard;
    // }
    public function printCard()
    {
        $image = $this->image;
        $title = $this->title;
        $custom =  $this->getAuthors();
        $custom2 = $this->overview;
        $price = $this->price;
        $quantity = $this->quantity;
        $sconto = $this->getDiscount();
        include __DIR__ . '/../View/card.php';
    }

    public static function fetchAll()
    {
        $BookList = file_get_contents(__DIR__ . "/books_db.json");
        $BookEl = json_decode($BookList, true);
        $Books = [];
        foreach ($BookEl as $item) {

            $quantity = rand(0, 35);
            $price = rand(5, 50);
            $Books[] = new Book($item['_id'], $item['thumbnailUrl'], $item['title'], $item['authors'], $item['longDescription'], $price, $quantity);
        }
       
        return $Books;
    }
}
// var_dump($Books);


?>
